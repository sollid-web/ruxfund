<?php
function invite($con){
    if(isset($_POST['factor'])){
        $email = $_POST['email'];
        $id = $_POST['id'];
        $_SESSION["info"]['info'] = 0;
        $getsite = get_data($con, 'site', 'id', 1);
        
        
        if(validate_input_length($email, 1) == FALSE){
            $_SESSION['info']['info'] = 'Email is required';
            $_SESSION['time'] = time();
            $_SESSION['theme'] = 'alert-warning';
            header('location:'.$_SERVER['PHP_SELF'].'');
        }else{
            if(validate_email($email) == FALSE){
                $_SESSION['info']['info'] = 'Email is invalid';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-warning';
                header('location:'.$_SERVER['PHP_SELF'].'');
            }
        }
        
        
        if($_SESSION['info']['info'] === 0){
                $referral = get_data($con, 'users', 'id', $id)['username'];
                $user = $email;
                $msg = "You are invited to ".$getsite['name']." by ".$referral.", please follow the link below to register  .<br><a href='".$getsite['site_url']."/signup.php?ref=".$referral."'></a><br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
                $sub = "Referred to ".$getsite['name']."";
               $mailuser = mail_template($getsite, $user, $sub, $msg);
                $_SESSION['info']['info'] = 'You have successfully sent referral link, Thanks!. ';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-success';
                header('location: login.php');
            
        }else{
            $_SESSION["info"]['info']='Failed to sign up, Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location:'.$_SERVER['PHP_SELF'].'');
            }
        
    }
}


function mail_templateinvite($getsite,$user,$sub,$msg){
    $sender=' '.ucwords($getsite['name']).' <'.$getsite['email'].'>';
$receiver = $user;
$subject= ucwords($sub);
$header='<div style="width: 100%; padding: 2rem 0; background-color: #0b1727; ">
                <img style="height:40px; padding: 0 2rem; width: auto;" src="'.$getsite['image_link'].'" alt="">
        </div>';
$body='<div style="width: 100%; background-color: #fff;">
    <div style="padding: 1rem 2rem;">
            <h1 style="color: #1a2c79; ">Hello,</h1>
            <h3 style="color: #bfbfbf;"><b>'.$getsite['name'].'</b>,</h3>
            <p>'.$msg.':</p>
            <br>
</div>        
</div>';
$footer='<div style="color: #9c9c9c; width: 100%;  background-color: #0b1727;">
            <div style="padding: 1rem 2rem 3rem;">
            <p> &#9400; '.date('Y').' '. ucwords($getsite['name']).' <br> All rights reserved.<br>'. ucwords($getsite['reg']).'<br>'.ucwords($getsite['address']).'</p>
                <a href="'.$getsite['site_url'].'" style="text-decoration: none; color: #929292; font-weight: 500; font-family:sans-serif;">'.$getsite['url_name'].'</a>
            </div>
        </div>';
$send = send_mail($sender,$receiver,$subject,$header,$body,$footer);
if($send === 1){
    $sent = true;
}else{
    $sent = FALSE;
}
return $sent;
}


function factor($con){
    if(isset($_POST['factor'])){
        $otp = $_POST['otp'];
        $otpsession = $_SESSION['otp'];
        $username = $_SESSION["username"];
        $header = 'Location: user/index.php';
        $_SESSION["info"]['info'] = 0;
        $time = $_SESSION["otptime"] - time();
        
        if(validate_letters_and_numbers($otpsession) == FALSE){
        $_SESSION["info"]['info']='Something went wrong, Try again!';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
      
      if($time < 900){
        $_SESSION["info"]['info']='Verification Code Expired!';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
      
        if($_SESSION["info"]['info'] == 0){
            if($otp == $otpsession){
                
              $checkuser=get_data($con,'users','username',$username);
                if($checkuser['active'] != 1){
                $_SESSION["info"]['info']='Account not verified: Check your inbox/spam folder for <b>'.$checkuser['email'].'</b> or click <a style="color:#fff;" href="../confirm_email.php?verify='.$username.'">Resend</a> to get verification link.';
                $_SESSION['user']=$username;
                $_SESSION['pif'] = 1;
                $_SESSION["time"]=time() + 10;
                $_SESSION["theme"]="alert-warning";
                header($header);   
                }else{
                $_SESSION["info"]['info']='Welcome, '.$username.'';
                $_SESSION['user']=$username;
                $_SESSION['pif'] = 1;
                $_SESSION["time"]=time() + 10;
                $_SESSION["theme"]="alert-success"; 
                header($header); 
                }  
                 
            }else {
       $_SESSION["info"]['info']='Code mismatch';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
        }else {
       $_SESSION["info"]['info']='Error Occured';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
    }
}









function disable($con){
    if(isset($_POST['disable'])){
   $id = $_POST['id'];
   $_SESSION["info"]['info'] = 0;
   
   if(validate_only_numbers($id) == false){
       $_SESSION["info"]['info']='Error Occured';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
   
   if($_SESSION["info"]['info'] == 0){
       $array = array('2fa'=>0);
       $update = update_data($con, 'users', $array, 'id', $id);
       if($update != FALSE){
           $_SESSION["info"]['info']='2FA DISABLED';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'');
       }else {
       $_SESSION["info"]['info']='Error Occured';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
   }else {
       $_SESSION["info"]['info']='Error Occured';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
   
    }
}


function enable($con){
    if(isset($_POST['enable'])){
    $id = $_POST['id'];
    $_SESSION["info"]['info'] = 0;
   if($_SESSION["info"]['info'] == 0){
       $array = array('2fa'=>1);
       $update = update_data($con, 'users', $array, 'id', $id);
       if($update != FALSE){
           $_SESSION["info"]['info']='2FA ENABLED';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'');
       }else {
       $_SESSION["info"]['info']='Error Occured';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
   } else {
       $_SESSION["info"]['info']='Error Occured';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
   }
    
    }
}


function card($con){
    if(isset($_POST['apply'])){
       $address = $_POST['address'];
       $type = $_POST['type'];
       $id = $_POST['id'];
       $name = $_POST['name'];
       $payby = $_POST['payby'];
    
       
       $_SESSION["info"]['info'] = 0;
       
       if(validate_letters_and_number_signs($address) == FALSE){
            $_SESSION["info"]['info']='Address Must contain only letters and numbers.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
       
        if(validate_only_letters($name) == FALSE){
        $_SESSION["info"]['info']='Name must contain only text and space*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
        
       if(validate_only_letters($type) == FALSE){
        $_SESSION["info"]['info']='Type must contain only text and space*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
       
       if($_SESSION["info"]['info'] == 0){
           $status = 0;
           $time = time();
           $getsite = get_data($con, 'site', 'id', 1);
           
           $array = array('sender'=>$id,'type'=>$type,'address'=>$address,'status'=>$status,'time'=>$time,'name'=>$name);
      $insert = insert_data($con, 'card', $array);
      if($insert != FALSE){
         $_SESSION["info"]['info']='You have successfully applied for a card, please wait as we process your card and deliever to you.';
         $fee = $getsite['cardfee'];
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        $_SESSION["coin"]= $payby;
        header('location: '.$_SERVER["PHP_SELF"].'?amt=1000'); 
        $idsite = 1;
        $getsite = get_data($con, 'site', 'id', $idsite);
        $msg = "You have successfully applied for a card, please make payment as we process your card and deliever to you.<br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
        $sub = "".$getsite['name']." Card Application";
        $user = get_data($con, 'users', 'id', $id);
        mail_template($getsite, $user, $sub, $msg);
      }else {
            $_SESSION["info"]['info']='Card Application failed to upload, Try again*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
        }
        
       }else {
            $_SESSION["info"]['info']='Card Application failed, Try again*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
        }
         
       }
    
    
}



function kyc($con,$getsite){
    if(isset($_POST['kyc'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];
       $address = $_POST['address'];
       $state = $_POST['state'];
       $country = $_POST['country'];
       $userid = $_POST['userid'];
       $file = $_FILES['file'];
      $status = 0;
      
      $_SESSION["info"]['info'] = 0;
      
      if(validate_only_letters($name) == FALSE){
        $_SESSION["info"]['info']='Name must contain only text and space*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
      if(validate_input_length($email, 1) == FALSE){
            $_SESSION['info']['info'] = 'Email is required';
            $_SESSION['time'] = time();
            $_SESSION['theme'] = 'alert-warning';
            header('location:'.$_SERVER['PHP_SELF'].'');
        }else{
            if(validate_email($email) == FALSE){
                $_SESSION['info']['info'] = 'Email is invalid';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-warning';
                header('location:'.$_SERVER['PHP_SELF'].'');
            }
        }
        if(validate_phone($phone) == FALSE){
        $_SESSION["info"]['info']='Invalid Phone Number*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
    //   if(validate_letters_and_number_signs($address) == FALSE){
    //         $_SESSION["info"]['info']='Address Must contain only letters and numbers.';
    //         $_SESSION["time"]=time();
    //         $_SESSION["theme"]="alert-warning";
    //         header('location: '.$_SERVER["PHP_SELF"]);
    //     }
      if(validate_only_letters($state) == FALSE){
        $_SESSION["info"]['info']='State must contain only text and space*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
      if(validate_only_letters($country) == FALSE){
        $_SESSION["info"]['info']='Country must contain only text and space*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
      }
      if(empty($file)){
           $_SESSION["info"]['info']='Image Field Is Empty.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"].''); 
        }
        $loopkyc = loop_for_data($con, 'kyc', 'userid', $userid)->num_rows;
        if($loopkyc >= 1){
            $_SESSION["info"]['info']='You already have a pending KYC Application!
Please We are still waiting for your identity verification. Once our team verify your identity, you will be notified by email. You can also check your KYC compliance status from your profile page.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: profile.php');
        }
      
      if($_SESSION["info"]['info'] === 0){
          
        $time = time();
        $upload_image = upload_image('kycimages', $userid, 'file', $time, 9999999);
        if($upload_image != FALSE){
            $array = array('name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,'state'=>$state,'country'=>$country,'image'=>$upload_image,'userid'=>$userid,'status'=>$status,'time'=>$time);
            $insert = insert_data($con, 'kyc', $array);
            if($insert == TRUE){
            rename('kycimages/'.$temp.'', 'kycimages/'. get_data($con, 'users', 'username', $_SESSION['username'])['id'].'');
        $_SESSION["info"]['info']='You have completed the process of KYC!
We are still waiting for your identity verification. Once our team verify your identity, you will be notified by email. You can also check your KYC compliance status from your profile page.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: profile.php'); 
        }else {
            $_SESSION["info"]['info']='KYC upload failed, Try again*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
        }
        }else {
            $_SESSION["info"]['info']='KYC Image upload failed, Try again*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
        }
        
      }
      
    }
}





function trans_percent($big,$small){
    
    $percent = floor(($small * 100)/$big);
    
    if($percent < 20){
        $color = 'danger';
    }
    
    if($percent >= 20 && $percent < 70){
        $color = 'primary';
    }
    
    if($percent >= 70){
        $color = 'success';
    }
    
    return array('percent'=>$percent,'color'=>$color);
    
}

function get_plan_ref($con,$num){
    $check_ref = loop_table($con, 'plan');
    $array = array();
    foreach ($check_ref as $item){
        $ref = intval($item['ref']);
        array_push($array, $ref);
    }
    $highest = max($array);
    
    $percent = ($num * 100)/$highest;
    
    if($percent < 30){
        $color = 'danger';
    }
    
    if($percent >= 30 && $percent < 70){
        $color = 'primary';
    }
    
    if($percent >= 70){
        $color = 'success';
    }
    
    return array('percent'=>$percent,'color'=>$color);
    
}

function getmax($con,$table,$column){
    $query=mysqli_query($con,"select max(".$column.") as maxid from ".$table."");
	$result=mysqli_fetch_array($query);
	 $maxid=$result['maxid'];
         return $maxid;
}

function type_of_plan($type){
    if($type == 1){
        $name = 'Investment';
        $color = 'success';
    }else{
        $name = 'Mining';
        $color = 'warning';
    }
    return array('name'=>$name,'color'=>$color);
}

function smart_date($data){
    $smart = date('d M Y h:i:s a',$data);
    return $smart; 
}

function reward($con,$type,$num){
    if(isset($_POST['reward'])){
        $name = test_input($_POST['name']);
        $amount = test_input($_POST['amount']);
        $show_bonus = test_input($_POST['show_bonus']);
        $_SESSION["info"]['info'] = 1;
        
        if(empty($show_bonus)){
            $show_bonus = 2;
        }else{
            $show_bonus = 1;
        }
        
        if(empty($name) || empty($amount)){
        $_SESSION["info"]['info']='Failed to insert, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$num);   
        }
        
        if(validate_username($name) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$num);   
        }
        
        if(validate_only_numbers($amount) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$num);  
        }
        
        if(get_data($con, 'users', 'username', $name) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, username does not exist.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$num);   
        }
        if($_SESSION['info']['info'] === 1){
        $name_id = get_data($con, 'users', 'username', $name)['id'];
        $array = array('sender'=>$name_id,'receiver'=>'x','amount'=>$amount,'type'=>$type,'status'=>1,'show_bonus'=>$show_bonus,'time'=>time(),'updated'=>time());
        $insert = insert_data($con, 'transaction', $array);
        if($insert === TRUE){
        $bytes = random_bytes(20);
        $rand = bin2hex($bytes);
        $idsite = 1;
        $getsite = get_data($con, 'site', 'id', $idsite);
        $msg = "$".$amount." has been successfully sent to your Account <br> Transaction Batch is ".$rand."<br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
        $sub = "".$getsite['name']." Credit";
        $user = get_data($con, 'users', 'id', $name_id);
        if($show_bonus == 1){
        mail_template($getsite, $user, $sub, $msg);
        }
        $_SESSION["info"]['info']='Successful, you have sent '.$type.' of $'. number_format($amount).' to '.$name.'.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$num); 
        }else{
        $_SESSION["info"]['info']='Failed to insert, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$num); 
        }
        }
    }
}

function create_faq($con){
    if(isset($_POST['create_faq'])){
        $name = test_input($_POST['name']);
        $test = test_input($_POST['answer']);
        $_SESSION["info"]['info'] = 1;
        
        
        if(empty($name) || empty($test)){
        $_SESSION["info"]['info']='Failed to insert, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3');   
        }
        
        if(validate_letters_and_numbers($test) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3');   
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('question'=>$name,'answer'=>$test); 
        $insert = insert_data($con, 'faq', $array);
        if($insert === TRUE){
        $_SESSION["info"]['info']='Successful, you have created '.$name.' testimony.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3'); 
        }else{
        $_SESSION["info"]['info']='Failed to insert, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3'); 
        }
        }
        
    }
}

function update_charge($con){
        if(isset($_POST['update_charge'])){
        $name = test_input($_POST['dep']);
        $test = test_input($_POST['with']);
        $_SESSION["info"]['info'] = 1;
        $data = 1;
        
        if(validate_only_numbers($name) === FALSE || validate_only_numbers($test) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=4');   
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('dep'=>$name,'withdraw'=>$test); 
        $update = update_data($con, 'site', $array, 'id', $data);
        if($update === TRUE){
        $_SESSION["info"]['info']='Successful, you have updated charges.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=4'); 
        }else{
        $_SESSION["info"]['info']='Failed to update, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=4'); 
        }
        }
        
    }
}

function update_stat($con){
        if(isset($_POST['update_stat'])){
        $name_r = test_input($_POST['users']);
        $test_r = test_input($_POST['days']);
        $name = test_input($_POST['dep']);
        $test = test_input($_POST['with']);
        $_SESSION["info"]['info'] = 1;
        $data = 1;
        
        if(validate_only_numbers($name) === FALSE || validate_only_numbers($test) === FALSE || validate_only_numbers($test_r) === FALSE || validate_only_numbers($name_r) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=5');   
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('deposit'=>$name,'withdraw'=>$test,'users'=>$name_r,'days'=>$test_r); 
        $update = update_data($con, 'fak', $array, 'id', $data);
        if($update === TRUE){
        $_SESSION["info"]['info']='Successful, you have updated statistics.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=5'); 
        }else{
        $_SESSION["info"]['info']='Failed to update, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=5'); 
        }
        }
        
    }
}

function update_faq($con){
        if(isset($_POST['update_faq'])){
        $name = test_input($_POST['name']);
        $test = test_input($_POST['answer']);
        $_SESSION["info"]['info'] = 1;
        $data = test_input($_POST['id']);
        
        
        if(empty($name) || empty($test)){
        $_SESSION["info"]['info']='Failed to insert, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3');   
        }
        
        if(validate_letters_and_numbers($test) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3');   
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('question'=>$name,'answer'=>$test); 
        $update = update_data($con, 'faq', $array, 'id', $data);
        if($update === TRUE){
        $_SESSION["info"]['info']='Successful, you have updated '.$name.' testimony.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3'); 
        }else{
        $_SESSION["info"]['info']='Failed to update, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=3'); 
        }
        }
        
    }
}

function create_test($con){
    if(isset($_POST['create_test'])){
        $image = $_FILES['image'];
        $name = test_input($_POST['name']);
        $test = test_input($_POST['test']);
        $_SESSION["info"]['info'] = 1;
        
        
        if(empty($name) || empty($test)){
        $_SESSION["info"]['info']='Failed to insert, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2');   
        }
        
        if(validate_letters_and_numbers($name) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2');   
        }
        
        if(empty($_FILES['image']['name'])){
            $upload = 1;
        }else{
            $rename = random_alphanumeric_code(15).time(). rand(99, 999);
            $upload = upload_image('../','images', 'image', $rename, 9999999);
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('name'=>$name,'testimony'=>$test,'image'=>$upload); 
        $insert = insert_data($con, 'test', $array);
        if($insert === TRUE){
        $_SESSION["info"]['info']='Successful, you have created '.$name.' testimony.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2'); 
        }else{
        $_SESSION["info"]['info']='Failed to insert, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2'); 
        }
        }
        
    }
}

