<?php
/**
 * PgMysqli-compatible shim backed by PDO/pgsql so the existing procedural
 * mysqli_* call sites throughout the app work unchanged against Postgres.
 * Only implements what this codebase actually uses.
 */

if (!defined('PG_MYSQLI_ASSOC')) {
    define('PG_MYSQLI_ASSOC', 1);
}

if (!class_exists('PgMysqliException')) {
    class PgMysqliException extends \RuntimeException {}
}

if (!class_exists('PgMysqliResult')) {
    // Implements Iterator so `foreach ($pg_mysqli_query_result as $row)` works,
    // matching real PgMysqliResult behaviour.
    class PgMysqliResult implements \Iterator {
        public $num_rows;
        private $rows;
        private $pointer = 0;

        public function __construct(array $rows) {
            $this->rows = $rows;
            $this->num_rows = count($rows);
        }

        public function fetch_assoc() {
            return $this->fetch_array();
        }

        public function fetch_array($mode = PG_MYSQLI_ASSOC) {
            if ($this->pointer >= $this->num_rows) {
                return null;
            }
            return $this->rows[$this->pointer++];
        }

        public function fetch_all($mode = PG_MYSQLI_ASSOC) {
            return $this->rows;
        }

        public function current(): mixed {
            return $this->rows[$this->pointer] ?? null;
        }

        public function key(): mixed {
            return $this->pointer;
        }

        public function next(): void {
            $this->pointer++;
        }

        public function rewind(): void {
            $this->pointer = 0;
        }

        public function valid(): bool {
            return $this->pointer < $this->num_rows;
        }
    }
}

if (!class_exists('PgMysqliStatement')) {
    class PgMysqliStatement {
        private $pdo;
        private $sql;
        private $params = [];
        private $pdoStmt;
        public $affected_rows = 0;
        public $insert_id = 0;

        public function __construct(\PDO $pdo, string $sql) {
            $this->pdo = $pdo;
            $this->sql = pg_translate_query($sql);
        }

        public function bind_param($types, &...$vars) {
            $this->params = $vars;
            return true;
        }

        public function execute() {
            try {
                $this->pdoStmt = $this->pdo->prepare($this->sql);
                $ok = $this->pdoStmt->execute($this->params);
                $this->affected_rows = $this->pdoStmt->rowCount();
                if ($ok && stripos(ltrim($this->sql), 'INSERT') === 0) {
                    // Only valid when the table has a serial/identity column.
                    $this->insert_id = (int) $this->pdo->lastInsertId();
                }
                return $ok;
            } catch (\PDOException $e) {
                error_log('Query failed: ' . $e->getMessage() . ' SQL: ' . $this->sql);
                return false;
            }
        }

        public function get_result() {
            if (!$this->pdoStmt) {
                return false;
            }
            return new PgMysqliResult($this->pdoStmt->fetchAll(\PDO::FETCH_ASSOC));
        }
    }
}

if (!class_exists('PgMysqli')) {
    class PgMysqli {
        public $pdo;
        public $insert_id = 0;
        public $error = '';

        public function __construct(\PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function prepare($sql) {
            return new PgMysqliStatement($this->pdo, $sql);
        }

        public function query($sql) {
            return pg_mysqli_query($this, $sql);
        }

        public function real_escape_string($s) {
            return pg_mysqli_real_escape_string($this, $s);
        }

        public function set_charset($charset) {}

        public function close() {}
    }
}

/**
 * Translate the small set of MySQL-only syntax this codebase relies on
 * into PostgreSQL-compatible syntax.
 */
function pg_translate_query(string $sql): string {
    $sql = preg_replace('/\bRAND\(\)/i', 'RANDOM()', $sql);
    // "2fa" is the only identifier that starts with a digit in the schema.
    $sql = preg_replace('/(?<!")\b2fa\b(?!")/', '"2fa"', $sql);
    return $sql;
}

function pg_mysqli_connect($host, $user, $pass, $dbname) {
    try {
        $port = getenv('DB_PORT') ?: '5432';
        $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
        $pdo = new \PDO($dsn, $user, $pass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
        return new PgMysqli($pdo);
    } catch (\PDOException $e) {
        $GLOBALS['__mysqli_connect_error'] = $e->getMessage();
        return false;
    }
}

function pg_mysqli_connect_error() {
    return $GLOBALS['__mysqli_connect_error'] ?? '';
}

function pg_mysqli_query($con, $sql) {
    if (!($con instanceof PgMysqli)) {
        return false;
    }
    $translated = pg_translate_query($sql);
    try {
        $stmt = $con->pdo->query($translated);
        if ($stmt === false) {
            return false;
        }
        if (preg_match('/^\s*(INSERT|UPDATE|DELETE)/i', $sql)) {
            if (stripos(ltrim($sql), 'INSERT') === 0) {
                $con->insert_id = (int) $con->pdo->lastInsertId();
            }
            return true;
        }
        return new PgMysqliResult($stmt->fetchAll(\PDO::FETCH_ASSOC));
    } catch (\PDOException $e) {
        $con->error = $e->getMessage();
        error_log('Query failed: ' . $e->getMessage() . ' SQL: ' . $translated);
        return false;
    }
}

/**
 * Parameterized variant of pg_mysqli_query() for building queries with `?`
 * placeholders instead of interpolating values into the SQL string.
 */
function pg_mysqli_query_params($con, $sql, array $params = []) {
    if (!($con instanceof PgMysqli)) {
        return false;
    }
    $translated = pg_translate_query($sql);
    try {
        $stmt = $con->pdo->prepare($translated);
        $stmt->execute($params);
        if (preg_match('/^\s*(INSERT|UPDATE|DELETE)/i', $sql)) {
            if (stripos(ltrim($sql), 'INSERT') === 0) {
                $con->insert_id = (int) $con->pdo->lastInsertId();
            }
            return true;
        }
        return new PgMysqliResult($stmt->fetchAll(\PDO::FETCH_ASSOC));
    } catch (\PDOException $e) {
        $con->error = $e->getMessage();
        error_log('Query failed: ' . $e->getMessage() . ' SQL: ' . $translated);
        return false;
    }
}

function pg_mysqli_fetch_assoc($result) {
    return $result instanceof PgMysqliResult ? $result->fetch_assoc() : null;
}

function pg_mysqli_fetch_array($result, $mode = PG_MYSQLI_ASSOC) {
    return $result instanceof PgMysqliResult ? $result->fetch_array($mode) : null;
}

function pg_mysqli_num_rows($result) {
    return $result instanceof PgMysqliResult ? $result->num_rows : 0;
}

function pg_mysqli_insert_id($con) {
    return $con instanceof PgMysqli ? $con->insert_id : 0;
}

function pg_mysqli_real_escape_string($con, $s) {
    // Parameterized queries are used for writes; this is only a fallback
    // for any remaining ad-hoc string building.
    return str_replace(["\\", "'"], ["\\\\", "''"], (string) $s);
}

function pg_mysqli_set_charset($con, $charset) {
    return true;
}

function pg_mysqli_error($con) {
    return $con instanceof PgMysqli ? $con->error : '';
}

function pg_mysqli_close($con) {
    return true;
}
