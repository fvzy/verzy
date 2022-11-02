
<?php include('head.php');?>
<?php include('nav.php');?>

        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php
if (isset($_GET['username'])) {
    $usernamer = ($_GET['username']);
}

$AADDCC = mysqli_query($ketnoi,"SELECT * FROM `users` WHERE `username` = '".$usernamer."' ");
while ($row = mysqli_fetch_array($AADDCC)) {
  if (isset($_POST["btn_submit"])) {
    $bannd = ($_POST["bannd"]); 
    $level = ($_POST["level"]);

    mysqli_query($ketnoi,"UPDATE `users` SET 
    `bannd` = '$bannd',
    `level`= '$level'  WHERE `username` = '".$usernamer."' ");

    echo '<script>swal("Thành công", "Thành công", "success")</script><meta http-equiv="refresh" content="1">';  
      
  }
  ?>
  <?php
if(isset($_POST['btn_congluot']))
{
    $nefftzydev = ($_POST['bentancoder']);


    $create = mysqli_query($ketnoi,"UPDATE `users` SET `bentancoder`=`bentancoder`+ '$nefftzydev' WHERE `username`='".$row['username']."'");

    if ($create)
    {
       echo '<script>swal("Successful", "Successful", "success")</script><meta http-equiv="refresh" content="1">';  
    }
    else
    {
      echo '<script type="text/javascript">swal.fire("Error","Server error","error");
            setTimeout(function(){ location.href = "" },2000);</script>';
    }       
}
?>
<?php
if(isset($_POST['btn_truluot']))
{
    $nefftzydev2 = ($_POST['bentancoder2']);


    $create = mysqli_query($ketnoi,"UPDATE `users` SET `bentancoder`=`bentancoder` - '$nefftzydev2' WHERE `username`='".$row['username']."'");

    if ($create)
    {
       echo '<script>swal("Successful", "Successful", "success")</script><meta http-equiv="refresh" content="1">';  
    }
    else
    {
      echo '<script type="text/javascript">swal.fire("Error","Server error","error");
            setTimeout(function(){ location.href = "" },2000);</script>';
    }
}
?>
<?php
if(isset($_POST['btn_congtien']))
{
    $sotien = $_POST['sotien'];


    $create = mysqli_query($ketnoi,"UPDATE `users` SET `money`=`money`+ '$sotien', `tong_nap` = `tong_nap` + '$sotien' WHERE `username`='".$row['username']."'");

    if ($create)
    {
       echo '<script>swal("Successful", "Successful", "success")</script><meta http-equiv="refresh" content="1">';  
    }
    else
    {
      echo '<script type="text/javascript">swal.fire("Error","Server error","error");
            setTimeout(function(){ location.href = "" },2000);</script>';
    }       
}
if(isset($_POST['btn_trutien']))
{
    $sotien = $_POST['sotien'];


    $create = mysqli_query($ketnoi,"UPDATE `users` SET `money`=`money`- '$sotien' WHERE `username`='".$row['username']."'");

    if ($create)
    {
       echo '<script>swal("Successful", "Successful", "success")</script><meta http-equiv="refresh" content="1">';  
    }
    else
    {
      echo '<script type="text/javascript">swal.fire("Error","Server error","error");
            setTimeout(function(){ location.href = "" },2000);</script>';
    }
}
?>

<div class="row">

<section class="col-lg-12 connectedSortable">
  
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MEMBER</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" value="<?=$row['username'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Balance</label>
                    <input type="text" class="form-control" value="Rp. <?php echo number_format($row['money'], 0, '.', '.');?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" value="<?=$row['email'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Registration Date</label>
                    <input type="text" class="form-control" value="<?=$row['time'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="custom-select" name="bannd">
                       <option value="<?=$row['bannd'];?>">
                      <?php
                      if($row['bannd'] == "0"){ echo 'Activated';}
                      if($row['bannd'] == "1"){ echo 'Banned';}
                      ?>  
                      </option> 
                          <option value="0">Activated</option>
                          <option value="1">Banned</option>
                        </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Rank</label>
                    <select class="custom-select" name="level">
                       <option value="<?=$row['level'];?>">
                      <?php
                      if($row['level'] == "810"){ echo 'Administrators';}
                      if($row['level'] == "1010"){ echo 'Authorized dealer';}
                      if($row['level'] == "0"){ echo 'Member';}
                      ?>  
                      </option> 
                          <option value="810">Administrators</option>
                          <option value="1010">Authorized dealer</option>
                          <option value="0">Member</option>
                        </select>
                  </div>
                <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
</section>


<section class="col-lg-6 connectedSortable">
<form class="form-horizontal" action="" method="post">  
<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add Balance</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="number" class="form-control" name="sotien" placeholder="">
                </div>
                 <div class="card-footer">
                  <button type="submit" name="btn_congtien" class="btn btn-primary">Submit</button>
                </div>
              </div>

              <!-- /.card-body -->
            </div>
</form>            
</section>  

<section class="col-lg-6 connectedSortable">
<form class="form-horizontal" action="" method="post">  
<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Deduction</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount Deducted</label>
                    <input type="number" class="form-control" name="sotien" placeholder="">
                </div>
                 <div class="card-footer">
                  <button type="submit" name="btn_trutien" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</form>
</section>

<?php }?>
</div>



<?php include('foot.php');?>