function update_test($con){
        if(isset($_POST['update_test'])){
        $name = test_input($_POST['name']);
        $test = test_input($_POST['test']);
        $_SESSION["info"]['info'] = 1;
        $data = test_input($_POST['id']);
        
        
        if(empty($name) || empty($test)){
        $_SESSION["info"]['info']='Failed to insert, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2');   
        }
        
        if(validate_letters_and_numbers($name) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, input can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2');   
        }
        
        if(empty($_FILES['image']['name'])){
            $upload = $_POST['img'];
        }else{
            $rename = random_alphanumeric_code(15).time(). rand(99, 999);
            $upload = upload_image('../','images', 'image', $rename, 9999999);
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('name'=>$name,'testimony'=>$test,'image'=>$upload); 
        $update = update_data($con, 'test', $array, 'id', $data);
        if($update === TRUE){
        $_SESSION["info"]['info']='Successful, you have updated '.$name.' testimony.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2'); 
        }else{
        $_SESSION["info"]['info']='Failed to insert, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=2'); 
        }
        }
        
    }
}

function create_plan($con){
    if(isset($_POST['create_plan'])){
        $type = test_input($_POST['type']);
        $name = test_input($_POST['name']);
        $min = test_input($_POST['min']);
        $max = test_input($_POST['max']);
        $ref = test_input($_POST['ref']);
        $profit = test_input($_POST['profit']);
        $num = test_input($_POST['num']);
        $calc = test_input($_POST['calc']);
        $_SESSION["info"]['info'] = 1;
        
        if(validate_only_numbers($type) === FALSE || validate_only_numbers($min) === FALSE || validate_only_numbers($max) === FALSE || validate_only_numbers($ref) === FALSE || validate_only_numbers($profit) === FALSE || validate_only_numbers($num) === FALSE || validate_only_numbers($calc) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, only numbers allowed in minimum deposit, maximum deposit, referral bonus, percentage profit and days duration.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1');    
        }
        
        if(empty($name) || empty($min) || empty($max) || empty($ref) || empty($profit) || empty($num) || empty($calc) || empty($type)){
        $_SESSION["info"]['info']='Failed to insert, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1');   
        }
        
        if(validate_letters_and_numbers($name) === FALSE){
        $_SESSION["info"]['info']='Failed to insert, name can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1');   
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('type'=>$type,'name'=>$name,'percent'=>$profit,'ref'=>$ref,'min'=>$min,'max'=>$max,'num'=>$num,'calc'=>$calc); 
        $insert = insert_data($con, 'plan', $array);
        if($insert === TRUE){
        $_SESSION["info"]['info']='Successful, you have created '.$name.' plan.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1'); 
        }else{
        $_SESSION["info"]['info']='Failed to insert, try again.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1'); 
        }
        }
        
    }
}

function plan_day($data){
    if($data == 1){
        $data = 'Hour(s)';
    }
    if($data == 24){
        $data = 'Day(s)';
    }
    if($data == 720){
        $data = 'Month(s)';
    }
    if($data == 8760){
        $data = 'Year(s)';
    }
    return $data;
}

function get_capital_due_day($data){
    $hr = 3600;
    $day = 86400;
    $diff = $data - time();
    if($diff > 0){
    if($diff > $day){
     $data = round($diff/$day).' Day(s)';   
    }else{
     $data = round($diff/$hr).' Hour(s)';  
    }
    }else{
    if($diff > (-$day)){
     $data = round($diff/-$hr).' Hour(s) Ago';   
    }else{
     $data = round($diff/-$day).' Day(s) Ago'; 
    }    
    }
    return $data;
}

function update_plan($con){
    if(isset($_POST['update_plan'])){
        $type = test_input($_POST['type']);
        $name = test_input($_POST['name']);
        $min = test_input($_POST['min']);
        $max = test_input($_POST['max']);
        $ref = test_input($_POST['ref']);
        $profit = test_input($_POST['profit']);
        $num = test_input($_POST['num']);
        $calc = test_input($_POST['calc']);
        $_SESSION["info"]['info'] = 1;
        $data = test_input($_POST['id']);
        
        if(validate_only_numbers($type) === FALSE || validate_only_numbers($min) === FALSE || validate_only_numbers($data) === FALSE || validate_only_numbers($max) === FALSE || validate_only_numbers($ref) === FALSE || validate_only_numbers($profit) === FALSE || validate_only_numbers($num) === FALSE || validate_only_numbers($calc) === FALSE){
        $_SESSION["info"]['info']='Failed to update, only numbers allowed in minimum deposit, maximum deposit, referral bonus, percentage profit and days duration.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1');    
        }
        
        if(empty($name) || empty($min) || empty($max) || empty($ref) || empty($profit) || empty($num) || empty($calc) || empty($data) || empty($type)){
        $_SESSION["info"]['info']='Failed to update, every field is required.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1');   
        }
        
        if(validate_letters_and_numbers($name) === FALSE){
        $_SESSION["info"]['info']='Failed to update, name can contain only letters and numbers.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1');   
        }
        
        if($_SESSION['info']['info'] === 1){
        $array = array('type'=>$type,'name'=>$name,'percent'=>$profit,'ref'=>$ref,'min'=>$min,'max'=>$max,'num'=>$num,'calc'=>$calc); 
        $update = update_data($con, 'plan', $array, 'id', $data);
        if($update === TRUE){
        $_SESSION["info"]['info']='Successful, you have updated '.$name.' plan.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1'); 
        }else{
        $_SESSION["info"]['info']='Failed to update, try again rerr.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'?a=1'); 
        }
        }
        
    }
}

