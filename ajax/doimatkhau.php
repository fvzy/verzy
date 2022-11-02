<?php
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
$passcu = AntiXss($_POST['password1']);
$passmoi = AntiXss($_POST['password2']);
$captcha = AntiXss($_POST['captcha']);
        $captcha2 = AntiXss($_POST['captcha2']);
        $captcha3 = AntiXss($_POST['captcha3']);
$checkcaptcha = $captcha2 + $captcha3;
$email = $user['email'];
					   if(!$_SESSION['username']) {
	exit(json_encode(array('status' => '1', 'msg' => 'please log in', 'type' => 'error')));   
					   } else if ($captcha == "") { 

 exit(json_encode(array('status' => '1', 'msg' => 'Please confirm captcha', 'type' => 'error')));
 
    } else  
					   if($passcu == "" || $passmoi == "" ) { 
	exit(json_encode(array('status' => '1', 'msg' => 'Please enter full information', 'type' => 'error')));
				    } else if($passcu != $user['password']) { 
	exit(json_encode(array('status' => '1', 'msg' => 'Old password is incorrect!', 'type' => 'error')));
				    } else if($passmoi == $user['password']) { 
	exit(json_encode(array('status' => '1', 'msg' => 'The new password must not be the same as the old password!', 'type' => 'error')));
				    } else {
				     if($captcha == $checkcaptcha){
				         

      
$ketnoi->query("UPDATE `users` SET `password` = '$passmoi' WHERE `username` = '$username' ");
				     
exit(json_encode(array('status' => '2', 'msg' => 'Change password successfully!', 'type' => 'success')));
}else{
             exit(json_encode(array('status' => '1', 'msg' => 'The captcha code is not correct', 'type' => 'error'))); 	
        }
			   }
				    }
				    ?>