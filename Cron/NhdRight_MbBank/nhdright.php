<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
function parse_order_id($des){
    global $MEMO_PREFIX;
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}
$nhdright = 'dichvushop.asia';
$token = 'Nhập Token'; // token mb thuê tại dichvushop.asia
$sotaikhoan = 'Số Tài Khoản'; // số tài khoản cần check giao dịch
$result = curl_get('https://'.$nhdright.'/historyapimbbank/'.$token.'/'.$sotaikhoan);
$result = json_decode($result, true);

foreach ($result['MbMsg']['TranList'] as $data) {
    $partnerId      = $data['accountNo'];               // SỐ ĐIỆN THOẠI CHUYỂN
    $comment        = $data['description'];                 // NỘI DUNG CHUYỂN TIỀN
    $tranId         = $data['transactionId'];                  // MÃ GIAO DỊCH
    $amount         = $data['creditAmount'];                  // SỐ TIỀN CHUYỂN
    $user_id        = parse_order_id($comment);          // TÁCH NỘI DUNG CHUYỂN TIỀN

    $total_tranid = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `nhdright_mb` where `magd` = '".$tranId."' ")); 
    if($total_tranid < '1'){
         // chưa có tranid này thì 
    
    $nefftzydev_checkuser = mysqli_query($ketnoi, "SELECT * FROM `users` where `id` = '".$user_id."' ");
    $total_nguoidctien = mysqli_num_rows($nefftzydev_checkuser); 
    if($total_nguoidctien == '1'){

    $timebaygio = date("Y-m-d H:i:s");
    $sotien = intval($amount);
              mysqli_query($ketnoi, "UPDATE `users` SET `money` = `money` + '$sotien' WHERE `id` = '$user_id' ");
              mysqli_query($ketnoi, "UPDATE `users` SET `tong_nap` = `tong_nap` + '$sotien' WHERE `id` = '$user_id' ");
              mysqli_query($ketnoi, "INSERT INTO `nhdright_mb` SET 
	`magd` = '".$tranId."',
	`sotien` = '".$sotien."',
	`code` = 'Nạp từ MBBANK',
	`loai` = 'ATM',
	`uid` = '$user_id',
	`status` = 'hoantat',
	`time` = '".time()."'
	");      
         
  }
            
        
    }

}
    
