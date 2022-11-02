<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
    $loaithe  = AntiXss($_POST['loaithe']); 
    $pin = AntiXss($_POST['pin']);
    $seri  = AntiXss($_POST['seri']); 
    $menhgia  = AntiXss($_POST['menhgia']); 
    $request_id = rand(10000000, 99999999); 
    $captcha = AntiXss($_POST['captcha']);
        $captcha2 = AntiXss($_POST['captcha2']);
        $captcha3 = AntiXss($_POST['captcha3']);
    $checkcaptcha = $captcha2 + $captcha3;
    $check_ck = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT `ck` FROM `bentancoder_loaithe` WHERE `value` = '$loaithe'  ")) ['ck'];
    
    $check = $ketnoi->query("SELECT * FROM bentancoder_loaithe WHERE value = '$loaithe' ")->fetch_array();
    
    $checkcardinfo = $check['loaithe'];
    
       
    $thucnhan = $menhgia - $menhgia * $check_ck / 100;
        if(!$_SESSION['username']) {
	exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập', 'type' => 'error')));      
}
else  
    if($loaithe == "" || $menhgia == "" || $seri == "" || $pin == "") { 
	exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin', 'type' => 'error')));
				    } else
				    if (strlen($seri) < 5 || strlen($pin) < 5) {
        $bentancoder_err = 'Mã thẻ hoặc seri không đúng định dạng!';
	exit(json_encode(array('status' => '1', 'msg' => 'Mã thẻ hoặc seri không đúng định dạng', 'type' => 'error')));
	} else if ($captcha == "") { 
 exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng xác nhận captcha', 'type' => 'error')));
	} else {
   $data = shopgachthe($request_id, $loaithe, $pin, $seri, $menhgia);

   if($captcha == $checkcaptcha){   
   if($data['status'] == 'success') {
            // Gửi thẻ lên hệ thống thành công
              $create = $ketnoi->query("INSERT INTO `bentancoder_napthe` SET 
              `seri` = '$seri',
              `pin` = '$pin',
              `loaithe` = '$checkcardinfo',
              `menhgia` = '$menhgia',
              `thucnhan` = '$thucnhan',
              `username` = '$username',
              `status` = 'xuly',
              `note` = '$msg',
              `request_id` = '$request_id',
              `time` = '$time' ");
              
			exit(json_encode(array('status' => '2', 'msg' => 'Nạp Thẻ Thành Công Vui Lòng Đợi 5s - 10s Để Thẻ Xử Lý!', 'type' => 'success')));
   } else {
                 $message = $data['message'];
            exit(json_encode(array('status' => '1', 'msg' => $message, 'type' => 'error')));
            }
            }else{
             exit(json_encode(array('status' => '1', 'msg' => 'Mã captcha không đúng', 'type' => 'error')));
            
            }
    
    }
}
?>