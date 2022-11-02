<?php
include 'head.php';
include 'nav.php';
?>
<?php
    if (isset($_POST["naptsr"]) && isset($_SESSION['admin'])) {       
      $create = $ketnoi->query("UPDATE `whmacct` SET
        `ip` = '".($_POST['ip'])."',
        `hostname` = '".($_POST['hostname'])."',
        `ns1` = '".($_POST['ns1'])."',
        `ns2` = '".($_POST['ns2'])."',
        `username` = '".($_POST['username'])."',        
        `password` = '".($_POST['password'])."'
");

      if ($create) {
        echo '<script>swal("Successful", "Successful", "success")</script><meta http-equiv="refresh" content="1">';  
        die;
      } else {
        echo '<script type="text/javascript">swal.fire("Failure","Server error","error");setTimeout(function(){ location.href = "" },1000);</script>'; 
        die;
      }
    }

?>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

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
                <h3 class="card-title text-center">WHM CONFIGURATION</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                	                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">IP WHM</label>
                                <input type="text" class="form-control" name="ip"
                                    placeholder="" value="<?=$iphost;?>" required>
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">HOSTNAME</label>
                                <input type="text" class="form-control" name="hostname"
                                    placeholder="" value="<?=$linkwhm;?>" required>
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">USERNAME</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="" value="<?=$tkwhm;?>" required>
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">PASSWORD</label>
                                <input type="text" class="form-control" name="password" placeholder=""
                                    value="<?=$mkwhm;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NAMESERVER 1</label>
                                <input type="text" class="form-control" name="ns1" placeholder="OPTIONAL"
                                    value="<?=$ns1;?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NAMESERVER 2</label>
                                <input type="text" class="form-control" name="ns2" placeholder="OPTIONAL"
                                    value="<?=$ns2;?>">
                            </div>
                        
                                              
                          
</div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="naptsr" class="btn btn-primary">Update</button>
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