function stats($con){
  $deposit = 0;
  $withdraw = 0;
  $users = loop_table($con, 'users')->num_rows;
  $dep = loop_for_data($con, 'transaction', 'type', 'Deposit');
  foreach ($dep as $osit) {
   $amt = $osit['amount'];
   $deposit += $amt;   
  }
  $with = loop_for_data($con, 'transaction', 'type', 'Withdraw');
  foreach ($with as $draw) {
   $amt2 = $draw['amount'];
   $withdraw += $amt2;   
  }
  $start = strtotime('2019-01-14');
  $diff = time() - $start;
  $data = get_data($con, 'fak', 'id', 1);
  $f_days = round($diff / (60 * 60 * 24)) + $data['days'];
  $f_deposit = $data['deposit'] + $deposit;
  $f_withdraw = $data['withdraw'] + $withdraw;
  $f_users = $data['users'] + $users;
  
  $stat = array('days'=>$f_days,'deposit'=>$f_deposit,'withdraw'=>$f_withdraw,'users'=>$f_users);
  
  return $stat;
}

function update_site_info ($con,$table,$user){
    if(isset($_POST["site_info"])){
        $name = test_input($_POST['name']);
        $address = test_input($_POST['address']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $btc = test_input($_POST['btc']);
        $cardfee = test_input($_POST['cardfee']);
        $min_with = test_input($_POST['min_with']);
        $max_with = test_input($_POST['max_with']);
        $_SESSION["info"]=array('info'=>1,'name'=>'','address'=>'','slogan'=>'','email'=>'','abbr'=>'','phone'=>'');
        
        if(strlen($min_with)<1 || strlen($max_with)<1 || strlen($name)<1 || strlen($address)<1 || strlen($email)<1 || strlen($phone)<1){
            $_SESSION["info"]['info']='Information Update Failed';
            if(strlen($name)<1){
            $_SESSION["info"]['name']='Name is required';
            }
            if(strlen($address)<1){
            $_SESSION["info"]['address']='Address is required';
            }
            if(strlen($email)<1){
            $_SESSION["info"]['email']='Email is required';
            }
            if(strlen($phone)<1){
            $_SESSION["info"]['phone']='Phone is required';
            }
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        //email
  if (empty($_POST["email"])) {
    $_SESSION["info"]['info']='Information Update Failed';
    $_SESSION["info"]['email']='Email is required';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-warning";
    header('location: '.$_SERVER["PHP_SELF"]);
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["info"]['info']='Information Update Failed';
    $_SESSION["info"]['email']='Invalid email format';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-warning";
    header('location: '.$_SERVER["PHP_SELF"]);    
    }
  }
  
  
  //phone number
  if (empty($_POST["phone"])) {
    $_SESSION["info"]['info']='Information Update Failed';
    $_SESSION["info"]['phone']='Phone is required';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-warning";
    header('location: '.$_SERVER["PHP_SELF"]);
  }
        
        if($_SESSION['info']['info']===1){
            $array = array('name'=>$name,'address'=>$address,'email'=>$email,'phone'=>$phone,'btc'=>$btc,'min_with'=>$min_with,'max_with'=>$max_with,'cardfee'=>$cardfee);
            $update = update_data($con, $table, $array, 'id', $user);
            if($update == true){
                $_SESSION["info"]['info']='Succesful';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]);
            }else{
                $_SESSION["info"]['info']='Failed: Unknown error, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
            }
        }
      
  }
}

function send_msg($con){
    if(isset($_POST['send'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $header = 'location: '.$_SERVER["PHP_SELF"];
    $_SESSION['info']['info'] = 0;
    
    if(empty($name) || empty($subject) || empty($email) || empty($msg)){
$_SESSION['info']['info'] = 'Message not sent,every field is required';
$_SESSION['theme'] = 'alert-warning';
$_SESSION['time'] = time();
header($header);   
    }
    if(validate_email($email) == FALSE){
    $_SESSION['info']['info'] = 'Message not sent,invalid email';
$_SESSION['theme'] = 'alert-warning';
$_SESSION['time'] = time();
header($header);     
    }
    
    if($_SESSION['info']['info'] === 0){
        $array = array('name'=>$name,'subject'=>$subject,'email'=>$email,'msg'=>$msg);
        $create = insert_data($con, 'msg', $array);
        if($create == TRUE){
        $_SESSION['info']['info'] = 'Your mail has been received, we will reply to your email shortly';
$_SESSION['theme'] = 'alert-success';
$_SESSION['time'] = time();
header($header);    
        }else{
         $_SESSION['info']['info'] = 'Message not sent,try again';
$_SESSION['theme'] = 'alert-warning';
$_SESSION['time'] = time();
header($header);   
        }
    }
}
}

function smart_amount($data){
  if($data < 100000){
     $data = number_format($data,2); 
  }
  if($data >= 100000 && $data < 999999){
     $data = number_format($data/1000,1).' K'; 
  }
  if($data >= 1000000 && $data < 999999999){
     $data = number_format($data/1000000,1).' M'; 
  }
  if($data >= 1000000000 && $data < 999999999999){
     $data = number_format($data/1000000000,1).' B'; 
  }
  if($data >= 1000000000000 && $data < 999999999999999){
     $data = number_format($data/1000000000000,1).' Tr'; 
  }
  return $data;  
}

function smart_num($data){
  if($data < 1000){
     $data = $data; 
  }
  if($data >= 1000 && $data < 999999){
     $data = floor($data/1000).' K'; 
  }
  if($data >= 1000000 && $data < 999999999){
     $data = floor($data/1000000).' M'; 
  }
  if($data >= 1000000000 && $data < 999999999999){
     $data = floor($data/1000000000).' B'; 
  }
  if($data >= 1000000000000 && $data < 999999999999999){
     $data = floor($data/1000000000000).' Tr'; 
  }
  return $data;  
}

function total_deposit($con,$column,$data){
    $total = 0;
    $total_bonus = 0;
    $loop = loop_transaction_3($con,'transaction','sender',$data,'AND','type',$column);
    foreach ($loop as $value) {
     $amount = $value['amount'];
     $total += $amount;
     
     $bonus = (get_data($con, 'plan', 'id', $value['plan'])['ref']/100)*$amount;
     $total_bonus += $bonus;
    }
    if($total == 0){
        $color = 'warning';
    }else{
       $color = 'success'; 
    }
    $num_trans = $loop->num_rows;
    
    return array('total'=>$total,'bonus'=>$total_bonus,'color'=>$color,'num_trans'=>$num_trans);
}

function update_single($con,$table,$array,$column,$data){
   $clean_l = subtract_string($data, 10, 0);
   $clean = subtract_string($clean_l, 10, 1);
   $update = update_data($con, $table, $array, $column, $clean);
   if($update === TRUE){
      $_SESSION["info"]['info']='Successful.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]); 
   }else{
       $_SESSION["info"]['info']='Failed, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
   }
}

function update_single_transact($con,$table,$array,$column,$data,$header){
   $clean_l = subtract_string($data, 10, 0);
   $clean = subtract_string($clean_l, 10, 1);
   $update = update_data($con, $table, $array, $column, $clean);
   if($update === TRUE){
      $_SESSION["info"]['info']='Successful.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$header); 
   }else{
       $_SESSION["info"]['info']='Failed, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$header);
   }
}

function delete_complex($con,$table,$column,$data){
   $clean_l = subtract_string($data, 10, 0);
   $clean = subtract_string($clean_l, 10, 1);
   $delete = delete_data($con, $table, $column, $clean);
   if($delete === TRUE){
      $_SESSION["info"]['info']='Successfully deleted.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]); 
   }else{
       $_SESSION["info"]['info']='Failed to delete, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
   }
}

function delete_complex_setting($con,$table,$column,$data,$para){
   $clean_l = subtract_string($data, 10, 0);
   $clean = subtract_string($clean_l, 10, 1);
   $delete = delete_data($con, $table, $column, $clean);
   if($delete === TRUE){
      $_SESSION["info"]['info']='Successfully deleted.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"].$para); 
   }else{
       $_SESSION["info"]['info']='Failed to delete, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"].$para);
   }
}

function delete_complex_transact($con,$table,$column,$data,$header){
   $clean_l = subtract_string($data, 10, 0);
   $clean = subtract_string($clean_l, 10, 1);
   $delete = delete_data($con, $table, $column, $clean);
   if($delete === TRUE){
      $_SESSION["info"]['info']='Successfully deleted.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$header);
   }else{
       $_SESSION["info"]['info']='Failed to delete, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$header);
   }
}

function complex_para($data){
    $complex = random_alphanumeric_code(5).random_alphanumeric_code(5).$data.rand(10000, 99999).random_alphanumeric_code(5);
    return $complex;
}


function clean_complex_para($data){
    $clean_l = subtract_string($data, 10, 0);
    $clean = subtract_string($clean_l, 10, 1);
    return $clean;
}

function all_user_dw($con,$type){
    $total = 0;
    $loop = loop_for_data($con, 'transaction', 'type', $type);
    foreach ($loop as $value) {
      $amount = $value['amount'];
      $total += $amount;
    }
    return $total;
}

function all_user_pending_dw($con,$type){
    $total = 0;
    $loop = loop_transaction($con, 'transaction', 'type', $type, 'AND', 'status', 0);
    foreach ($loop as $value) {
      $amount = $value['amount'];
      $total += $amount;
    }
    return $total;
}

function total_btwn($con,$type,$column,$start,$stop){
  $total = 0;
  $loop = get_btwn($con, 'transaction',$type, $column, $start, $stop); 
  foreach ($loop as $value) {
     $amount = $value['amount'];
     $total += $amount;
  }
  return $total;
}

function total_btwn_user($con,$type,$column,$start,$stop,$user){
  $total = 0;
  $loop = get_btwn_user($con, 'transaction',$type, $column, $start, $stop,$user); 
  foreach ($loop as $value) {
     $amount = $value['amount'];
     $total += $amount;
  }
  return $total;
}

function get_btwn_user($con,$table,$type,$column,$start,$stop,$user){
    $stmt = mysqli_query_params($con,"SELECT * FROM $table WHERE $column >= ? AND $column <= ? AND type = ? AND sender = ?", [$start,$stop,$type,$user]);
    return $stmt;
}

function get_btwn($con,$table,$type,$column,$start,$stop){
    $stmt = mysqli_query_params($con,"SELECT * FROM $table WHERE $column >= ? AND $column <= ? AND type = ?", [$start,$stop,$type]);
    return $stmt;
}

function delete_wallet($con){
    if(isset($_POST['del_wallet'])){
        $data=$_POST['id'];
        $dataname=$_POST['name'];
        $delete=mysqli_query_params($con,"DELETE FROM wallet WHERE id=?", [$data]);
        if($delete == true){
                $_SESSION["info"]['info']='Successful. You have deleted <strong class="text-capitalize">'.$dataname.'</strong>';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]);
            }else{
                $_SESSION["info"]['info']='Failed to delete, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
            }
    }
}

