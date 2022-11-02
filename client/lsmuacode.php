<?php require_once('../config/head.php'); ?>
<title>Source Code Purchase History</title>
<?php require_once('../config/nav.php'); ?>
 <div class="content-body">

          
         

           <div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Source Code History</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Code purchase history</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
			
				  <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Source Code Purchase History</h4>
                    
                 </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                               <th>Price</th>
<th>Link Code</th>
<th>Purchase Time</th>
<th>Content</th>
<th>Seller</th>
   </tr>
   <?php
$i = 1;
$result1 = mysqli_query($ketnoi,"SELECT * FROM `lich_su_mua_code` WHERE `username` = '$username' ORDER BY id desc ");
while($bentancoder = mysqli_fetch_assoc($result1)) { ?>
</thead>
<tbody>
<tr>
    
    <th><?=$i;?> <?php $i++;?></th>
<th>Rp. <?=tien($bentancoder['gia']);?></th>    
<th><a href="<?=$bentancoder['link'];?>" class="btn btn-danger btn-round btn-sm">DOWLOAD</button></th>
<th><?=$bentancoder['time'];?></th>
<th clxass="btn" style="color:#000;" > <input type="button" onclick="alert('<?=$bentancoder['loaicode'];?>')" class="btn waves-effect waves-light btn-success" value="Click to view"/></th>
<th>NEFFTZY</th>
                            
                            <?php }?>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Export Datatable End -->
        </div>

<?php require_once('../config/foot.php'); ?>