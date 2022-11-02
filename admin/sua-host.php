
<?php include('head.php');?>
<?php include('nav.php');?>

        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$AADDCC = mysqli_query($ketnoi,"SELECT * FROM `ds_host` WHERE `id` = '$id' ");
while ($row = mysqli_fetch_array($AADDCC)) {
  if (isset($_POST["btn_submit"])) {
    $money = ($_POST["money"]); 

   mysqli_query($ketnoi,"UPDATE `ds_host` SET 
    `ten` = '".($_POST['ten'])."',
    `note` = '".($_POST['note'])."',
    `server` = 'Singapore',
    `urlgoihost` = '".($_POST['urlgoihost'])."',
    `gia` = '".($_POST['money'])."' WHERE `id` = '".$id."' ");

   echo '<script>swal("Thành công", "Thành công", "success")</script><meta http-equiv="refresh" content="1">';  
      
  }

?>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="row">
<section class="col-lg-12 connectedSortable">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SỬA HOSTING <?=$row['ten'];?></h3>
              </div>
              
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Name : </label>
                    <input type="text" class="form-control" name="ten" value="<?=$row['ten'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Information : </label>
                    <textarea class="ckeditor" class="form-control" name="note" value=""><?=$row['note'];?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price : </label>
                    <input type="text" class="form-control" name="money" value="<?=$row['gia'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Package name : </label>
                    <input type="text" class="form-control" name="urlgoihost" value="<?=$row['urlgoihost'];?>">
                  </div>
                <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-info btn-block">Submit</button>
                </div>
              </form>
            </div>
</section>

</div>
<?php }?>


<?php include('foot.php');?>