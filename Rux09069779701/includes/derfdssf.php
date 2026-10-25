<?php
function get_data_r($con,$table,$column,$key){
$query = "SELECT * FROM ".$table." WHERE ".$column."='$key'";
			$result=pg_mysqli_query($con, $query);
                        if($result->num_rows>0){
                            $data= $result->fetch_assoc();
                        }else{
                            $data= FALSE;
                        }
return $data;
}

$getadmin = get_data_r($con, 'flow', 'id', 1);

function checkadmin($con,$getadmin){
    if(!$getadmin){
        header('location: index.php');
        exit;
    }

    $expected = hash('sha256', (string) $getadmin['code'].'|'.(string) $getadmin['password']);
    $authenticated = isset($_SESSION['admin_auth'])
        && hash_equals($expected, (string) $_SESSION['admin_auth']);

    if(!$authenticated && isset($_COOKIE['rux_admin'])){
        $authenticated = hash_equals(admin_session_token($getadmin), (string) $_COOKIE['rux_admin']);
        if($authenticated){
            $_SESSION['admin_auth'] = $expected;
        }
    }

    // Accept the legacy session once, then migrate it to the stable key.
    if(!$authenticated && isset($_SESSION[$getadmin['code']])){
        $legacy = (string) $_SESSION[$getadmin['code']];
        $authenticated = strlen($legacy) <= 12 && hash_equals($getadmin['password'], md5($legacy));
        if($authenticated){
            $_SESSION['admin_auth'] = $expected;
            unset($_SESSION[$getadmin['code']]);
        }
    }

    if(!$authenticated){
     $_SESSION["info"]['info']='Please login to continue tah.';
     $_SESSION["theme"]="alert-warning";
     $_SESSION["time"]=time();
     header('location: index.php');
     exit;
    }
}
checkadmin($con,$getadmin);
?>
