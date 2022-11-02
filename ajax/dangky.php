<?php
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
function startsWith ($string, $startString) 
{ 
$len = strlen($startString); 
return (substr($string, 0, $len) === $startString); 
} 

$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
        $username            = AntiXss($_POST['username']);
        $password            = AntiXss($_POST['password']);
        $email               = AntiXss($_POST['email']);
        $phone               = AntiXss($_POST['phone']);
        $captcha = AntiXss($_POST['captcha']);
        $captcha2 = AntiXss($_POST['captcha2']);
        $captcha3 = AntiXss($_POST['captcha3']);
        $bentancoder_check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ");
        $bentancoder_checkmail   = $ketnoi->query("SELECT * FROM `users` WHERE `email` = '$email' ");
        $bentancoder_phone   = $ketnoi->query("SELECT * FROM `users` WHERE `phone` = '$phone' ");
        $bentancoder_checkip   = $ketnoi->query("SELECT * FROM `users` WHERE `ip` = '$ip_address' ");
        $checkcaptcha = $captcha2 + $captcha3;
if($username == "" || $password == "" || $email == "") { 

 exit(json_encode(array('status' => '1', 'msg' => 'Please enter full information', 'type' => 'error')));
 
 } else if ($captcha == "") { 

 exit(json_encode(array('status' => '1', 'msg' => 'Please confirm captcha', 'type' => 'error')));
 
 } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { 

 exit(json_encode(array('status' => '1', 'msg' => 'Username does not contain special characters', 'type' => 'error')));

 } else if ($bentancoder_check->num_rows != 0) { 

 exit(json_encode(array('status' => '1', 'msg' => 'Username available', 'type' => 'error')));

 } else if ($bentancoder_checkmail->num_rows != 0) { 

 exit(json_encode(array('status' => '1', 'msg' => 'Email address already exists', 'type' => 'error')));
 
 } else if ($bentancoder_phone->num_rows != 0) { 

 exit(json_encode(array('status' => '1', 'msg' => 'Phone Number already exists', 'type' => 'error')));
 
 } else if ($bentancoder_checkip->num_rows >= 5) { 

 exit(json_encode(array('status' => '1', 'msg' => 'You have limited account creation', 'type' => 'error')));

 } else if(startsWith($phone ,"08")) {
 exit(json_encode(array('status' => '1', 'msg' => 'Harap gunakan 62', 'type' => 'error')));
} else {
     
 if($captcha == $checkcaptcha){
   

     
$site_tenweb = $_SERVER['HTTP_HOST'];
 	$content = '
   	Thank you for using the above service https://'.$site_tenweb.' . <br>
   	Have a nice day! <br>
   	';
   $wano = 'Thank you for using the above service https://'.$site_tenweb.'
Have a nice day!
   	';
	$nTo = 'Register an account';
	$mTo = $email;
 $subject = 'Sign up for a web account '.$site_tenweb;
        $bcc = $site_tenweb;
        $hoten ='Client';
        $site_gmail_momo = $bentancoder['email'];
$site_pass_momo = $bentancoder['passemail'];
function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
    $mail->Host = "smtp.zoho.com";
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; // GMAIL STMP
        $mail->Password = $site_pass_momo; // PASS STMP
        $mail->SMTPSecure = 'ssl';
        $mail->protocol = 'mail';
        $mail->Port = 465;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
      sendCSM($email, $hoten, $subject, $content, $bcc);   


 $_SESSION['username'] = $username;
 $token = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789', '32');
 $baodz = $ketnoi->query("INSERT INTO `users` SET 
        `password` = '$password',
        `username` = '$username',
        `email` = '$email',
        `level` = '0',
        `tong_nap` = '0',
        `money` = '0',
        `bannd` = '0',
        `ip` = '".$ip_address."',
        `phone` = '$phone',
        `api_key` = '$token',
        `bentancoder` = '".time()."',
        `time` = '$time' ");
  
            if ($baodz) { 
$notifz = [
        'api_key' => $keynotif,
        'sender' => $notifc,
        'number' => $phone,
        'message' => $wano,
        'footer' => $nTo,
        'template1' => 'url|Homepage|'.$urlwebsite,
    ];
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://wa.verzy.my.id/send-template",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($notifz),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));    
    $response = curl_exec($curl);    
    curl_close($curl);
    
           exit(json_encode(array('status' => '2', 'msg' => 'Sign Up Success', 'type' => 'success'))); 			
            } else { 

           exit(json_encode(array('status' => '1', 'msg' => 'hiks dont spam, baby', 'type' => 'error'))); 			

}
 }else{
             exit(json_encode(array('status' => '1', 'msg' => 'The captcha code is not correct', 'type' => 'error'))); 	
        }
    }
}    
?>    