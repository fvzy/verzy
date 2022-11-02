<?php
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
        $username            = AntiXss($_POST['username']);
        $password            = AntiXss($_POST['password']);
        $captcha = AntiXss($_POST['captcha']);
        $captcha2 = AntiXss($_POST['captcha2']);
        $captcha3 = AntiXss($_POST['captcha3']);
        $checkcaptcha = $captcha2 + $captcha3;
        $bentancoder_check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
        $email = $bentancoder_check['email'];
        $phone = $bentancoder_check['phone'];
        $ip = $bentancoder_check['ip'];
        
if($username == "" || $password == "") { 

exit(json_encode(array('status' => '1', 'msg' => 'Please enter full information', 'type' => 'error')));

} else if ($captcha == "") { 

 exit(json_encode(array('status' => '1', 'msg' => 'Please confirm captcha', 'type' => 'error')));

 } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { 

 exit(json_encode(array('status' => '1', 'msg' => 'Username does not contain special characters', 'type' => 'error')));

 } else if (empty($bentancoder_check)) { 

exit(json_encode(array('status' => '1', 'msg' => 'Username does not exist', 'type' => 'error')));

 } else if ($bentancoder_check['password'] != $password) { 

exit(json_encode(array('status' => '1', 'msg' => 'Login information is incorrect', 'type' => 'error')));

} else if ($bentancoder_check['bannd'] != 0){

exit(json_encode(array('status' => '1', 'msg' => 'You have been banned, if you have any questions, please contact admin', 'type' => 'error')));

 } else {
 if($captcha == $checkcaptcha){
 if($ip_address != $ip){     // send an email when there is a strange ip login to the account

    $site_tenweb = $_SERVER['HTTP_HOST'];
 	$content = '
   	System https://'.$site_tenweb.' Just discovered there is an ip logged into your account. <br>
   	If not you, please change your password now! <br>
   	';
   $wano = 'System https://'.$site_tenweb.' Just discovered there is an ip logged into your account.
If not you, please change your password now!
   	';
	$nTo = 'Login warning';
	$mTo = $email;
 $subject = 'Login warning '.$site_tenweb;
        $bcc = $site_tenweb;
        $hoten ='Client';
        $site_gmail_momo = $emailadmin;
$site_pass_momo = $passemail;
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
}


$_SESSION['username'] = $username;
            $ketnoi->query("INSERT INTO `log_login` SET 
            `content` = 'Login to the IP system (".$ip_address.").',
            `username` = '".$username."',
            `time` = '$time' ");
            
            
                                                    $notifz = [
                                                        'api_key' => $keynotif,
        'sender' => $notifc,
        'number' => $phone,
        'message' => $content
                                                    ];
                                                    $curl = curl_init();
                                                    
                                                    curl_setopt_array($curl, array(
                                                      CURLOPT_URL => "https://nextstrategie.com/send-message",
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

            
            
            
            
           exit(json_encode(array('status' => '2', 'msg' => 'Logged in successfully', 'type' => 'success')));
}else{
             exit(json_encode(array('status' => '1', 'msg' => 'The captcha code is not correct', 'type' => 'error')));
        }
    }    
}

?>