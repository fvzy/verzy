<?php include('head.php');?>
<?php include('nav.php');?>


<?php
if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];
mysqli_query($ketnoi, "DELETE FROM `lich_su_mua_code` WHERE `id` = '$id' ");
echo '<meta http-equiv="refresh" content="0;url=/admin/lsmuacode.php">';
}
?>


        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Code Purchase History</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
<th>#</th>
<th>Username</th>
<th>Code Type</th>
<th>Link Code</th>
<th>Status</th>
<th>Purchase Date</th>
<th>Manipulation</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 1;
$result = mysqli_query($ketnoi,"SELECT * FROM `lich_su_mua_code` ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <th><?=$i++;?></th>
<th><?=$row['username'];?></th>
<th><?=$row['loaicode'];?></th>
<th><a href="<?=$row['link'];?>" class="btn btn-danger btn-round btn-sm">DOWNLOAD</button></th>
<th><?=status($row['status']);?></th>
<th><?=$row['time'];?></th>
                      <td><a href="?xoa=<?=$row['id'];?>" class="btn btn-danger btn-sm">Delete</a></td> 
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

<?php include('foot.php');?>