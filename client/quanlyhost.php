<?php include '../config/head.php'; ?>
<title>HOSTING MANAGEMENT</title>
<?php include '../config/nav.php'; ?>
<?php include '../httpsocket.php'; ?>

<?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
}
$bentancoder = $ketnoi->query("SELECT * FROM `lich_su_mua_hosting` WHERE `id` = '$id'")->fetch_array();
if(!$bentancoder)
{
    echo '<script> if (confirm("Page does not exist")) {
    window.location="/";
} else {
    alert("Canceled");
    window.location="?ok";
}
  </script>';
}
  if($bentancoder['username'] != $username)
{
    echo '<script> if (confirm("Page does not exist")) {
    window.location="/";
} else {
    alert("Canceled");
    window.location="?ok";
}
  </script>';  
}
if($bentancoder['status'] == 'xuly'){
$status = '<span class="btn btn-info form-fontrol btn-round btn-sm">Creating</span>';
} 
if($bentancoder['status'] == 'khoa'){
$status = '<span class="btn btn-warning form-fontrol btn-round btn-sm">Expired</span>';
}
if($bentancoder['status'] == 'hoantat'){
$status = '<span class="btn btn-success form-fontrol btn-round btn-sm">Active</span>';
}
if($bentancoder['status'] == 'khoa2'){
$status = '<span class="btn btn-warning form-fontrol btn-round btn-sm">Locked</span>';
}
if($bentancoder['status'] == 'thatbai'){
$status = '<span class="btn btn-danger form-fontrol btn-round btn-sm">Canceled</span>';
}
if($bentancoder['status'] == 'xoa'){
$status = '<span class="btn btn-danger form-fontrol btn-round btn-sm">Deleted</span>';
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script> 
<?php if($bentancoder['time'] == 'cpanel' && $bentancoder['server'] == 'Singapore'){ ?>

<?php
 if(isset($_POST['submit'])) {
 $bentancoder_check = $ketnoi->query("SELECT * FROM lich_su_mua_hosting WHERE id = '$id' ")->fetch_array();
 $traconcac = $bentancoder_check['gia'];
 $status = $bentancoder_check['status'];
 $tkhost = $bentancoder_check['tk_host'];
 $die = $bentancoder_check['ngay_het'];
 if($status == 'khoa2'){
echo '<script>swal("Notification", "Your host is locked so this request cannot be made", "error")</script>';
}else if($status == 'xoa'){
echo '<script>swal("Notification", "Your host has been deleted so this request cannot be made", "error")</script>';
                                }else
if($user['money'] < $traconcac){
$bentancoder_err = 'You dont have enough money!';
	echo '<script>swal("Notify", "'.$bentancoder_err.'", "error");</script>';  	 
}else{	
    
$taikhoan = $tkhost;				         
$whmusername = $tkwhm; 
$whmpasswpord = $mkwhm;
$hostname = $linkwhm; 
$concac = time() + mt_rand(1,99999); 
$matkhau = 'btcd'.$concac; 
$query = $hostname.':2087/json-api/unsuspendacct?api.version=1&user='.$taikhoan.''; 
$curl = curl_init(); // Create Curl Object 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); // Allow self-signed certs 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); // Allow certs that do not match the hostname 
curl_setopt($curl, CURLOPT_HEADER,0); // Do not include header in output 
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
$header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpasswpord) . "\n\r";
curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
$result = curl_exec($curl); 
if ($result == false) {
    echo ' <script>swal(" Error please contact admin", "'.$curl.'", "error")</script>';  
}
curl_close($curl);

echo '<script>swal("Notification", "Successful extension", "success")</script><meta http-equiv="refresh" content="1">';

$giahan30day = 24*30*60*60;
mysqli_query($ketnoi,"UPDATE `users` SET `money` = `money` - '$traconcac' WHERE `username` = '$username' ");
mysqli_query($ketnoi, "UPDATE `lich_su_mua_hosting` SET `ngay_het` = `ngay_het` + '$giahan30day' WHERE `tk_host` = '$taikhoan' ");
mysql_query("UPDATE `lich_su_mua_hosting` SET `status` = 'hoantat' WHERE `tk_host` = '$taikhoan'");


}

}                  
?>                                                              
 <?php
    if(isset($_POST['xoadichvu'])){
    $bentancoder_check = $ketnoi->query("SELECT * FROM lich_su_mua_hosting WHERE id = '$id' ")->fetch_array();
    $tk_host = $bentancoder_check['tk_host'];
    $status = $bentancoder_check['status'];
    $whmusername = $tkwhm; 
    $whmpasswpord = $mkwhm;
    $hostname = $linkwhm;
    if($status == 'khoa2'){
                                    echo '<script>swal("Notification", "Your host is locked so this request cannot be made", "error")</script>';
                                }else if($status == 'xoa'){
                                    echo '<script>swal("Notification", "Your host has been deleted so this request cannot be made", "error")</script>';
                                }else{
        $taikhoan = $tk_host;
        $query = $hostname.':2087/json-api/removeacct?user='.$taikhoan.''; 
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
    echo ' <script>swal("Error please contact admin", "'.$curl.'", "error")</script>';  
}
curl_close($curl);
echo '<script>swal("Notification", "Delete this host successfully", "success")</script><meta http-equiv="refresh" content="1">';
 mysqli_query($ketnoi, "UPDATE lich_su_mua_hosting SET `status` = 'xoa' WHERE `tk_host` = '$taikhoan'");
mysqli_query($ketnoi, "UPDATE lich_su_mua_hosting SET `note` = 'Bị User Xóa' WHERE `tk_host` = '$taikhoan'");
                                }
    }
    ?>
