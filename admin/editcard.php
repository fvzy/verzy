
<?php include('head.php');?>
<?php include('nav.php');?>

        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php
if (isset($_GET['code'])) {
    $code = ($_GET['code']);
}

$AADDCC = mysqli_query($ketnoi,"SELECT * FROM `bentancoder_loaithe` WHERE `code` = '".$code."' ");
while ($row = mysqli_fetch_array($AADDCC)) {
  if (isset($_POST["btn_submit"])) {

    mysqli_query($ketnoi,"UPDATE `bentancoder_loaithe` SET 
        `loaithe` = '".($_POST['loaithe'])."',
        `value` = '".($_POST['value'])."',
        `status` = '".($_POST['status'])."',
        `ck` = '".($_POST['ck'])."'  
        WHERE `code` = '".$code."' ");

    echo '<script>swal("Thành công", "Thành công", "success")</script><meta http-equiv="refresh" content="1">';  
      
  }

?>


<div class="row">

<section class="col-lg-12 connectedSortable">
  
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">EDIT LOẠI THẺ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">VALUE</label>
                    <input type="text" class="form-control" name="value" value="<?=$row['value'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TYPE</label>
                    <input type="text" class="form-control" name="loaithe" value="<?=$row['loaithe'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CK</label>
                    <input type="text" class="form-control" name="ck" value="<?=$row['ck'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="text" class="form-control" value="<?=$row['time'];?>" disabled>
                  </div>
                  <div class="form-group">
                  <label>TRẠNG THÁI</label>
                    <select class="form-control select2bs4" name="status" style="width: 100%;">
                      <option value="<?=$row['status'];?>" ><?=$row['status'];?></option>
                      <option value="ON">ON</option>
                      <option value="OFF">OFF</option>
                    </select>
            </div>
                <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Lưu Lại</button>
                </div>
              </form>
            </div>

</form>
</section>
<?php }?>
</div>



<?php include('foot.php');?>