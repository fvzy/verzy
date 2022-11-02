<?php include('head.php');?>
<?php include('nav.php');?>

<?php
if(isset($_GET['xoa'])) {
$id = ($_GET['xoa']);
mysqli_query($ketnoi, "DELETE FROM `ds_host` WHERE `id` = '$id' ");
echo '<meta http-equiv="refresh" content="0;url=/admin/gia-host.php">';
}
?>

<?php
if (isset($_POST["submit"])) {
  $create = mysqli_query($ketnoi,"INSERT INTO `ds_host` SET 
    `ten` = '".($_POST['ten'])."',
    `note` = '".($_POST['note'])."',
    `server` = '".($_POST['server'])."',
    `urlgoihost` = '".($_POST['urlgoihost'])."',
    `gia` = '".($_POST['money'])."' ");

  if($create) {
    echo '<script>swal("Notification", "Successful", "success")</script><meta http-equiv="refresh" content="1">';  
  } else {
    echo '<script type="text/javascript">swal.fire("Notification","Server error","error");</script>'; 
  }
}

?>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LIST OF HOSTING</h3>
                <div class="text-right">
                    <a type="button" class="btn btn-default text-light bg-dark" data-toggle="modal" data-target="#modal-default"
                        class="btn btn-info text-light">Add Host</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>SERVER</th>
                                <th>MANIPULATION</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 1;
$result = mysqli_query($ketnoi,"SELECT * FROM `ds_host` ORDER BY id ASC ");
while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td><?=$row['ten'];?></td>
                                <td><?=tien($row['gia']);?>đ</td>
                                <td><?=$row['server'];?></td>
                                <td>
                                    <a href="sua-host.php?id=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-edit"></i> Edit Price
                                    </a>
                                    <a href="?xoa=<?=$row['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                PLEASE ACT CAREFULLY
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row (main row) -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Hosting</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NAME :</label>
                        <input type="text" class="form-control" name="ten" placeholder="neffhost">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">INFORMATION:</label>
                        <textarea class="ckeditor" type="text" class="form-control" name="note" placeholder=""></textarea>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">SERVER:</label>
                        <input type="text" class="form-control" value="Singapore"name="server" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">PRICE</label>
                        <input type="number" class="form-control" name="money" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">PACKAGE NAME</label>
                        <input type="text" class="form-control" name="urlgoihost" placeholder="">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                <button type="submit" name="submit" class="btn btn-primary">CREATE</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php include('foot.php');?>