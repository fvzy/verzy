<?php include('head.php');?>
<?php include('nav.php');?>

 <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
        </div><!-- /.row -->
        
         <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Quản Lý Nạp MOMO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Người nạp</th>
                      <th>Số Tiền</th>
                    <th>Mã GD</th>
                    <th>Thời Gian</th>
                  </tr>
                  </thead>
                  <tbody>
                      
<?php
$i = 1;
$result = mysqli_query($ketnoi,"SELECT * FROM `bentancoder_napmomo` ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>              
                                     <td><?=$row['uid'];?></td>
                                    <td><?=number_format($row['sotien']) ?><sup>VNĐ</sup></td>
                                    <td><?=$row['magd'];?></td>
                                    <td><?=date('H:i:s - d/m/Y',$row['time']) ?></td>

 </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->


<?php include 'foot.php'; ?>  