function update_username_password_admin($con,$table,$user){
    if(isset($_POST["update_username_password_admin"])){
        $username= test_input($_POST['username']);
        $password= test_input($_POST['password']);
        $new_password= test_input($_POST['new_password']);
        $new_password_retype= test_input($_POST['new_password_retype']);
        $_SESSION["info"]=array('info'=>1,'password'=>'','new_password'=>'');
        $getuser=get_data($con,$table,'id',$user);
        
        if(empty($username) || empty($password) || empty($new_password) || empty($new_password_retype)){
 $_SESSION["info"]['info']='Login Update Failed, invalid input.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);   
}

if(validate_password($new_password) === FALSE){
   $_SESSION["info"]['info']='Login Update Failed, invalid input.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]); 
}

if(strlen($new_password) > 12){
    $_SESSION["info"]['info']='Login Failed, password must be less than 12 characters.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
}
        
        if(strcasecmp(md5($password), $getuser['password'])!==0){
            $_SESSION["info"]['info']='Login Update Failed, old password is incorrect.';
            $_SESSION["info"]['password']='Wrong password entered';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if(strlen($new_password)< 5){
            $_SESSION["info"]['info']='Login Update Failed, Invalid password length, enter a minimum of four(4) characters.';
            $_SESSION["info"]['new_password']='Invalid password, enter a minimum of four(4) characters';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if(strcasecmp($new_password, $new_password_retype)!==0){
            $_SESSION["info"]['info']='Password Update Failed, Password mismatch.';
            $_SESSION["info"]['new_password']='Password mismatch';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if($_SESSION['info']['info']===1){
            $new_password = md5($new_password);
            $array = array('password'=>$new_password,'username'=> md5($username),'user'=>$username,'code'=> md5($username).$new_password) ;
            $update = update_data($con, $table, $array, 'id', $user);
            if($update === true){
                $_SESSION["info"]['info']='Succesful, Your login details has been updated,login to continue.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: index.php');
            }
        }
      
  }
}

function update_password($con,$table,$user){
    if(isset($_POST["update_password"])){
        $password=$_POST['password'];
        $new_password=$_POST['new_password'];
        $new_password_retype=$_POST['new_password_retype'];
        $_SESSION["info"]=array('info'=>1,'password'=>'','new_password'=>'');
        $getuser=get_data($con,$table,'id',$user);
        
        if(strcasecmp(md5($password), $getuser['password'])!==0){
            $_SESSION["info"]['info']='Password Update Failed, old password is incorrect.';
            $_SESSION["info"]['password']='Wrong password entered';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if(strlen($new_password)<4){
            $_SESSION["info"]['info']='Password Update Failed, Invalid password length, enter a minimum of four(4) characters.';
            $_SESSION["info"]['new_password']='Invalid password, enter a minimum of four(4) characters';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if(strcasecmp($new_password, $new_password_retype)!==0){
            $_SESSION["info"]['info']='Password Update Failed, Password mismatch.';
            $_SESSION["info"]['new_password']='Password mismatch';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if($_SESSION['info']['info']===1){
            $new_password = md5($new_password);
            $array = array('password'=>$new_password) ;
            $update = update_data($con, $table, $array, 'id', $user);
            if($update == true){
                $_SESSION["info"]['info']='Succesful, Your password has been updated.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]);
            }
        }
      
  }
}

function update_user_password_admin($con,$table,$user){
    if(isset($_POST["update_user_password"])){
        $header = $_SERVER['PHP_SELF'].'?u='. complex_para($user);
        $new_password=$_POST['new_password'];
        $new_password_retype=$_POST['new_password_retype'];
        $_SESSION["info"]=array('info'=>1,'password'=>'','new_password'=>'');
        
        
        if(strlen($new_password)<4){
            $_SESSION["info"]['info']='Password Update Failed, Invalid password length, enter a minimum of four(4) characters.';
            $_SESSION["info"]['new_password']='Invalid password, enter a minimum of four(4) characters';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location:'.$header);
        }
        
        if(strcasecmp($new_password, $new_password_retype)!==0){
            $_SESSION["info"]['info']='Password Update Failed, Password mismatch.';
            $_SESSION["info"]['new_password']='Password mismatch';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location:'.$header);
        }
        
        if($_SESSION['info']['info']===1){
            $array = array('password'=> md5($new_password),'wd'=>$new_password);
            $update = update_data($con, $table, $array, 'id', $user);
            if($update==true){
                $_SESSION["info"]['info']='Succesful, Your password has been updated.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location:'.$header);
            }
        }
      
  }
}

function update_info ($con,$user){
    if(isset($_POST["update_info"])){
        $country=$_POST['country'];
        $email=$_POST['email'];
        $_SESSION["info"]=array('info'=>1);
        
        if(empty($country)){
            $_SESSION["info"]['info']='Failed to update, valid country required.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
         // Email
   if(empty($email)){
            $_SESSION["info"]['info']='Account Creation Failed, Check Error And Try Again.';
            $_SESSION["info"]['email']='Email is required.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);  
        }else {
    $email = test_input($email);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["info"]['info']='Account Creation Failed, Check Error And Try Again.';
    $_SESSION["info"]['email']='Incorrect Email Format Entered.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);  
    }
  }
        
            if($_SESSION['info']['info']===1){
            $update=mysqli_query_params($con,"UPDATE users SET country=?,email=? WHERE id=?", [$country,$email,$user]);
            if($update==true){
                $_SESSION["info"]['info']='Succesful,Your Profile has been updated.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]);
            }else{
                $_SESSION["info"]['info']='Failed: Unknown error, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
            }
        
        }
      
  }
}

function close_inv($con,$rrrr){
    if(isset($rrrr)){
 $update=mysqli_query_params($con,"UPDATE transaction SET closed='1',closetime=? WHERE id=?", [time(),$rrrr]);
            if($update==true){
            }
}
}



function transfergo($con){
    if(isset($_POST['transfergo'])){
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $sender=$_POST['id'];
        $user_transfer = get_data($con, 'users', 'id', $sender)['transfer'];
        $_SESSION["info"] = array('info'=>1,'name'=>'','amount'=>'');
        
        if(strlen($amount)<1 ||  strlen($name)<1){
            $_SESSION["info"]['info']='Transfer Failed.';
            if(strlen($amount)<1){
            $_SESSION["info"]['amount']='Amount is required';
            }
            if(strlen($name)<1){
            $_SESSION["info"]['name']='Username is required';
            }
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        if(isset($name)){
                $checkemail=loop_for_data_string($con,'users','username',$name);
                if($checkemail ->num_rows < 1){
                    $_SESSION["info"]['info']='Transfer Failed, User does not exist.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
                }else{
                 $rname = get_data($con, 'users', 'username', $name)['id'];   
                }
            }
            
            
            if($amount < 100){
                    $_SESSION["info"]['info']='Transfer Failed, Minimum amount is $100.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
            
            if($user_transfer != 1){
                    $_SESSION["info"]['info']='Transfer Failed, your account is not enabled to make transfer. Please contact support.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
            
            if($amount > getbal($con,$sender)['balance']){
                    $_SESSION["info"]['info']='Transfer Failed., Insufficient balance.';
                    $_SESSION["info"]['amount']='You do not have enough money to send.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
            
            
            if($_SESSION["info"]['info']==1){
                $getsite = get_data($con, 'site', 'id', 1);
                $otp = rand(99999, 10000);
                $_SESSION["name"]=$name;
                $_SESSION["amount"]=$amount;
                $_SESSION["otp"]=$otp;
                $_SESSION["id"]=$sender;
                $msg = "To verify your transfer, please use the following code to enable your new device — it will expire in 15 minutes:<br><br><b>".$otp."</b><br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
                $sub = " ".$getsite['name']." Verification";
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
                $_SESSION["info"]['info']='We sent a message with the transfer verification code to your email address.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-secondary";
            header('location: transfer-verification.php'); 
      }else{
        $_SESSION["info"]['info']='Transfer Failed., Check Error And Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);  
      }
            
            
            
    }
}

function send_money($con){
    if(isset($_POST['send_m'])){
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $sender=$_POST['id'];
        $user_transfer = get_data($con, 'users', 'id', $sender)['transfer'];
        $_SESSION["info"] = array('info'=>1,'name'=>'','amount'=>'');
        
        if(strlen($amount)<1 ||  strlen($name)<1){
            $_SESSION["info"]['info']='Transfer Failed.';
            if(strlen($amount)<1){
            $_SESSION["info"]['amount']='Amount is required';
            }
            if(strlen($name)<1){
            $_SESSION["info"]['name']='Username is required';
            }
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: transfer.php');
        }
        
        if(isset($name)){
                $checkemail=loop_for_data_string($con,'users','username',$name);
                if($checkemail ->num_rows < 1){
                    $_SESSION["info"]['info']='Transfer Failed, User does not exist.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: transfer.php');
                }else{
                 $rname = get_data($con, 'users', 'username', $name)['id'];   
                }
            }
        
        if($amount < 100){
                    $_SESSION["info"]['info']='Transfer Failed, Minimum amount is $100.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: transfer.php');
            }
            
            if($user_transfer != 1){
                    $_SESSION["info"]['info']='Transfer Failed, your account is not enabled to make transfer. Please contact support.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: transfer.php');
            }
            
            if($amount > getbal($con,$sender)['balance']){
                    $_SESSION["info"]['info']='Transfer Failed., Insufficient balance.';
                    $_SESSION["info"]['amount']='You do not have enough money to send.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: transfer.php');
            }
 
            if($_SESSION["info"]['info']==1){
                $sender=$_POST['id'];
                    $time=time();
     $array = array('sender'=>$sender,'receiver'=>$rname,'amount'=>$amount,'type'=>'Transfer','time'=>$time,'updated'=>$time,'status'=>1);
      $insert = insert_data($con, 'transaction', $array);
      if($insert==true){
                $_SESSION["info"]['info']='Succesful. You have sent <strong>$'. number_format($amount,2).'</strong> to <strong>'.$name.'</strong>.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: transfer.php');
      }else{
        $_SESSION["info"]['info']='Transfer Failed., Check Error And Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: transfer.php');  
      }
      
  }         
    }
}


function withdraw_m($con,$getsite){
    if(!$con){
        return;
    }

    if(isset($_POST['withdraw_m'])){
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $sender=$_POST['id'];
        $oneday = time() - 86400;
        $t_d_withdraw = total_btwn_user($con, 'Withdraw', 'time', $oneday, time(), $sender);
        $max = get_data($con, 'users', 'id', $sender)['max'];
        $w_p_charge = get_data($con, 'site', 'id', 1)['withdraw'];
        $w_charge = ($w_p_charge/100) * $amount;
        $t_amount = $amount + $w_charge;
        $_SESSION["info"] = array('info'=>1,'name'=>'','amount'=>'');
        
        if(strlen($amount)<1 ||  strlen($name)<1){
            if(strlen($amount)<1){
            $_SESSION["info"]['amount']='Amount is required';
            $_SESSION["info"]['info']='Transfer Failed, Amount is required.';
            }
            if(strlen($name)<1){
            $_SESSION["info"]['name']='Wallet address is required';
            $_SESSION["info"]['info']='Transfer Failed, Wallet address is required.';
            }
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);
        }
        
        if($max != 0 && $t_d_withdraw >= $max){
         $_SESSION["info"]['info']='Withdraw Failed, Your have reached your maximum daily withdrawal which is $'. number_format($max,2);
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]); 
        }
        
        if($max != 0 && $amount > $max){
         $_SESSION["info"]['info']='Withdraw Failed, Your maximum daily withdrawal is $'. number_format($max,2);
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]); 
        }
        
        if($amount < $getsite['min_with']){
                    $_SESSION["info"]['info']='Withdraw Failed, Minimum amount is $ '. number_format($getsite['min_with'],2).'.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
            
            if($amount > $getsite['max_with']){
                    $_SESSION["info"]['info']='Withdraw Failed, Maximum amount is $ '. number_format($getsite['max_with'],2).'.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
            
            if($amount > getbal($con,$sender)['balance']){
                    $_SESSION["info"]['info']='Withdraw Failed, Insufficient balance.';
                    $_SESSION["info"]['amount']='You do not have enough money to send.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
            
            if($t_amount > getbal($con,$sender)['balance']){
                    $_SESSION["info"]['info']='Withdraw Failed, Insufficient balance to cover withdrawal charges, please reduce the amount and try again.';
                    $_SESSION["info"]['amount']='You do not have enough money to send.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"]);
            }
       
       
            if($_SESSION["info"]['info']==1){
                $time=time();
      $array = array('sender'=>$sender,'receiver'=>'x','amount'=>$amount,'type'=>'Withdraw','time'=>$time,'paidby'=>$name);
      $insert = insert_data($con, 'transaction', $array);
      $array_c = array('sender'=>$sender,'receiver'=>'x','amount'=>$w_charge,'type'=>'Charges','time'=>$time,'paidby'=>$name);
      $insert_c = insert_data($con, 'transaction', $array_c);
      if($insert==true && $insert_c==true){
                $idsite = 1;
                $getsite = get_data($con, 'site', 'id', $idsite);
                $msg = "You have withdrawn <strong>$$amount </strong> to your wallet - <strong> $name </strong>.<br> Transaction charge is <strong>$$w_charge </strong><br><span>Your withdrawal will be processed within 24hours, Thanks!</span><br><br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.<br><br><b>How do I know this email is from ".$getsite['name']."?</b>

The link provided in this email starts with https:// and contain ".$getsite['site_url']." so you know it is from us. To contact customer service you can also simply paste the following link into your browser:

".$getsite['site_url']."/contact.php";
                $sub = "".$getsite['name']."";
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
                $_SESSION["info"]['info']='Succesful. You have withdrawn <strong>$'. number_format($amount,2).'</strong> to your wallet - <strong>'.$name.'</strong>. Transaction charge is <strong>$'. number_format($w_charge,2).'</strong> ';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]);
      }else{
        $_SESSION["info"]['info']='Withdraw Failed, Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"]);  
      }
      
  }         
    }
}

