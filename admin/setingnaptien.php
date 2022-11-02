<?php
include 'head.php';
include 'nav.php';
?>
<?php
    if (isset($_POST["naptsr"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `status_napthe` = '".($_POST['status_napthe'])."',
        `partner_id` = '".($_POST['partner_id'])."',
        `partner_key` = '".($_POST['partner_key'])."' ");

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
                <h3 class="card-title">CÀI ĐẶT NẠP THẺ CÀO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Partner ID <a href="//shopgachthe.com">SHOPGACHTHE.COM</a></label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Partner ID" name="partner_id" value="<?=$nefftzydev['partner_id'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Partner KEY</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Partner KEY" name="partner_key" value="<?=$nefftzydev['partner_key'];?>">
                  </div>
                  
                      <div class="form-group">
                        <label>ON/OFF NẠP THẺ CÀO</label>
                           <select class="form-control select2bs4" name="status_napthe">
                    <option value="<?=$nefftzydev['status_napthe'];?>">
                                            <?=$nefftzydev['status_napthe'];?>
                                        </option>
                    <option value="ON">ON</option>
                 <option value="OFF">OFF</option>
                                                    </select>
                      </div>
                   <p>Link CallBack Nạp Của Bạn Là : <?= 'https://'.$_SERVER['SERVER_NAME'].'/callbacknapthe.php';?></p>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="naptsr" class="btn btn-primary">Cập Nhập</button>
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