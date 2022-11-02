<?php include('head.php');?>
<?php include('nav.php');?>


        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hosting Packages Sold Out</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
<th>#</th>
<th>Username</th>
<th>Account</th>
<th>Password</th>
<th>Purchase Date</th>
<th>Expiration date</th>
<th>Package</th>
<th>Price</th>
<th>Status</th>
<th>Note</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 1;
$result = mysqli_query($ketnoi,"SELECT * FROM `lich_su_mua_hosting` WHERE status = 'khoa' ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <th><?=$i++;?></th>
<th><?=$row['username'];?></th>
<th><?=$row['tk_host'];?></th>
<th><?=$row['mk_host'];?></th>
<th><?=date('d-m-Y H:i:s',$row['ngay_mua']);?></th>
<th><?=date('d-m-Y H:i:s',$row['ngay_het']);?></th>
<th><?=($row['goi']);?></th>
<th><?=tien($row['gia']);?>đ</th>
<th><?=status($row['status']);?></th>
<th><?=$row['note'];?></th>
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