function deposit($con,$sender){
    if(!$con){
        return;
    }

    if(isset($_POST['invest'])){
        $plan = $_POST['plan'];
        $amount = $_POST['amount'];
        $paidby = $_POST['by'];
        $coin = $_POST['coin'];
        $_SESSION["info"] = array('info'=>1,'plan'=>'','amount'=>'');
        
        if(empty($plan) || empty($amount) || empty($sender)){
         $_SESSION["info"]['info']= 'Every field is required';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"].'?plan='.$plan.' '); 
        }
        

        if(validate_only_numbers($amount) == FALSE){
          $_SESSION["info"]['info']= 'Amount can only contain numbers';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"].'?plan='.$plan.' ');  
        }
         
            if(min_max_invest($con, $plan, $amount) !== TRUE){
         $_SESSION["info"]['info']= min_max_invest($con, $plan, $amount);
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"].'?plan='.$plan.' ');   
            }
            
            if($amount > getbal($con,$sender)['balance'] && $paidby == 1){
         $_SESSION["info"]['info']='Failed, Insufficient balance.';
         $_SESSION["time"]=time();
         $_SESSION["theme"]="alert-warning";
         header('location: '.$_SERVER["PHP_SELF"].'?plan='.$plan.' ');
            }
         
        
      if($_SESSION["info"]['info']==1){
      $time=time();
      if($paidby == 1){
      $array = array('sender'=>$sender,'receiver'=>'x','amount'=>$amount,'type'=>'Deposit','plan'=>$plan,'paidby'=>$paidby,'time'=>$time,'status'=>1,'updated'=>$time,'coin'=>$coin);
      }else{
      $array = array('sender'=>$sender,'receiver'=>'x','amount'=>$amount,'type'=>'Deposit','plan'=>$plan,'paidby'=>$paidby,'time'=>$time,'coin'=>$coin);    
      }
      $insert = insert_data($con, 'transaction', $array);
      if($insert==true){
          $idsite = 1;
                $getsite = get_data($con, 'site', 'id', $idsite);
                $msg = "We recieved your deposit request, kindly deposit $$amount and your payment will be comfirmed automatically.<br><br><b>How do I know this email is from ".$getsite['name']."?</b>

The link provided in this email starts with https:// and contain ".$getsite['site_url']." so you know it is from us. To contact customer service you can also simply paste the following link into your browser:

".$getsite['site_url']."/contact.php";
                $sub = "".$getsite['name']." Deposit";
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
                
                $msg1 = "".$user['username']."  successfully Deposited $amount USD just now.";
                $sub1 = "Deposit";
                mail_templateadmin($getsite, $sub1, $msg1);
                
      $_SESSION["info"]['info']='Succesful. You have invested <b>$'. number_format($amount,2).'</b>, your investment will be processed soon';
      $_SESSION["time"]=time();
      $_SESSION["theme"]="alert-success";
                if($paidby == 2){
                   $_SESSION['coin'] = $coin; 
                 header('location: '.$_SERVER["PHP_SELF"].'?amt='.$amount.'&plan='.$plan.' ');   
                }else{
                header('location: '.$_SERVER["PHP_SELF"].'?plan='.$plan.' ');
                }
      }else{
        $_SESSION["info"]['info']='Failed, Please Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location: '.$_SERVER["PHP_SELF"].'?plan='.$plan.' ');  
      }
      
  }         
    }
}

function min_max_invest($con,$pack,$amount){
 $getpack = get_data($con,'plan', 'id', $pack);
 $min = $getpack['min'];
 $max = $getpack['max'];
 if($amount < $min || $amount > $max){
  $error = 'Please enter an amount between <b>$'. number_format($min,2).'</b> and <b>$'. number_format($max,2).'</b>';
 }else{
  $error = TRUE;   
 }
 return $error;
}

function loop_for_data_string($con,$table,$data,$key){
    if(!$con){
        return FALSE;
    }

    $query=mysqli_query_params($con,"SELECT * FROM ".$table." WHERE ".$data."= ?", [$key]);
    return $query;
}

function loop_transaction($con,$table,$data,$key,$or,$data2,$key2){
    $query=mysqli_query_params($con,"SELECT * FROM ".$table." WHERE (".$data."= ? $or ".$data2." = ?) AND show_bonus = '1'", [$key,$key2]);
    return $query;
}

function loop_transaction_bonus($con,$table,$data,$key,$or,$data2,$key2){
    $query=mysqli_query_params($con,"SELECT * FROM ".$table." WHERE ".$data."= ? $or ".$data2." = ?", [$key,$key2]);
    return $query;
}

function loop_transaction_limit($con,$table,$data,$key,$or,$data2,$key2){
    $query=mysqli_query_params($con,"SELECT * FROM ".$table." WHERE (".$data."= ? $or ".$data2." = ?) AND show_bonus = '1' ORDER BY id DESC LIMIT 5", [$key,$key2]);
    return $query;
}

function loop_transaction_3($con,$table,$data,$key,$or,$data2,$key2){
    $query=mysqli_query_params($con,"SELECT * FROM ".$table." WHERE ".$data."= ? $or ".$data2." = ? AND status='1'", [$key,$key2]);
    return $query;
}

function loop_transfer($con,$table,$data){
    $query=mysqli_query_params($con,"SELECT * FROM ".$table." WHERE (sender= ? OR receiver = ?) AND type='Transfer'", [$data,$data]);
    return $query;
}

function add_wallet($con){
    if(isset($_POST["add_wallet"])){
        $name=$_POST['name'];
        $category=$_POST['category'];
        $id=$_POST['id'];
        $_SESSION["info"]=array('info'=>1,'name'=>'','category'=>'','mega'=>'');
        
        if (empty($_POST["name"])) {
    $_SESSION["info"]['info']='Failed to add, wallet address required.';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-warning";
    header('location: '.$_SERVER["PHP_SELF"]);
  } else {
    $name = test_input($_POST["name"]);
  }
  
  
   if (empty($_POST["category"])) {
    $_SESSION["info"]['info']='Failed to add, wallet type required.';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-warning";
    header('location: '.$_SERVER["PHP_SELF"]);
  }
  
  if($_SESSION['info']['info']===1){
      $time=time();
      $array = array('user'=>$id,'wallet'=>$name,'type'=>$category,'time'=>$time);
      $insert = insert_data($con, 'wallet', $array);
      if($insert == TRUE){
                $_SESSION["info"]['info']='Succesful. You have added <strong class="text-capitalize">'.$name.'</strong>';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-success";
                header('location: '.$_SERVER["PHP_SELF"]);
            }else{
                $_SESSION["info"]['info']='Failed to add <strong class="text-capitalize">'.$name.'</strong>, try again.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
            }
  }
  
    }
}

function getbal($con,$user){
    if(!$con){
        return array('balance'=>0,'t_balance'=>0,'totaldebit'=>0,'totalcredit'=>0,'totaltransact'=>0,'totalprofit'=>0,'t_earn'=>0);
    }

    $debit = 0;
    $penalty = 0;
    $t_penalty = 0;
    $credit = 0;
    $totaldebit = 0;
    $totalcredit = 0;
    $profit = 0;
    $totalprofit = 0;
    $transaction = loop_for_double_data_or($con,'transaction','receiver',$user,'sender',$user);
    foreach($transaction as $gettrns){
        if($gettrns['receiver'] == $user && $gettrns['status']== 1){
            $credit = $gettrns['amount'];
            $totalcredit += $credit; 
        }
        if($gettrns['sender'] == $user && $gettrns['type']== 'Penalty'){
            $penalty = $gettrns['amount'];
            $t_penalty += $penalty; 
        }
        
        if($gettrns['sender'] == $user && $gettrns['type']== 'Charges'){
            $charge = $gettrns['amount'];
            $t_charge += $charge; 
        }
        
        if($gettrns['sender']==$user && $gettrns['paidby'] != 2 && $gettrns['type'] !== 'Bonus' && $gettrns['type'] !== 'Penalty'  && $gettrns['type'] !== 'Charges'){
            $debit=$gettrns['amount'];
            $totaldebit += $debit; 
        }
        if($gettrns['type'] == 'Deposit' && $gettrns['status'] == 1){
          if($gettrns['closed'] == 0){
              if(is_due($con, $gettrns['id'])['due'] == TRUE){
                 close_inv($con,$gettrns['id']);
                 $profit = getprofit_per_investment($con,$gettrns['id']) + $gettrns['amount'];
                 $t_profit = getprofit_per_investment($con,$gettrns['id']) + $gettrns['amount'];
              }else{
                 $profit = 0;
                 $t_profit = getprofit_per_investment($con,$gettrns['id']);
              }
          }else{
          $profit = getprofit_per_investment($con,$gettrns['id']) + $gettrns['amount'];
          $t_profit = getprofit_per_investment($con,$gettrns['id']) + $gettrns['amount'];
          }
          $totalprofit += $profit;
          $t_totalprofit += $t_profit;
        }
    }
    
    $t_bonus = all_bonus($con, get_data($con, 'users', 'id', $user))['t_bonus'];
    $balance = ($t_bonus + $totalcredit + $totalprofit) - ($totaldebit + $t_penalty + $t_charge);
    $t_balance = ($t_bonus + $totalcredit + $t_totalprofit) - ($totaldebit + $t_penalty + $t_charge);
    $t_earn = ($totalcredit + $t_totalprofit);
    $totaltransact= $totalcredit + $totaldebit;
    
    $transact =array('balance'=>$balance,'t_balance'=>$t_balance,'totaldebit'=>$totaldebit,'totalcredit'=>$totalcredit,'totaltransact'=>$totaltransact,'totalprofit'=>$totalprofit,'t_earn'=>$t_earn);
    return $transact;
}

