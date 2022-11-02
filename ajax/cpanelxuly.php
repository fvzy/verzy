<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
$whmusername = $tkwhm; 
$hostname = $linkwhm; 
$whmpasswpord = $mkwhm; 
$xoa = AntiXss($_GET['xoa']);
$khoa =  AntiXss($_GET['khoa']);
$mokhoa =  AntiXss($_GET['mokhoa']);
$bentancoder = AntiXss($_GET['bentancoder']);
if($xoa > 0){
$query = $hostname.':2087/json-api/removeacct?user='.$bentancoder.''; 
                                $curl = curl_init(); // Create Curl Object 
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); // Allow self-signed certs 
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); // Allow certs that do not match the hostname 
                                curl_setopt($curl, CURLOPT_HEADER,0); // Do not include header in output 
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
                                $header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpasswpord) . "\n\r";
                                curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
                                curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
                                $result = curl_exec($curl); 
                                $result = curl_exec($curl);
                                if ($result == false) {
                                    error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");  
                                }
                                curl_close($curl);
mysqli_query($ketnoi, "update `lich_su_mua_hosting` set `status` = 'xoa' WHERE id = '".$xoa."'  ") or exit;
 header('Location: /admin/lshost.php');

}
if($khoa > 0){
$query = $hostname.':2087/json-api/suspendacct?api.version=1&user='.$bentancoder.'&reason=Nonpayment&leave-ftp-accts-enabled=0'; 
                                $curl = curl_init(); // Create Curl Object 
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); // Allow self-signed certs 
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); // Allow certs that do not match the hostname 
                                curl_setopt($curl, CURLOPT_HEADER,0); // Do not include header in output 
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
                                $header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpasswpord) . "\n\r";
                                curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
                                curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
                                $result = curl_exec($curl); 
                                $result = curl_exec($curl);
                                if ($result == false) {
                                    error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");  
                                }
                                curl_close($curl);
mysqli_query($ketnoi, "update `lich_su_mua_hosting` set `status` = 'khoa2' WHERE id = '".$khoa."'  ") or exit;
 header('Location: /admin/lshost.php');

}
if($mokhoa > 0){
$query = $hostname.':2087/json-api/unsuspendacct?api.version=1&user='.$bentancoder.''; 
                                $curl = curl_init(); // Create Curl Object 
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); // Allow self-signed certs 
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); // Allow certs that do not match the hostname 
                                curl_setopt($curl, CURLOPT_HEADER,0); // Do not include header in output 
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
                                $header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpasswpord) . "\n\r";
                                curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
                                curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
                                $result = curl_exec($curl); 
                                $result = curl_exec($curl);
                                if ($result == false) {
                                    error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");  
                                }
                                curl_close($curl);
mysqli_query($ketnoi, "update `lich_su_mua_hosting` set `status` = 'hoantat' WHERE id = '".$mokhoa."'  ") or exit;
 header('Location: /admin/lshost.php');

}
