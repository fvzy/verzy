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
                <h3 class="card-title">LIST OF USER HOSTING</h3>
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
<th>Trang Thai</th>
<th>Note</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 1;
$result = mysqli_query($ketnoi,"SELECT * FROM `lich_su_mua_hosting` WHERE time = 'cpanel' ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <th><?=$i++;?></th>
<th><?=$row['username'];?></th>
<th><?=$row['tk_host'];?></th>
<th><?=$row['mk_host'];?></th>
<th><?=date('d-m-Y H:i:s',$row['ngay_mua']);?></th>
<th><?=date('d-m-Y H:i:s',$row['ngay_het']);?></th>
<th><?=$row['goi'];?></th>
<th><?=tien($row['gia']);?>đ</th>
<th><?=status($row['status']);?></th>
                      <td><a onclick="document.getElementById('chucnang<?=$row['id'];?>').style.display='block'"><button class="btn waves-effect waves-light btn-warning" type="button">Panel</button></a>
                      <div id="chucnang<?=$row['id'];?>" class="modal">
     <div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
               <h5 class="modal-title" id="xacnhanorder"><?=$row['tenmien'];?></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">


  <div class="c-content-tab-4 c-opt-3" role="tabpanel">
                       
                   <center>     <div class="col-md-12">
        
        
        <form action="" method="POST">
    Select action<br>
    
   <a href="/ajax/cpanelxuly.php?khoa=<?=$row['id'];?>&bentancoder=<?=$row['tk_host'];?>" class="btn waves-effect waves-light btn-warning">Lock</a> hoc  <a href="/ajax/cpanelxuly.php?mokhoa=<?=$row['id'];?>&bentancoder=<?=$row['tk_host'];?>" class="btn waves-effect waves-light btn-success">Open</a> or
   <a href="/ajax/cpanelxuly.php?xoa=<?=$row['id'];?>&bentancoder=<?=$row['tk_host'];?>" class="btn waves-effect waves-light btn-danger">Delete</a>
</form>
        
        </div></center>
                    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" onclick="document.getElementById('chucnang<?=$row['id'];?>').style.display='none'" class="cancelbtn">Close</button>

</div>
</div>
</div>
</div>                              </td> 
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