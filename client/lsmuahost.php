<?php require_once('../config/head.php'); ?>
<title>Hosting Purchase History</title>
<?php require_once('../config/nav.php'); ?>

   <div class="content-body">

          
         
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Hosting Purchase History</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hosting Purchase History</li>
                           	</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
			
			  <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Hosting Purchase History</h4>
                    
                </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                              <th>Domain</th>
<th>Purchase Date</th>
<th>Expiration date</th>
<th>Status</th>
<th>Manipulation</th>
   </tr>
 <?php
$i = 1;
$result1 = mysqli_query($ketnoi,"SELECT * FROM `lich_su_mua_hosting` WHERE `username` = '$username' ORDER BY id desc ");
?>
<?php
while($bentancoder = mysqli_fetch_assoc($result1)){
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
$status = '<span class="btn btn-danger form-fontrol btn-round btn-sm">Delete</span>';
}
?>
</thead>
<tbody>
<tr>
	   <th><?=$i++;?></th>
<th><?=$bentancoder['tenmien'];?></th>
<th><?=date('d-m-Y H:i:s',$bentancoder['ngay_mua']);?></th>
<th><?=date('d-m-Y H:i:s',$bentancoder['ngay_het']);?></th>

<?php if($bentancoder['time'] == 'cpanel' ){ ?>
<th>
<?php
// KHÓA HOSTING SERVER 1
$timebaygio = time();
if($bentancoder['id'] > 0 && $bentancoder['ngay_het'] < "$timebaygio" && $bentancoder['status'] == 'hoantat' && $bentancoder['server'] == 'Singapore'){
$datatkhost = $bentancoder['tk_host'];
$whmusername = $tkwhm;
$hostname = $linkwhm; 
$whmpasswpord = $mkwhm; 

$data = [
            'user' => $datatkhost
        ];
        
        $query = $linkwhm . ":2087/json-api/suspendacct?api.version=1";
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
}
curl_close($curl);
mysql_query("UPDATE `lich_su_mua_hosting` SET `status` = 'khoa' WHERE `ngay_het` < '$timebaygio'");
echo $status;
}
else{
echo $status;
}
echo "</br>";
?></th>
<?php } ?>
<th>
	
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="/quan-ly/<?=$bentancoder['id'];?>"><i class="dw dw-eye"></i>View</a>
											</div>
										</div>
									</th>                         
    <?php }?>
</tr> 
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
<?php require_once('../config/foot.php'); ?>