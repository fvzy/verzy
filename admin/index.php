<?php include('head.php');?>
<?php include('nav.php');?>

<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<?php 
$total_user = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `users` ")) ['COUNT(*)']; 

$total_cardauto = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_napthe` ")) ['COUNT(*)']; 

$total_cards = $total_cardauto;

$total_a = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_napthe` WHERE `status` = 'hoantat' ")) ['COUNT(*)']; 

$total_thanhcong = $total_a;

$total_thexuly = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_napthe` WHERE `status` = 'xuly' ")) ['COUNT(*)']; 
$total_az = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_napthe` WHERE `status` = 'thatbai' ")) ['COUNT(*)']; 

$total_thethatbai = $total_az;

$total_mienxuly = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_domain` WHERE `status` = 'xuly' ")) ['COUNT(*)']; 

$total_mienhoatdong = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_domain` WHERE `status` = 'hoantat' ")) ['COUNT(*)']; 

$total_mienthatbai = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `bentancoder_domain` WHERE `status` = 'thatbai' ")) ['COUNT(*)']; 
?>
    
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=tien(mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT SUM(money) FROM `users` WHERE `money` >= 0 ")) ['SUM(money)']);?> IDR</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                           <span>Total Membership Fee</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?=tien($total_user);?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                              <span>Total Members</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=tien(mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT SUM(menhgia) FROM `bentancoder_napthe` WHERE `status` = 'hoantat' AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")) ['SUM(menhgia)']);?> IDR</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                                 <span>Today's Revune</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                  <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=tien(mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT SUM(menhgia) FROM `bentancoder_napthe` WHERE `status` = 'hoantat'")) ['SUM(menhgia)']);?> IDR</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                              <span>Total Revenue</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-8 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Logs</h6>
                  <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th class="text-center">STT</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Content</th>
                                <th class="text-center">Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM `log_login` ORDER BY id desc limit 0, 100000");
while($row2 = mysqli_fetch_assoc($result))
{
?>
                            <tr>
                                <td class="text-center"><?=$i; $i++;?></td>
                                <td class="text-center"><?=$row2['username'];?></td>
                                <td class="text-center"><?=$row2['content'];?></td>
                                <td class="text-center"><?=$row2['time'];?></td>
                            </tr>

                            <?php }?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
           
        

        </div>
        
      </div>
     
      <?php include('foot.php');?>