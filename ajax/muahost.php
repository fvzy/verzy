<?php
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

if($_POST['type'] == 'bentancoder'){
$id = AntiXss($_POST['id']);
$tenmien = AntiXss($_POST['tenmien']);
$emailuser = AntiXss($_POST['emailuser']);
$bentancoder_host = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `ds_host` WHERE `id` = '$id'"));
$gia = $bentancoder_host['gia'];
$check = $ketnoi->query("SELECT * FROM lich_su_mua_hosting WHERE tenmien = '$tenmien' AND status = 'hoantat'")->fetch_array();
$usrname = $_SESSION['username'];
$bentancoder_check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$usrname' ")->fetch_array();
$phone = $bentancoder_check['phone'];
if(!$_SESSION['username']) {
	exit(json_encode(array('status' => '1', 'msg' => 'please log in', 'type' => 'error')));      
}
else  
if($tenmien == "" || $emailuser == ""){
	exit(json_encode(array('status' => '1', 'msg' => 'Please enter full information', 'type' => 'error')));      
}
else 
if($check['id'] > 0){ 
     exit(json_encode(array('status' => '1', 'msg' => 'The domain name already exists', 'type' => 'error')));            
}
else 
if($user['money'] < $gia){ 
     exit(json_encode(array('status' => '1', 'msg' => 'Insufficient balance', 'type' => 'error')));            
}else if(strpos($tenmien,'http') > -1){
     exit(json_encode(array('status' => '1', 'msg' => 'Please remove http,https', 'type' => 'error')));       
}
else if(strpos($tenmien,'.') < -1){
     exit(json_encode(array('status' => '1', 'msg' => 'Invalid domain name registration', 'type' => 'error')));     
}
else if(strpos($tenmien,'/') > -1){
     exit(json_encode(array('status' => '1', 'msg' => 'Please remove the / in the domain name '.$tenmien.'', 'type' => 'error')));     
}
else if(strpos($tenmien,':') > -1){
     exit(json_encode(array('status' => '1', 'msg' => 'Invalid domain name registration', 'type' => 'error')));     
}
else{    

$concac = time() + mt_rand(1,99999);
$taikhoan = 'vusr'.time(); // tk host can tao
$matkhau = 'vpass'.$concac; // mk host
$goi = $bentancoder_host['urlgoihost']; // goi host - yeu cau giong voi ten goi tao trong rsl
        $data = [
            'username' => $taikhoan,
            'domain' => $tenmien,
            'password' => $matkhau,
            'plan' => $goi,
            'contactemail' => $emailuser
        ];
        
        $query = $linkwhm . ":2087/json-api/createacct?api.version=1";
        foreach ($data as $k => $v) {
            $query .= '&' . $k . '=' . $v;
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $header[0] = "Authorization: Basic " . base64_encode($tkwhm . ":" . $mkwhm) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_URL, $query);
        $result = curl_exec($curl);
        if ($result == false) {
       exit(json_encode(array('status' => '1', 'msg' => 'Lỗi "'.curl_error($curl).'"', 'type' => 'error')));      
        }
        curl_close($curl);


$timemua = time();
$timehethanhost = time()+(86400*30);
$time = date('h:i d-m-Y');
$ketnoi->query("INSERT INTO `lich_su_mua_hosting` SET 
        `username` = '$username',
        `goi` = '$goi',
        `gia` = '$gia',
        `tk_host` = '$taikhoan',
        `mk_host` = '$matkhau',
        `ngay_mua` = '$timemua',
        `ngay_het` = '$timehethanhost',
        `ns1` = '$ns1',
        `ns2` = '$ns2',
        `status` = 'hoantat',
        `note` = 'Active',
        `emailuser` = '$emailuser',
        `linklogin` = '$linkwhm:2083',
        `tenmien` = '$tenmien',
        `server` = 'Singapore',
        `time` = 'cpanel' ");
        
        mysqli_query($ketnoi,"UPDATE `users` SET `money` = `money` - '$gia' WHERE `username` = '$username' ");
        
        
    $site_tenweb = $_SERVER['HTTP_HOST'];
 	$content = '
You Have Buyed A Hosting Package <b>'.$goi.'</b> With Price Rp. '.number_format($gia).'<br>
Your Hosting Information => <br>
LINK LOGIN : <a href="'.$hostname.':2083">'.$linkwhm.':2083</a> <br>
Account : <b> '.$taikhoan.' </b> <br>
Password : <b> '.$matkhau.' </b> <br>
Nameserver 1 : '.$ns1.' <br>
Nameserver 2 : '.$ns2.' <br>
IP : '.$iphost.' <br>
Purchase Date : '.date("H:i:s - d/m/Y", time()).'<br>
Expiration date : '.date("H:i:s - d/m/Y", $timehethanhost).' <br>
';
$wano = '
You Have Buyed A Hosting Package *'.$goi.'* With Price Rp. '.number_format($gia).'
Your Hosting Information =>
LINK LOGIN : '.$linkwhm.':2083
Account : *'.$taikhoan.'*
Password : *'.$matkhau.'*
Nameserver 1 : '.$ns1.'
Nameserver 2 : '.$ns2.'
IP : '.$iphost.'
Purchase Date : '.date("H:i:s - d/m/Y", time()).'
Expiration date : '.date("H:i:s - d/m/Y", $timehethanhost).'
';
	$nTo = 'Buy hosting at '.$site_tenweb.'';
	$mTo = $emailuser;
    $subject = 'HOSTING INFORMATION '.$tenmien;
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
      sendCSM($emailuser, $hoten, $subject, $content, $bcc);   
 $notifz = [
        'api_key' => $keynotif,
        'sender' => $notifc,
        'number' => $phone,
        'message' => $wano,
        'footer' => $nTo,
         'template1' => 'url|Url Login|'.$hostname.':2083', 
         'template2' => 'url|Copy Info|https://www.whatsapp.com/otp/copy/'.$content
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
        
        
			 exit(json_encode(array('status' => '2', 'msg' => 'Buying Success!', 'type' => 'success')));   		      		      
    


  }
}


?>