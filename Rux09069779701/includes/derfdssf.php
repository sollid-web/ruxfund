<?php
function get_data_r($con,$table,$column,$key){
$query = "SELECT * FROM ".$table." WHERE ".$column."='$key'";
			$result=mysqli_query($con, $query);
                        if($result->num_rows>0){
                            $data= $result->fetch_assoc();
                        }else{
                            $data= FALSE;
                        }
return $data;
}

$getadmin = get_data_r($con, 'flow', 'id', 1);

function checkadmin($con,$getadmin){
    if(!isset($_SESSION[$getadmin['code']]) || strlen($_SESSION[$getadmin['code']]) > 12 || md5($_SESSION[$getadmin['code']]) !== $getadmin['password']){
     $_SESSION["info"]['info']='Please login to continue tah.';
     $_SESSION["theme"]="alert-warning";
     $_SESSION["time"]=time();
     header('location: index.php');   
    }else{
        $testadmin = get_data_r($con, 'flow', 'password', md5($_SESSION[$getadmin['code']]));
        if($testadmin === FALSE){
          $_SESSION["info"]['info']='Please login to continue toooo.';
          $_SESSION["theme"]="alert-warning";
          $_SESSION["time"]=time();
          header('location: index.php');  
        }
    }
}
checkadmin($con,$getadmin);
?>