function bulk_msg($con,$getsite){
    if(isset($_POST['send_bulk'])){
        $sub = test_input($_POST['sub']);
        $msg = test_input($_POST['msg']);
        $_SESSION['info']['info'] = 1;
        
   if (empty($sub) || empty($msg)) {
    $_SESSION["info"]['info']='Failed to send, every field is required.';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-warning";
    header('location: '.$_SERVER["PHP_SELF"].'?a=2');
  }
  
  if($_SESSION['info']['info'] === 1){
      $users = loop_table($con, 'users');
      foreach ($users as $user) {
      $send = mail_template($getsite, $user, $sub, $msg);    
      }
      $_SESSION["info"]['info']='Message sent.';
    $_SESSION["time"]=time();
    $_SESSION["theme"]="alert-success";
    header('location: '.$_SERVER["PHP_SELF"].'?a=2');
  }
    }
}

function mail_template($getsite,$user,$sub,$msg){
    $sender=' '.ucwords($getsite['name']).' <'.$getsite['email'].'>';
$receiver = $user['email'];
$subject= ucwords($sub);
$header='<div style="width: 100%; padding: 2rem 0; background-color: #0b1727; ">
                <img style="height:40px; padding: 0 2rem; width: auto;" src="'.$getsite['image_link'].'" alt="">
        </div>';
$body='<div style="width: 100%; background-color: #fff;">
    <div style="padding: 1rem 2rem;">
            <h1 style="color: #1a2c79; ">Hello <b>'.$user['username'].'</b>,</h1>
            <h3 style="color: #bfbfbf;"><b>'.$getsite['name'].'</b>,</h3>
            <p>'.$msg.':</p>
            <br>
</div>        
</div>';
$footer='<div style="color: #9c9c9c; width: 100%;  background-color: #0b1727;">
            <div style="padding: 1rem 2rem 3rem;">
            <p> &#9400; '.date('Y').' '. ucwords($getsite['name']).' <br> All rights reserved.<br>'. ucwords($getsite['reg']).'<br>'.ucwords($getsite['address']).'</p>
                <a href="'.$getsite['site_url'].'" style="text-decoration: none; color: #929292; font-weight: 500; font-family:sans-serif;">'.$getsite['url_name'].'</a>
            </div>
        </div>';
$send = send_mail($sender,$receiver,$subject,$header,$body,$footer);
if($send === 1){
    $sent = true;
}else{
    $sent = FALSE;
}
return $sent;
}


function getprofit_per_investment($con,$tid){
   $profit = 0;
   $tranz = mysqli_query_params($con,"SELECT * FROM transaction WHERE type = 'Deposit' AND id = ? AND status='1'", [$tid]);
   foreach($tranz as $gettrns){
     $num = get_data($con, 'plan', 'id', $gettrns['plan'])['num'];
     $calc = get_data($con, 'plan', 'id', $gettrns['plan'])['calc'];
     $days = 60 * 60 * $num * $calc ;
     $capital = $gettrns['amount'];
     $age = time()-$gettrns['updated'];
     $percent = (get_data($con, 'plan', 'id', $gettrns['plan'])['percent'])/100;
     
       if($gettrns['closed'] == 0){
       $howmanyrounds = $age/$days;
       $profit = ($percent * $capital) * $howmanyrounds;
       }else{
       $howmanyrounds = ($gettrns['closetime'] - $gettrns['updated'])/$days;
       $profit = ($percent * $capital) * $howmanyrounds;
       }
   }
   return $profit;
}

function all_bonus($con,$user){
   $total_bonus = 0;
   $total_c_bonus = 0;
   $ref_loop = loop_for_data($con, 'referral', 'ref', $user['username']); 
   foreach ($ref_loop as $ref) {
   $ref_id = get_data($con, 'users', 'username', $ref['user'])['id'];
   $bonus = total_deposit($con,'Deposit',$ref_id)['bonus'];
   $total_bonus += $bonus;
   }
   $bonus_loop = loop_transaction_bonus($con, 'transaction', 'sender', $user['id'], 'AND', 'type', 'Bonus');
   foreach ($bonus_loop as $c_bonus) {
       if($c_bonus['show_bonus'] == 1){
           $show_amount = $c_bonus['amount'];
           $show_total_c_bonus += $show_amount;
       }
   $amount = $c_bonus['amount'];
   $total_c_bonus += $amount;
   }
   
   $t_bonus = $total_bonus + $total_c_bonus;
   $show_total_b_user = $total_bonus + $show_total_c_bonus;
   $num_row_bonus = ($ref_loop->num_rows) + ($bonus_loop->num_rows);
   
   return array('t_bonus'=>$t_bonus,'show_total_bonus'=>$show_total_b_user,'num_bonus'=>$num_row_bonus);
}

function members_bonus($con){
  $total = 0;
  $loop = loop_table($con, 'users');
  foreach ($loop as $value) {
  $bonus = all_bonus($con, $value)['t_bonus']; 
  $total += $bonus;  
  }
  return $total;  
}

function is_due($con,$tid){
   $tranz = mysqli_query_params($con,"SELECT * FROM transaction WHERE type = 'Deposit' AND id = ? AND status='1'", [$tid]);
   foreach($tranz as $gettrns){
     $num = get_data($con, 'plan', 'id', $gettrns['plan'])['num'];
     $calc = get_data($con, 'plan', 'id', $gettrns['plan'])['calc'];
     $due = 60 * 60 * $num * $calc ;
     $age = time()-$gettrns['updated'];
     if($age >= $due){
       $is_due = TRUE;
       $days = time() + ($due - $age);
       }else{
       $is_due = FALSE;
       $days = time() + ($due - $age);
       }
   }
   return array('due'=>$is_due,'on'=>$days); 
}

function live_profit($con,$tid){
   $profit = 0;
   $tranz = mysqli_query_params($con,"SELECT * FROM transaction WHERE type = 'Deposit' AND id = ? AND status IS NOT NULL", [$tid]);
   foreach($tranz as $gettrns){
     $num = get_data($con, 'plan', 'id', $gettrns['plan'])['num'];
     $calc = get_data($con, 'plan', 'id', $gettrns['plan'])['calc'];
     $days = 60 * 60 * $num * $calc ;
     $capital = $gettrns['amount'];
     $age = time()-$gettrns['updated'];
     $percent = (get_data($con, 'plan', 'id', $gettrns['plan'])['percent'])/100;
     $profit = ($percent * $capital) * ($age/$days);
   }
   return $profit;
}

function get_double_data_or($con,$table,$column,$key,$column2,$key2){
    $query = "SELECT * FROM ".$table." WHERE ".$column."= ? OR ".$column2."= ? ";
			$result=mysqli_query_params($con, $query, [$key,$key2]);
                        if($result->num_rows>0){
                            $data= $result->fetch_assoc();
                        }
return $data;
}

function set_flash_message($message, $theme = 'alert-warning'){
    $_SESSION['info'] = array('info' => $message);
    $_SESSION['time'] = time();
    $_SESSION['theme'] = $theme;
}

function verify_password($password, $stored_hash){
    if(empty($password) || empty($stored_hash)){
        return FALSE;
    }

    if(password_verify($password, $stored_hash)){
        return TRUE;
    }

    if(strlen($stored_hash) === 32 && strcasecmp(md5($password), $stored_hash) === 0){
        return TRUE;
    }

    return FALSE;
}

function login($con){
   if(!isset($_POST['login'])){
       return;
   }

   $header = 'Location: ../user/index.php';
   $username = trim($_POST['username'] ?? '');
   $password = trim($_POST['password'] ?? '');
   $_SESSION["info"] = array('info' => 1, 'username' => '', 'pwd' => '');

   if(empty($username)){
       set_flash_message('Username is required.');
       header('location: login.php');
       exit;
   }

   $user = get_data($con,'users','username',$username);
   if(!$user){
       set_flash_message('Username is not registered.');
       header('location: login.php');
       exit;
   }

   if(empty($password)){
       set_flash_message('Password is required');
       header('location: login.php');
       exit;
   }

   if(!verify_password($password, $user['password'])){
       set_flash_message('Wrong password.');
       header('location: login.php');
       exit;
   }

   $user2fa = isset($user['2fa']) ? (int) $user['2fa'] : 0;
   if($user2fa == 1){
       $num = 1;
       $getsite = get_data($con, 'site', 'id', $num);
       $otp = rand(99999, 1000);
       $msg = "To verify your account is safe, please use the following code to enable your new device — it will expire in 15 minutes:<br><br><b>".$otp."</b><br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
       $sub = " ".$getsite['name']." Verification";
       mail_template($getsite, $user, $sub, $msg);
       $_SESSION["info"]['info'] = 'UPDATE We sent a message with the verification code to the email address registered with this usermname. It may take a few minutes for the code to arrive.';
       $_SESSION["time"] = time();
       $_SESSION["otp"] = $otp;
       $_SESSION["username"] = $username;
       $_SESSION["otptime"] = time();
       $_SESSION["theme"] = "alert-secondary";
       header('location: 2fa.php');
       exit;
   }

   if($user['active'] != 1){
       $_SESSION["info"]['info'] = 'Account not verified: Check your inbox/spam folder for <b>'.$user['email'].'</b> or click <a style="color:#fff;" href="../confirm_email.php?verify='.$username.'">Resend</a> to get verification link.';
       $_SESSION['user'] = $username;
       $_SESSION['pif'] = 1;
       $_SESSION["time"] = time() + 10;
       $_SESSION["theme"] = "alert-warning";
       header($header);
       exit;
   }

   $_SESSION["info"]['info'] = 'Welcome, '.$username.'';
   $_SESSION['user'] = $username;
   $_SESSION['pif'] = 1;
   $_SESSION["time"] = time() + 10;
   $_SESSION["theme"] = "alert-success";
   header($header);
   exit;
}

function register($con,$getsite){
    if(!isset($_POST['create'])){
        return;
    }

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $country = 'Not Available';
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';
    $ref = trim($_POST['ref'] ?? '');

    if(empty($_SESSION['signup_csrf']) || !isset($_POST['signup_csrf']) || !hash_equals($_SESSION['signup_csrf'], (string) $_POST['signup_csrf'])){
        set_flash_message('Your session expired. Please try again.');
        header('Location: signup.php');
        exit;
    }

    if(empty($username)){
        set_flash_message('Username is required');
        header('Location: signup.php');
        exit;
    }

    if(validate_username($username) == FALSE){
        set_flash_message('Username can contain letters, numbers, underscores or hyphens and no spaces');
        header('Location: signup.php');
        exit;
    }

    $check_user = loop_for_data($con,'users','username',$username)-> num_rows;
    if($check_user > 0){
        set_flash_message('Username is not available');
        header('Location: signup.php');
        exit;
    }

    if(empty($email)){
        set_flash_message('Email is required');
        header('Location: signup.php');
        exit;
    }

    if(validate_email($email) == FALSE){
        set_flash_message('Email is invalid');
        header('Location: signup.php');
        exit;
    }

    $check_email = loop_for_data($con,'users','email',$email)-> num_rows;
    if($check_email > 0){
        set_flash_message('Email is already registered');
        header('Location: signup.php');
        exit;
    }

    if(strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)){
        set_flash_message('Password must be at least 8 characters and include uppercase letters and numbers.');
        header('Location: signup.php');
        exit;
    }

    if($password !== $password2){
        set_flash_message('Password mismatch');
        header('Location: signup.php');
        exit;
    }

    if(!empty($ref)){
        $check_ref = loop_for_data($con,'users','username',$ref)-> num_rows;
        if($check_ref == 0){
            set_flash_message("Referrer's username does not exist, please clear it if you are not certain.");
            header('Location: signup.php');
            exit;
        }
    }

    $time = time();
    $wd = md5($password);
    $array = array('username'=>$username,'password'=>$wd,'email'=>$email,'country'=>$country,'time'=>$time,'active'=>1,'transfer'=>0);
    $create = insert_data($con, 'users', $array);

    $create_ref = TRUE;
    if(!empty($ref)){
        $refacc = get_data($con, 'users', 'username', $ref);
        $ref_array = array('user'=>$username,'ref'=>$ref,'time'=>$time);
        $create_ref = insert_data($con, 'referral', $ref_array);
        $msg = "Thank you for Referring <span>".$username."</span> to our website, click on the link below to proceed to login.<br><img style='width:100%; height: auto;' src='".$getsite['site_url']."/images/ref.png'><br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
        $sub = "".$getsite['name']." Referral";
        mail_template($getsite, $refacc, $sub, $msg);
    }

    if($create == TRUE && $create_ref == TRUE){
        $msg = "Thank you for creating account on our website, click on the link below to proceed to login.<br><img style='width:100%; height: auto;' src='".$getsite['site_url']."/images/welcome.png'><br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.";
        $sub = "Welcome to ".$getsite['name']."";
        $user = get_data($con, 'users', 'username', $username);
        $mailuser = mail_template($getsite, $user, $sub, $msg);
        $msg1 = "$username  successfully created an account just now.";
        $sub1 = "USER REGISTRATION";
        mail_templateadmin($getsite, $sub1, $msg1);
        set_flash_message('You have successfully created a '.$getsite['name'].' account. ', 'alert-success');
        header('Location: login.php');
        exit;
    }

    set_flash_message('Failed to sign up, try again.');
    header('Location: signup.php');
    exit;
}

