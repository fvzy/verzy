<?php
include 'head.php';
include 'nav.php';
?>
<?php
    if (isset($_POST["naptsr"]) && isset($_SESSION['admin'])) {       
      $create = $ketnoi->query("UPDATE `setting` SET
        `ten_web` = '".($_POST['ten_web'])."',
        `logo` = '".($_POST['logo'])."',
        `favicon` = '".($_POST['favicon'])."',
        `mo_ta` = '".($_POST['mo_ta'])."',
        `telegram` = '".($_POST['telegram'])."',
        `whatsapp` = '".($_POST['whatsapp'])."',
        `thongbao` = '".($_POST['thongbao'])."',
        `email` = '".($_POST['email'])."',
        `website` = '".($_POST['website'])."',
        `esmtp` = '".($_POST['esmtp'])."',
        `passemail` = '".($_POST['passemail'])."',
        `color` = '".($_POST['color'])."',
        `botnotif` = '".($_POST['botnotif'])."',
        `apikeybot` = '".($_POST['apikeybot'])."',
        `website_tinnhan` = '".($_POST['website_tinnhan'])."'
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
                <h3 class="card-title text-center">WEBSITE SETTING</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                	                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">WEBSITE NAME</label>
                                <input type="text" class="form-control" name="ten_web"
                                    placeholder="BENTANCODER" value="<?=$bentancoder['ten_web'];?>">
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">LINK PHOTO LOGO</label>
                                <input type="text" class="form-control" name="logo"
                                    placeholder="" value="<?=$bentancoder['logo'];?>">
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">FAVICON</label>
                                <input type="text" class="form-control" name="favicon"
                                    placeholder="" value="<?=$bentancoder['favicon'];?>">
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">WEBSITE DESCRIPTION</label>
                                <input type="text" class="form-control" name="mo_ta" placeholder=""
                                    value="<?=$bentancoder['mo_ta'];?>">
                            </div>
                        
                                              
                            <div class="form-group">

                                <label for="example-color-input" class="form-control-label">Web Theme Color</label>
                                                          	<div class="colorPicker mb-3"></div>
  <input class="form-control" type="text" id="hexInput" value="<?=$bentancoder['color'];?>" name="color">
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">WHATSAPP</label>
                                <input type="number" class="form-control" name="whatsapp" placeholder="628xxxxx"
                                    value="<?=$bentancoder['whatsapp'];?>">
                            </div>
                        
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">TELEGRAM ID</label>
                                <input type="text" class="form-control" name="telegram" placeholder=""
                                    value="<?=$bentancoder['telegram'];?>">
                            </div>
                        
                                               
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Info</label>
                                <textarea type="text" class="ckeditor" name="thongbao" placeholder=""
><?=$bentancoder['thongbao'];?></textarea>
                            </div>
                            
                            
                <h5 class="card-title text-center">Whatsapp Notification</h5>
             <i>Register <a href="https://wa.verzy.my.id/register">Click Here</a></i>              
                           <div class="form-group">
                                <label for="exampleInputEmail1">Sender</label>                               
                                <input type="tel" class="form-control" name="botnotif" placeholder="628xxx"
                                    value="<?=$bentancoder['botnotif'];?>">
                            </div>
              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apikey</label>
                                <input type="text" class="form-control" name="apikeybot" placeholder="xxxxx"
                                    value="<?=$bentancoder['apikeybot'];?>">
                                    </div>    

        
<div class="card-header">
                <h5 class="card-title text-center">SMTP SETTING</h5>
              </div>
              
                           <div class="form-group">
                                <label for="exampleInputEmail1">MAIL</label>
                                <input type="text" class="form-control" name="email" placeholder="hi@nefftzy.dev"
                                    value="<?=$bentancoder['email'];?>">
                            </div>
              
                            <div class="form-group">
                                <label for="exampleInputEmail1">PASSWORD</label>
                                <input type="text" class="form-control" name="passemail" placeholder="••••••"
                                    value="<?=$bentancoder['passemail'];?>">
                                    </br>
                                    <i>Contact <a href="https://wa.me/628988293493">Ditzzy</a> for help</i>
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
<script src='https://cdn.jsdelivr.net/npm/@jaames/iro/dist/iro.min.js'></script><script  src="./script.js"></script>
<script>
var colorPicker = new iro.ColorPicker(".colorPicker", {
  width: 150,
  color: "<?=$bentancoder['color'];?>",
  borderWidth: 1,
  borderColor: "#fff" });
var hexInput = document.getElementById("hexInput");
colorPicker.on(["color:init", "color:change"], function (color) {
  hexInput.value = color.hexString;
});
hexInput.addEventListener('change', function () {
  colorPicker.color.hexString = this.value;
});
	
	</script>





<?php
include 'foot.php';
?>