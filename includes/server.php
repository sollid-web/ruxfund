<?php
ob_start(); // buffer output so session headers can be sent safely

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}

$ip = getIPAddress();
$useragent = $_SERVER['HTTP_USER_AGENT'] ?? 'cli';
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';

function set_my_session($domain,$ip,$useragent){
session_name('Gewsgtfahsop');
ini_set('session.cookie_httponly', 1);
session_start();
date_default_timezone_set('Africa/Lagos');
$useragent_hash = hash('sha256', $useragent);

if ( ! isset($_SESSION['canary'])){
        // Regenerate & delete old session as well
        session_regenerate_id(true);

        $_SESSION['canary'] = [
            'birth' => time(),
            'ip' => $ip,
            'useragent_hash' => $useragent_hash
        ];
}

if ($_SESSION['canary']['ip'] !== $ip OR $_SESSION['canary']['useragent_hash'] !== $useragent_hash){
        // Destroy cookie
        setcookie (session_name(), "", time() - 3600, '/', $domain, true, true);

        // Destroy session
        session_unset();
        session_destroy();
    }


if(!isset($_SESSION['monitor'])){
    $_SESSION['monitor'] = time();
    $monitor = time();
}else{
    $monitor = $_SESSION['monitor'];
}
 //Terminate Session after 10 mins of inactivity
if((time() - $monitor)>3600){
    setcookie (session_name(), "", time() - 3600, '/', $domain, true, true);
    session_unset();
    session_destroy();
}
}

set_my_session($domain,$ip,$useragent);

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