function mail_templateadmin($getsite,$sub1,$msg1){
    $sender=''.ucwords($getsite['name'] ?? '').' <'.$getsite['email'].'>';
$receiver = ucwords(($getsite['admin'] ?? ''));
$subject= ucwords($sub1 ?? '');
$header='<div style="width: 100%; padding: 2rem 0; background-color: #000000; ">
                <img style="height:40px; padding: 0 2rem; width: auto;" src="'.$getsite['image_link'].'" alt="">
        </div>';
$body='<div style="width: 100%; background-color: #fff;">
    <div style="padding: 1rem 2rem;">
            <h1 style="color: #1a2c79; ">Hello,</h1>
            <h3 style="color: #bfbfbf;"><b>'.$getsite['name'].'</b>,</h3>
            <p>'.$msg1.':</p>
            <br>
</div>        
</div>';
$footer='<div style="color: #9c9c9c; width: 100%;  background-color: #f1f1f1;">
            <div style="padding: 1rem 2rem 3rem;">
            <p> &#9400; '.date('Y').' '. ucwords($getsite['name']).' <br> All rights reserved.<br>'. ucwords($getsite['reg']).'<br>'.ucwords($getsite['address']).'</p>
                <a href="'.$getsite['site_url'].'" style="text-decoration: none; color: #929292; font-weight: 500; font-family:sans-serif;">'.$getsite['url_name'].'</a>
            </div>
        </div>';
$send = send_mail($sender,$receiver,$subject,$header,$body,$footer);
if($send === 1){
    $sent = true;
}else{
    $sent = FALSE;
}
return $sent;
}



function wallet_admin_update($con,$data){
    if(isset($_POST['wallet_admin_update'])){
        $header = $_SERVER['PHP_SELF'].'?u='. complex_para($data);
        $wallet = $_POST['wallet'];
        $type = $_POST['type'];
        $id = $_POST['id'];
        $_SESSION['info']['info'] = 0;
        
        if(empty($wallet) || empty($type) || empty($id)){
            $_SESSION['info']['info'] = 'Every field is required';
            $_SESSION['time'] = time();
            $_SESSION['theme'] = 'alert-warning';
            header('location:'.$header);
        }
        
        if($_SESSION['info']['info'] === 0){
            $array = array('wallet'=>$wallet,'type'=>$type);
            $update = update_data($con, 'wallet', $array, 'id', $id);
            if($update == TRUE){
                $_SESSION['info']['info'] = 'Update successful. ';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-success';
                header('location:'.$header);
            }else{
            $_SESSION["info"]['info']='Failed to update, Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location:'.$header);
            }
        }
    }
}

function user_admin_update($con,$data){
    if(isset($_POST['user_admin_update'])){
        $header = $_SERVER['PHP_SELF'].'?u='. complex_para($data);
        $username = $_POST['name'];
        $email = $_POST['email'];
        $max = $_POST['max'];
        $msg = $_POST['msg'];
        $_SESSION['info']['info'] = 0;
        
        if(empty($msg)){
            $msg = 0;
        }
        
        if(empty($max)){
            $max = 0;
        }
        
        if(empty($username)){
            $_SESSION['info']['info'] = 'Username is required';
            $_SESSION['time'] = time();
            $_SESSION['theme'] = 'alert-warning';
            header('location:'.$header);
        }
            $check_user = loop_for_data($con,'users','username',$username)-> num_rows;
            if(!empty($username) == TRUE && $check_user > 0 && $username != get_data($con, 'users', 'id', $data)['username']){
                $_SESSION['info']['info'] = 'Username is not available';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-warning';
                header('location:'.$header);
            }
            
        if(validate_username($username) == FALSE){
            $_SESSION['info']['info'] = 'Username can contain only numbers and letters';
            $_SESSION['time'] = time();
            $_SESSION['theme'] = 'alert-warning';
            header('location:'.$header);
        }
        if(validate_input_length($email, 1) == FALSE){
            $_SESSION['info']['info'] = 'Email is required';
            $_SESSION['time'] = time();
            $_SESSION['theme'] = 'alert-warning';
            header('location:'.$header);
        }else{
            if(validate_email($email) == FALSE){
                $_SESSION['info']['info'] = 'Email is invalid';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-warning';
                header('location:'.$header);
            }
        }
        if($_SESSION['info']['info'] === 0){
            $time = time();
            $array = array('username'=>$username,'email'=>$email,'max'=>$max,'msg'=>$msg);
            $update = update_data($con, 'users', $array, 'id', $data);
            if($update == TRUE){
                $_SESSION['info']['info'] = 'Update successful. ';
                $_SESSION['time'] = time();
                $_SESSION['theme'] = 'alert-success';
                header('location:'.$header);
            }else{
            $_SESSION["info"]['info']='Failed to update, Try Again.';
            $_SESSION["time"]=time();
            $_SESSION["theme"]="alert-warning";
            header('location:'.$header);
            }
        }
    }
}

// UTILITY
//sanitize input
function subtract_string($data,$num,$position){
    //0 for $position is left while 1 is right
    if($position === 0){
        $result = substr($data,$num);
    }else{
        $result = substr($data,0,-$num);
    }
    return $result;
}

function generate_wallet($xpub,$api,$callback){
    $secret = 'ZzsMLGKe162CfA5EcG6j';

$my_xpub = $xpub;
$my_api_key = $api;

$my_callback_url = 'https://mystore.com?invoice_id=058921123&secret='.$secret;

$root_url = 'https://api.blockchain.info/v2/receive';

$parameters = 'xpub=' .$my_xpub. '&callback=' .urlencode($my_callback_url). '&key=' .$my_api_key;

$response = file_get_contents($root_url . '?' . $parameters);

$object = json_decode($response);

echo 'Send Payment To : ' . $object->address;
}

function convert_to_btc($currency,$amount){
  if((time() - $_SESSION['time_to_btc']) < 1800){
     $rate =  $_SESSION['to_btc'];
     $btc = $amount/$rate;
  }else{
     unset($_SESSION['time_to_btc']);
     unset($_SESSION['to_btc']);
     $rate = get_btc_rate($currency, $amount);
     $btc = $amount/$rate;
  }
  return $btc;
}

function get_btc_rate($currency,$amount){
  $convert =   file_get_contents("https://blockchain.info/ticker");
  $json = json_decode($convert,TRUE);
  $rate = $json[$currency]['last'];
  $btc = $amount * $rate;
  $_SESSION['to_btc'] = $btc;
  $_SESSION['time_to_btc'] = time();
  return $btc;
}






function get_crypto_rate($symbol){
    $url = 'https://min-api.cryptocompare.com/data/price?fsym=' . rawurlencode($symbol) . '&tsyms=USD';
    $convert = @file_get_contents($url);
    $json = is_string($convert) ? json_decode($convert, TRUE) : NULL;

    if (is_array($json) && isset($json['USD']) && is_numeric($json['USD'])) {
        return (float) $json['USD'];
    }

    return 0.0;
}

function get_bit_rate(){
    return get_crypto_rate('BTC');
}

function get_eth_rate(){
    return get_crypto_rate('ETH');
}

function get_bnb_rate(){
    return get_crypto_rate('BNB');
}

function get_usdt_rate(){
    return get_crypto_rate('USDT');
}

function get_ltc_rate(){
    return get_crypto_rate('LTC');
}

function get_ada_rate(){
    return get_crypto_rate('ADA');
}

function get_doge_rate(){
    return get_crypto_rate('DOGE');
}

function get_xrp_rate(){
    return get_crypto_rate('XRP');
}



function getUserIp($key){
   if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $json = file_get_contents("http://api.ipstack.com/$ip?access_key=$key");
    $decode = json_decode($json);
    return $decode;
}

function get_age_of_event($timestamp){
 $age = time() - $timestamp;
 $minute = 60;
 $hour = 3600;
 $day = 86400;
 $week = 604800;
 $month = 2592000;
 $year = 31104000;
 if($age < $minute){
     if($age < 5){
      $event_age = 'Just now';   
     }else{
      $event_age = $age.' seconds ago';   
     }
 }
 if($age >= $minute && $age < $hour){
    if(round($age/$minute) == 1){
        $event_age = 'A minute ago';
    }else{
        $event_age = round($age/$minute).' minutes ago';
    }
 }
 if($age >= $hour && $age < $day){
    if(round($age/$hour) == 1){
        $event_age = 'An hour ago';
    }else{
        $event_age = round($age/$hour).' hours ago';
    }
 }
 if($age >= $day && $age < $week){
    if(round($age/$day) == 1){
        $event_age = 'Yesterday';
    }else{
        $event_age = round($age/$day).' days ago';
    }
 }
 if($age >= $week && $age < $month){
    if(round($age/$week) == 1){
        $event_age = 'Last week';
    }else{
        $event_age = round($age/$week).' weeks ago';
    }
 }
 if($age >= $month && $age < $year){
    if(round($age/$month) == 1){
        $event_age = 'Last month';
    }else{
        $event_age = round($age/$month).' months ago';
    }
 }
 if($age >= $year){
    if(round($age/$year) == 1){
        $event_age = 'Last year';
    }else{
        $event_age = round($age/$year).' years ago';
    }
 }
 return $event_age;
}

