<?php
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
        $code_id_value = $_POST['code_id_value'];
        $email  = $user['email'];
        $captcha = $_POST['captcha'];
        $captcha2 = $_POST['captcha2'];
        $captcha3 = $_POST['captcha3'];
$checkcaptcha = $captcha2 + $captcha3;        
$bentancoder = $ketnoi->query("SELECT * FROM khocode WHERE id = '$code_id_value'")->fetch_array();
$thanhtoan = $bentancoder['gia'];
$urname = $_SESSION['username'];
$gzy = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$urname' ")->fetch_array();
$phone = $gzy['phone'];
$magd = rand(1000, 9999);
$linkcode = $bentancoder['link'];
$loaicode = $bentancoder['title'];
 
 
			if(!$_SESSION['username']) {
	exit(json_encode(array('status' => '1', 'msg' => 'please log in', 'type' => 'error')));      
             }else 	if($email == "") {
	exit(json_encode(array('status' => '1', 'msg' => 'Please enter your email', 'type' => 'error')));      
             }else 
			  if($user['money'] < $thanhtoan) {
exit(json_encode(array('status' => '1', 'msg' => 'Insufficient balance', 'type' => 'error')));
			  }else if($thanhtoan < '0') {
	exit(json_encode(array('status' => '1', 'msg' => 'This item costs less than 0 dong so you cannot buy it. Maybe it already has a download link!', 'type' => 'error')));
			  } else if ($captcha == "") { 
 exit(json_encode(array('status' => '1', 'msg' => 'Please confirm captcha', 'type' => 'error')));
			   } else {		 
if($captcha == $checkcaptcha){			       
         
$site_tenweb = $_SERVER['HTTP_HOST'];
 	$content = '
   	Thank you for using the service on https://'.$site_tenweb.' . <br>
   	Your link code is '.$linkcode.'! <br>
   	';
   $wano = 'Thank you for using the service on https://'.$site_tenweb.' .
Your link code is '.$linkcode.'!
   	';
	$nTo = 'Buy code';
	$mTo = $email;
 $subject = 'Buy code '.$site_tenweb;
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
        
			   
		$ketnoi->query("INSERT INTO `lich_su_mua_code` SET 
        `trans_id` = '$magd',
        `username` = '$username',
        `status` = 'hoantat',
        `time` = '$time',
        `loaicode` = '$loaicode',
        `gia` = '$thanhtoan',
        `link` = '$linkcode' ");
         
         mysqli_query($ketnoi,"UPDATE `users` SET `money` = `money`- '$thanhtoan' WHERE `username` = '$username' ");	  
	  $notifz = [
        'api_key' => $keynotif,
        'sender' => $notifc,
        'number' => $phone,
        'message' => $wano,
        'footer' => $nTo,
        'template1' => 'url|Download Link|'.$linkcode
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
			  
		exit(json_encode(array('status' => '2', 'msg' => 'Buy code successfully!', 'type' => 'success')));	     
	    echo "<script>location.href = '/quan-ly-code'</script>";
}else{
             exit(json_encode(array('status' => '1', 'msg' => 'The captcha code is not correct', 'type' => 'error'))); 	
        }
    }
}    
?>    