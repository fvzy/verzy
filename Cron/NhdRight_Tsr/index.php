<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include 'config.php';
include 'simple_html_dom.php'; // Gọi Class Html Dom 

$thaotac = abs($_POST['thaotac']);
if($thaotac == '1'){
Class TheSieuRe {
  
  public $username, $password;
  public $code_GD;
  public $user;
   
  public function Login() {
       
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => "https://thesieure.com/account/login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIEFILE => "cookie.txt",
        CURLOPT_COOKIEJAR => "cookie.txt"
             ));
        $exec = curl_exec($ch);
        $_csrf_token = str_get_html($exec) -> find("input[name=_token]", 0) -> value;
        curl_close($ch);
        
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
                                    CURLOPT_URL => "https://thesieure.com/account/login",
                                    CURLOPT_COOKIEJAR => "cookie.txt",
                                    CURLOPT_COOKIEFILE => "cookie.txt",
                                    CURLOPT_CONNECTTIMEOUT => 30,
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_SSL_VERIFYPEER => false,
                                    CURLOPT_FOLLOWLOCATION => 1,
                                    CURLOPT_POST => 1,
                                    CURLOPT_POSTFIELDS => "phoneOrEmail=".$this->username."&password=".$this->password."&_token=".$_csrf_token,
                                    CURLINFO_HEADER_OUT => true
         ));
        $exec = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if (strpos($exec, "<h4>Đăng nhập tài khoản</h4>") !== false) {
           return json_encode(array("status" => "false", "msg" => "login fail"));
        }else {
           return json_encode(array("status" => "true", "msg" => "login success"));
        }}
  public function _Check_GD() {

    $this->Login(); // Đăng nhập
    
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://thesieure.com/wallet/transfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_COOKIEFILE => "cookie.txt",
        CURLOPT_COOKIEJAR => "cookie.txt"
         ));
    $exec = curl_exec($ch);
    curl_close($ch);
    $rs = str_get_html($exec);
    $lol =  $rs->find('tbody', 2);
    //echo $lol ;
    if($lol) {

                    
                    foreach($lol->find('tr') as $article) {
                    $ma_GD = $article->find('td', 0)->plaintext;
                    $so_tien = $article->find('td', 1);
                    $txt_sotien = $so_tien->find('span', 0)->plaintext;
                    $phi = $article->find('td', 2);
                    $txt_phi = $phi->find('span', 0)->plaintext;
                    //$thanh_toan = $article->find('td', 3);
                    //$txt_thanhtoan = $thanh_toan->find('span', 0)->plaintext;
                    $nguoigui_nhan = $article->find('td', 4);
                    $txt_nguoiguinhan = $nguoigui_nhan->find('span', 0)->plaintext;
                    $ngay_tao = $article->find('td', 5)->plaintext;
                    //$trang_thai = $article->find('td', 6);
                    //$txt_trangthai = $trang_thai->find('span', 0)->plaintext;
                    $noi_dung = $article->find('td', 7)->plaintext;
                    $_GD = array(
                        "ma_dg" => $ma_GD,
                        "so_tien" => $txt_sotien,
                        "phi" => $txt_phi,
                        //"thanh_toan" => $txt_thanhtoan,
                        "taikhoan_gui_nhan" => $txt_nguoiguinhan,
                        "ngay_tao" => $ngay_tao,
                       // "trang_thai" => $txt_trangthai,
                        "noi_dung" => $noi_dung
                    ); 
                    include '../../config/config.php';
     $nefftzydev_magd = AntiXss($_POST['magd']); 
     $nefftzydev_check = mysqli_query($ketnoi, "select * from `nhdright_tsr` where `code` = '$ma_GD'");
     if(!$_SESSION['username']) {
	 exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập', 'type' => 'error')));      
     }else if($nefftzydev_magd == "") { 
        exit(json_encode(array('status' => '1', 'msg' => 'Chưa nhập mã giao dịch!', 'type' => 'error')));   
     }else if ($nefftzydev_check->num_rows != 0) { 
      exit(json_encode(array('status' => '1', 'msg' => 'Mã giao dịch đã tồn tại trên hệ thống!', 'type' => 'error')));
     }
     $timeconditcumay = time();
     $so_tien1 = str_replace('đ', '', $so_tien);
     $so_tien1 = explode('">', $so_tien1);
     $so_tien1 = $so_tien1[1];
     $so_tien1 = explode('</', $so_tien1);
     $so_tien1 = $so_tien1[0];
     $so_tien1 = str_replace(',', '', $so_tien1);
     $so_tien1 = intval($so_tien1);
     $nefftzydev_nd = htmlspecialchars($ngay_tao);   
     if($nefftzydev_magd != $ma_GD){
     exit(json_encode(array('status' => '1', 'msg' => 'Mã giao dịch không tồn tại!', 'type' => 'error'))); 
       }else{
       
    mysqli_query($ketnoi, "UPDATE `users` SET `money` = `money` + '$so_tien1' WHERE `id` = '$ngay_tao' ");
    mysqli_query($ketnoi, "UPDATE `users` SET `tong_nap` = `tong_nap` + '$so_tien1' WHERE `id` = '$ngay_tao' ");
  	mysqli_query($ketnoi, "INSERT INTO nhdright_tsr SET 
	`seri` = 'Nạp từ thesieure',
	`sotien` = '$so_tien1',
	`code` = '$nefftzydev_magd',
	`loaithe` = 'ATM',
	`uid` = '$ngay_tao',
	`cuphap` = '$ngay_tao',
	`noidungnap` = '$ngay_tao',
	`noidung` = '$ngay_tao',
	`time` = '".$timeconditcumay."'
	");

  exit(json_encode(array('status' => '2', 'msg' => 'Nạp tiền thành công, hệ thống đã cộng '.number_format($so_tien1).'đ !', 'type' => 'success'))); 
      
  }
                    
                    
//print_r($_GD);

                }
    
        }else {
            return json_encode(array("status" => "2", "msg" => "Bạn chưa có lịch sử giao dịch nào"));
    }

  }
  

  
} // End Classs



$kun = new TheSieuRe;


$kun->username = $config['username'];
$kun->password = $config['password'];
$kun->code_GD = $code;
$kun->user = $_GET['user'];
echo $kun->_Check_GD();
unlink("cookie.txt");
}