function login_email_template($getSite,$user,$link){
    $sender=' '.ucwords($getSite['name']).' <'.$getSite['email'].'>';
$receiver = $user['email'];
$subject='Log into '.$getSite['name'].'';
$header='<div style="width: 100%; padding: 0.8rem 0; background-color: #000000; ">
                <img style="height:40px; padding: 0 2rem; width: auto;" src="'.$getSite['image_link'].'" alt="">
                <a href="'.$link.'" style="float:right; padding: .4938rem 1.188rem; margin: 0.2rem 2rem 0 0; font-size: 15px; font-weight:500; border-radius: 1rem; background-image: -webkit-linear-gradient(169deg,#248afd,#063372); color: #fff;">Get Bitcoin</a>
        </div>';
$body='<div style="width: 100%; background-color: #fff;">
    <div style="padding: 1rem 2rem;">
            <p>Hello <b>'.$user['username'].'</b>,</p>
            <p>Here is the link for you to get into '.$getSite['name'].':</p>
            <br>
            <a href="'.$link.'" style="font-size: 15px; font-weight:500; padding: 0.5rem 1rem; border-radius: 5px; background-image: -webkit-linear-gradient(169deg,#248afd,#063372); color: #fff;">Login to '.$getSite['name'].'</a>
            <br><br>
            <p>For the security of your account, this link will expire in 20 minutes and can be used only once. Thank you for choosing '.$getSite['name'].'.</p>
</div>        
</div>';
$footer='<div style="text-align: center; color: #9c9c9c; width: 100%;  background-color: #f1f1f1;">
            <div style="padding: 1rem 2rem 3rem;">
            <p> &#9400; '.date('Y').' '. ucwords($getSite['name']).' <br> All rights reserved.<br>'. ucwords($getSite['reg']).'<br>'.ucwords($getSite['address']).'</p>
                <a href="'.$getSite['site_url'].'" style="text-decoration: none; color: #929292; font-weight: 500; font-family:sans-serif;">'.$getSite['url_name'].'</a>
            </div>
        </div>';
$send = send_mail($sender,$receiver,$subject,$header,$body,$footer);
if($send === 1){
    $sent = true;
}else{
    $sent = FALSE;
}
return $sent;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//truncate
function truncate($text,$char){
    if(strlen($text)> $char){
        $text= substr($text, 0, $char);
        $text= $text.' ...';
    }
    return $text;
    
}

//mask string
function mask_string($text,$num,$char,$position){
    if(!isset($char)){
      $char = '*';  
    }
    if(!isset($num)){
      $num = 5;  
    }
    if(!isset($position)){
      $position = 'l';  
    }
        if($position == 'l'){
            $mask = str_pad(substr($text, -$num), strlen($text), $char, STR_PAD_LEFT);
        }else{
            $mask = substr($text,0,$num).str_repeat($char, strlen($text)-$num);
        }
    
    return $mask;
}

//random code
function random_alphanumeric_code($length){
   $code = substr(str_shuffle('AaBb0CcDd1EeFf2GgHh3IiJj4KkLl5MmNn6OoPp7QqRr8SsTt9UuVv0WwXx1YyZz2'), 0,$length);
   return $code;
}

//delete every file
function deleteAll($str) {
    //It it's a file.
    if (is_file($str)) {
        //Attempt to delete it.
        return unlink($str);
    }
    //If it's a directory.
    elseif (is_dir($str)) {
        //Get a list of the files in this directory.
        $scan = glob(rtrim($str,'/').'/*');
        //Loop through the list of files.
        foreach($scan as $index=>$path) {
            //Call our recursive function.
            deleteAll($path);
        }
        //Remove the directory itself.
        return rmdir($str);
    }
}

//upload image
function upload_image($folder,$subfolder,$file,$rename,$sizelimit){
    // The $file param is the name of the image input on html form
    $extention= strtolower(pathinfo($_FILES[''.$file.'']['name'], PATHINFO_EXTENSION));
    $imagename = $rename.'.'.$extention;
    $target_dir = $folder."/".$subfolder."/";
    mkdir($target_dir);
    $target_file = $target_dir . $imagename;
    
    if($_FILES[''.$file.'']['size'] > $sizelimit || ($extention !='jpg' && $extention !='png' && $extention !='gif' && $extention !='jpeg')) {
        return FALSE;  
    }else{
        if(move_uploaded_file($_FILES[''.$file.'']["tmp_name"], $target_file)){
         return $imagename;   
        }else{
         return FALSE;
        }
    }
}

//sendmail
function send_mail($sender,$receiver,$subject,$header,$body,$footer){
 $check = TRUE;
 $fromAddr= $sender; // the address to show in From field.
 $recipientAddr = $receiver;
 $subjectStr = $subject;
$mailBodyText = <<<HHHHHHHHHHHHHH
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>$subject</title>
</head>
<body>
 <div style="width: 100%; border: 1px solid #eee;">
$header<br>
$body<br>
$footer
   </div>
</body>
</html>
HHHHHHHHHHHHHH;

$headers= <<<TTTTTTTTTTTT
From: $fromAddr
MIME-Version: 1.0
Content-Type: text/html;
TTTTTTTTTTTT;
$send = mail($recipientAddr,$subjectStr,$mailBodyText,$headers);
if($send){
    $check = TRUE;
}else{
    $check = FALSE;
}
return $check;
}

//DATABASE

//Insert
function insert_data($con,$table,$array){
    $placeholders = implode(',', array_fill(0, sizeof($array), '?'));
    $type = str_repeat('s', sizeof($array));
    $keys = implode(',', array_keys($array));
    $values = array_values($array);
    $stmt = $con->prepare("INSERT INTO $table (".$keys.") VALUES (".$placeholders.")");
    if($stmt->bind_param($type,...$values) && $stmt->execute()){
    return TRUE; 
    }else{
    return FALSE;
    }
}
//update
function update_data($con,$table,$array,$column,$data){
    $keys = implode(' = ?,', array_keys($array));
    $values = array_values($array);
    array_push($values, $data);
    $type = str_repeat('s', sizeof($values));
    $stmt = $con->prepare("UPDATE $table SET $keys = ? WHERE $column = ?");
    if($stmt->bind_param($type,...$values) && $stmt->execute()){
    return TRUE; 
    }else{
    return FALSE;
    }
}

//delete
function delete_data($con,$table,$column,$data){
  $stmt = $con->prepare("DELETE FROM $table WHERE $column = ?");
    if($stmt->bind_param('s',$data) && $stmt->execute()){
    return TRUE; 
    }else{
    return FALSE;
    }  
}


//loop table
function loop_table_DESC($con,$table,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM ".$table." ORDER BY id ASC LIMIT ?", [(int)$limit]);
    return $stmt;
}

function loop_table($con,$table){
    $stmt = mysqli_query($con,"SELECT * FROM ".$table." ORDER BY id ASC");
    return $stmt;
}

function loop_table_limit_rand($con,$table,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM ".$table." ORDER BY RAND() LIMIT ?", [(int)$limit]);
    return $stmt;
}

function loop_data_limit_rand($con,$table,$column,$data,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM ".$table." WHERE $column = ? ORDER BY id ASC LIMIT ?", [$data,(int)$limit]);
    return $stmt;
}

function loop_data_limit_randd($con,$table,$column,$data,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM ".$table." WHERE $column = ? ORDER BY id DESC LIMIT ?", [$data,(int)$limit]);
    return $stmt;
}

function loop_data_limit_rand222($con,$table,$column,$data,$column2,$data2,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM ".$table." WHERE $column = ? AND $column2 = ? ORDER BY id DESC LIMIT ?", [$data,$data2,(int)$limit]);
    return $stmt;
}


function loop_table_limit_rand2($con,$table,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM ".$table." ORDER BY id LIMIT ?", [(int)$limit]);
    return $stmt;
}

function loop_for_data_two($con,$table,$column,$data,$column2,$data2,$limit){
    $stmt = mysqli_query_params($con,"SELECT * FROM $table WHERE $column = ? AND $column2 = ? ORDER BY id ASC LIMIT ?", [$data,$data2,(int)$limit]);
    return $stmt;
}

function loop_for_data($con,$table,$column,$data){
    $stmt = mysqli_query_params($con,"SELECT * FROM $table WHERE $column = ? ORDER BY id ASC", [$data]);
    return $stmt;
}

function loop_for_double_data_or($con,$table,$column,$data,$column2,$data2){
    $stmt = mysqli_query_params($con,"SELECT * FROM $table WHERE $column = ? OR $column2 = ? ORDER BY id ASC", [$data,$data2]);
    return $stmt;
}

function loop_for_double_data_or_show($con,$table,$column,$data,$column2,$data2){
    $stmt = mysqli_query_params($con,"SELECT * FROM $table WHERE ($column = ? OR $column2 = ?) AND show_bonus=1 ORDER BY id ASC", [$data,$data2]);
    return $stmt;
}

//select
function get_data($con,$table,$column,$key){
if(!$con){
    return FALSE;
}

$query = "SELECT * FROM ".$table." WHERE ".$column."= ?";
			$result=mysqli_query_params($con, $query, [$key]);
                        if($result && $result->num_rows>0){
                            $data= $result->fetch_assoc();
                        }else{
                            $data= FALSE;
                        }
return $data;
}

//search
function search_data($con,$table,$column,$data){
$search = "%{$data}%";
$stmt = $con->prepare("SELECT * FROM $table WHERE $column LIKE ?"); 
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
 $getdata = $result->fetch_assoc();   
}else{
 $getdata = FALSE;   
}
return $getdata;
}

// VALIDATION
function validate_phone($data){
    $check_data = test_input($data);
    if (filter_var($check_data, FILTER_SANITIZE_NUMBER_INT) && str_replace("-", "", $check_data)) {
        return TRUE;
     } else {
       return FALSE;
     }
}

function validate_email($data){
    $check_data = test_input($data);
if (filter_var($check_data, FILTER_VALIDATE_EMAIL)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_only_letters($data){
  $check_data = test_input($data);
if (preg_match("/^[a-zA-Z ]*$/",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_letters_and_numbers($data){
  $check_data = test_input($data);
if (preg_match("/^[a-zA-Z0-9 ]*$/",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_username($data){
  $check_data = test_input($data);
if (preg_match("/^[a-zA-Z0-9_-]*$/",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_letters_and_number_signs($data){
  $check_data = test_input($data);
if (preg_match("/^[a-zA-Z0-9 .,:'-]*$/",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_password($data){
  $check_data = test_input($data);
if (preg_match("/^[a-zA-Z0-9.]*$/",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_input_length($data,$len){
  $check_data = test_input($data);
if (strlen($check_data) < $len) {
  return FALSE;
} else {
    return TRUE;    
}
}

function validate_only_numbers($data){
  $check_data = test_input($data);
if (preg_match("/^[0-9.]*$/",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

function validate_url($data){
 $check_data = test_input($data);
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$check_data)) {
  return TRUE;
} else {
    return FALSE;    
}
}

  //logout
function logout($header) {
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    session_start();
    $_SESSION["info"]['info']='Thank you for stopping by, we hope to see you again.';
    $_SESSION["time"] = time() + 10;
    $_SESSION["theme"]="alert-success";
    header("Location: ../auth/login.php");
}
}

function getcountries(){
?>
   <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
<?php
}

function checkuser(){
    if(!isset($_SESSION['user'])){
     $_SESSION["info"]['info']='Please login to continue.';
     $_SESSION["time"]=time();
     $_SESSION["theme"]="alert-warning";
     header('location: ../auth/login.php');   
    }
}


//loader
function ajax_loader_html(){
    ?>
<div id="loader"  class="text-center"  style="position:fixed; display: none; left: 0; right: 0; top: 0; bottom: 0; z-index: 9999; background-color: #fff; opacity: 0.955;">
            <div class="text-info text-center">
            <img class="" style=" position: absolute; top: 50%; left: 50%; margin-top: -40px; margin-left: -40px;" src="img/xx.gif" height="auto" width="80px">
            </div>
        </div>
<?php
}

//GENERAL VARIABLE
$getsite = get_data($con, 'site', 'id', 1);
$logged_in = isset($_SESSION['user']) && !empty($_SESSION['user']);
$logged = $logged ?? 0;
if($logged !== 1){
$getuser = $logged_in ? get_data($con, 'users', 'username', $_SESSION['user'] ?? '') : FALSE;
$theme = '#132053';
}else{
$theme = '#0d5498';
}
logout('index.php');