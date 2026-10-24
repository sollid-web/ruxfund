<?php
ob_start(); // buffer output so session headers can be sent safely

function set_my_session(){
    session_name('Gewsgtfahsop');
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    ini_set('session.use_strict_mode', '1');
    session_start();
    date_default_timezone_set('Africa/Lagos');

    if (isset($_SESSION['monitor']) && time() - $_SESSION['monitor'] > 3600) {
        $_SESSION = [];
        session_regenerate_id(true);
    } elseif (!isset($_SESSION['monitor'])) {
        session_regenerate_id(true);
    }

    $_SESSION['monitor'] = time();
}

set_my_session();

require_once __DIR__ . '/mysqli_pgsql_compat.php';

function getConnect(){
    $dbHost = getenv('DB_HOST') ?: getenv('DB_SERVER') ?: '127.0.0.1';
    $dbUser = getenv('DB_USERNAME') ?: getenv('DB_USER') ?: 'postgres';
    $dbPass = getenv('DB_PASSWORD') ?: getenv('DB_PASS') ?: '';
    $dbName = getenv('DB_NAME') ?: 'postgres';

    define('DB_SERVER', $dbHost);
    define('DB_USER', $dbUser);
    define('DB_PASS', $dbPass);
    define('DB_NAME', $dbName);

    try {
        $con = @pg_mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    } catch (PgMysqliException $exception) {
        error_log('Database connection failed: ' . $exception->getMessage());
        return null;
    }

    if (!$con) {
        error_log('Database connection failed: ' . pg_mysqli_connect_error());
        return null;
    }

    pg_mysqli_set_charset($con, 'utf8mb4');

    return $con;
}

$con = getConnect();

if ($con === null) {
    $db_available = false;
} else {
    $db_available = true;
}

// mobileview fixed
$mobileview = 'initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no';
$textsize = '1rem';
if(false){
    $mobileview = 'initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no';
    $textsize = '1rem';
}else{
    $mobileview = 'width=1366';
    $textsize = '1rem';
}
?>