<?php } ?>

<div class="modal fade" id="extend-modal1" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body text-center font-18">
<h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to renew your hosting "<a href="https://<?=$bentancoder['tenmien']?>"><?=$bentancoder['tenmien']?></a>" 30 days?</h4>
<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
<div class="col-6">
<form method="POST">  
<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
Cancel
</div>
<div class="col-6">
<button name="submit" type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
OK
</div>
</div>
</div>
</div>
</div>
</div> 
</form>
<div class="modal fade" id="extend-modal2" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body text-center font-18">
<h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to delete hosting "<a href="https://<?=$bentancoder['tenmien']?>"><?=$bentancoder['tenmien']?></a>" forever?</h4>
<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
<div class="col-6">
<form method="POST">  
<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
Cancel
</div>
<div class="col-6">
<button name="xoadichvu" type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
OK
</div>
</div>
</div>
</div>
</div>
</div> 
</form>
<div class="modal fade" id="extend-modal3" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body text-center font-18">
<h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to reset your hosting password "<a href="https://<?=$bentancoder['tenmien']?>"><?=$bentancoder['tenmien']?></a>"?</h4>
<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
<div class="col-6">
<form method="POST">  
<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
Cancel
</div>
<div class="col-6">
<button name="datlaimk" type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
OK
</div>
</div>
</div>
</div>
</div>
</div> 
</form>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Hosting Management</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">hosting manager <?=$bentancoder['tenmien'];?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h4 class="mb-20 h4">Service Plan / Domain Name</h4>
                        <div class="panel-body card-body text-center">

                <div class="cpanel-package-details">
                    <h4 style="margin:0;"><?=$bentancoder['goi']?></h4>
                    <a href="https://<?=$bentancoder['tenmien']?>" target="_blank">www.<?=$bentancoder['tenmien']?></a>
                </div>

                <p>
                    <a href="https://<?=$bentancoder['tenmien']?>" class="btn btn-primary btn-sm" target="_blank">Access website</a>
                                    </p>

            </div>
                    </div>
                </div>             
                                
                 <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h4 class="mb-20 h4">Hosting operation</h4>
                        
                        <ul class="list-group">
                            <?php if($bentancoder['time'] == 'cpanel'){ ?>
                           <button data-toggle="modal" data-target="#extend-modal1" class="btn btn-success">Renew</button> 
                            <button data-toggle="modal" data-target="#extend-modal3" class="btn btn-danger">Reset Password</button>
        <button data-toggle="modal" data-target="#extend-modal2" class="btn btn-warning">Delete host</button> 
        <?php } ?>
        <?php if($bentancoder['time'] == 'directadmin'){ ?>
        <button data-toggle="modal" data-target="#extend-modalda" class="btn btn-success">Renew</button> 
                            <button data-toggle="modal" data-target="#extend-modalda3" class="btn btn-danger">Reset Password</button>
        <button data-toggle="modal" data-target="#extend-modalda2" class="btn btn-warning">Delete host</button> 
        <?php } ?>
                        </ul>
                        
                    </div>
                </div>      
                </form>
                <div class="col-lg-12 col-md-6 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h4 class="mb-20 h4">Hosting information</h4>
                        <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Information</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">DNS</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Status</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Other</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><ul class="list-group">
                            <center><li class="list-group-item">Account: <b style="color: green;"><?=$bentancoder['tk_host']?></b>
                            </li>
                            <li class="list-group-item">Password: <b data-clipboard-target="#stk5"
                                    id="stk5" class="copy"
                                    style="color: blue;"><?=$bentancoder['mk_host']?></b></li>
                            <li class="list-group-item">Registration email: <b><?=$bentancoder['emailuser']?></b>
                            </li>
                            <li class="list-group-item">Package Type: <b><?=$bentancoder['goi']?></b></li>
                            <?php if($bentancoder['time'] == 'cpanel'){ ?>
                            <li class="list-group-item">Login link: <b><a target="_blank" style="color:red;" href="<?=$bentancoder['linklogin']?>"><?=$bentancoder['linklogin']?></a></b></li>
                            <?php } ?>
                            <li class="list-group-item">Host type: <b><?=$bentancoder['time']?></b>
                            </li>
                                    </center>
                        </ul></div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><ul class="list-group">
                            <center>
                            <?php if($bentancoder['time'] == 'cpanel'){ ?>    
                            <li class="list-group-item">NS 1: <b><?=$bentancoder['ns1']?></b></li>
                            <li class="list-group-item">NS 2: <b><?=$bentancoder['ns2']?></b></li>
                            <?php } ?>
                            <?php if($bentancoder['time'] == 'cpanel' && $bentancoder['server'] == 'Singapore'){ ?>    
                            <li class="list-group-item">IP host: <b
                                    data-clipboard-target="#content5" id="content5"
                                    class="copy"
                                    style="color: red;"><button onclick="xemip()" class="btn btn-primary">Show IP</button></b></li>
                            <?php } ?>
                                    </center>
                        </ul></div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"><ul class="list-group">
                            <center>
                                <?php if($bentancoder['time'] == 'cpanel'){ ?>
                            <li class="list-group-item">Status: <b><?php
// KHÓA HOSTING SERVER 1
$timebaygio = time();
if($bentancoder['id'] > 0 && $bentancoder['ngay_het'] < "$timebaygio" && $bentancoder['status'] == 'hoantat' && $bentancoder['server'] == 'Singapore'){
$datatkhost = $bentancoder['tk_host'];
$whmusername = $tkwhm; // tk rsl
$hostname = $linkwhm; // link login rsl khong bao gom 2087
$whmpasswpord = $mkwhm; // ahihi
$haizzz = time() + mt_rand(1,99999); 
$matkhau = 'superidolbtcd'.$haizzz; // mk host
$query = $hostname.':2087/json-api/suspendacct?api.version=1&user='.$datatkhost.''; 
$curl = curl_init(); // Create Curl Object 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); // Allow self-signed certs 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); // Allow certs that do not match the hostname 
curl_setopt($curl, CURLOPT_HEADER,0); // Do not include header in output 
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
$header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpasswpord) . "\n\r";
curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
$result = curl_exec($curl); 
if ($result == false) {
}
curl_close($curl);
mysql_query("UPDATE `lich_su_mua_hosting` SET `status` = 'khoa' WHERE `ngay_het` < '$timebaygio'");
echo $status;
}

// KHÓA HOSTING SERVER 2



else{
echo $status;
}
echo "<br/>";
?></b>
                            </li>
                            <?php } ?>
                                                   
                                    </center>

                        </ul>   </div>             
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><ul class="list-group">
                            <center>
                            <li class="list-group-item">Price: <b>Rp. <?=number_format($bentancoder['gia'])?> / Month</b></li>
                            <li class="list-group-item">Renewal price: <b>Rp. <?=number_format($bentancoder['gia'])?> / Month</b></li>
                            
                                    <li class="list-group-item">Registration date: <b><?=date("H:i:s - d/m/Y", $bentancoder['ngay_mua']);?></b></li>
                                    <li class="list-group-item">Expiration date: <b><?=date("H:i:s - d/m/Y", $bentancoder['ngay_het']);?></b></li>
                                    </center>
                        </ul>
    </div>
  </div>
</div>

                        </div></div></div>
                    </div>
                </div>   
<?php if($bentancoder['time'] == 'cpanel' && $bentancoder['server'] == 'Singapore'){ ?>                
 <script>
 function xemip(){
     swal("Notify", "Your host IP is : <?=$iphost;?> !");
 }
</script>
<?php } ?>

<?php include '../config/foot.php'; ?> 