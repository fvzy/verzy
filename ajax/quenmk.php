<?php
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
$email = AntiXss($_POST['email']);
$captcha = AntiXss($_POST['captcha']);
        $captcha2 = AntiXss($_POST['captcha2']);
        $captcha3 = AntiXss($_POST['captcha3']);
$checkcaptcha = $captcha2 + $captcha3;
$bentancoder_check = $ketnoi->query("SELECT * FROM `users` WHERE `email` = '$email' ")->fetch_array();

if($email == ""){
     exit(json_encode(array('status' => '1', 'msg' => 'Please enter your email!', 'type' => 'error')));   
} else if ($captcha == "") { 

 exit(json_encode(array('status' => '1', 'msg' => 'Please confirm captcha', 'type' => 'error')));
 
} else if (empty($bentancoder_check)) { 

exit(json_encode(array('status' => '1', 'msg' => 'Email does not exist', 'type' => 'error')));
}

if($captcha == $checkcaptcha){
$gzy = $ketnoi->query("SELECT * FROM `users` WHERE `email` = '$email' ")->fetch_array();
$phone = $gzy['phone'];
$passtamthoi = rand(100000000, 999999999);
$site_tenweb = $_SERVER['HTTP_HOST'];
 	$content = '
   	You or someone else has requested a password reset on https://'.$site_tenweb.' . <br>
   	Your new password is '.$passtamthoi.'<br>
   	Thank you for using the service at https://'.$site_tenweb.'! <br>
   	Please do not reply to this message! <br>
   	Have a nice day! <br>
   	';
   $wano = 'You or someone else has requested a password reset on https://'.$site_tenweb.'.
Your new password is '.$passtamthoi.'
Thank you for using the service at https://'.$site_tenweb.'!
Please do not reply to this message!
Have a nice day!
';
	$nTo = 'Lets meet again';
	$mTo = $email;
 $subject = 'Get used to the web '.$site_tenweb;
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
$notifz = [
        'api_key' => $keynotif,
        'sender' => $notifc,
        'number' => $phone,
        'message' => $content,
        'footer' => $nTo,
        'template1' => 'url|Copy Password|https://www.whatsapp.com/otp/copy/'.$passtamthoi
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


$ketnoi->query("UPDATE `users` SET `password` = '$passtamthoi' WHERE `email` = '$email' ");

 exit(json_encode(array('status' => '2', 'msg' => 'New password has been sent to your email!', 'type' => 'success')));   
}else{
    
             exit(json_encode(array('status' => '1', 'msg' => 'The captcha code is not correct', 'type' => 'error')));
}

   }
?>