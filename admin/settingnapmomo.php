<?php
include 'head.php';
include 'nav.php';
?>
<?php
    if (isset($_POST["submit"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `momo` = '".($_POST['momo'])."',
        `status_napmomo` = '".($_POST['status_napmomo'])."',
        `apikey_momo` = '".($_POST['apikey_momo'])."' ");

      if ($create) {
        echo '<script>swal("Thành công", "Thành công", "success")</script><meta http-equiv="refresh" content="1">';  
        die;
      } else {
        echo '<script type="text/javascript">swal.fire("Thất Bại","Lỗi máy chủ","error");setTimeout(function(){ location.href = "" },1000);</script>'; 
        die;
      }
    }

?>

<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">CÀI ĐẶT NẠP MOMO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Api Key</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Api Key" name="apikey_momo" value="<?=$nefftzydev['apikey_momo'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Số điện thoại" name="momo" value="<?=$nefftzydev['momo'];?>">
                  </div>
                  
                      <div class="form-group">
                        <label>ON/OFF NẠP MOMO</label>
                           <select class="form-control select2bs4" name="status_napmomo">
                    <option value="<?=$nefftzydev['status_napmomo'];?>">
                                            <?=$nefftzydev['status_napmomo'];?>
                                        </option>
                    <option value="ON">ON</option>
                 <option value="OFF">OFF</option>
                                                    </select>
                      </div>
                   <p>Link Cron Nạp Của Bạn Là : <?= 'https://'.$_SERVER['SERVER_NAME'].'/CronMomo';?></p>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Cập Nhập</button>
                </div>
             </div>    
              </form>
</div>  
           




        
         
         
        
               
            
          
          </div>
          
        </div>
        
      </div>
    </section>
   
  </div>
  





<?php
include 'foot.php';
?>