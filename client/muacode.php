<?php require_once('../config/head.php'); ?>
<title>Buy Code</title>
<?php require_once('../config/nav.php'); ?>
<?php
if($bentancoder['status_muacode'] == 'OFF')
{
   die('<script> if (confirm("This function has been disabled by admin !")) {
    window.location="/";
} else {
    alert("Canceled");
    window.location="?ok";
}
  </script>');
}
?>
<?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
}
$bentancoder_code = $ketnoi->query("SELECT * FROM `khocode` WHERE `id` = '$id' ")->fetch_array();
if(!$bentancoder_code)
echo '<script> if (confirm("Page does not exist")) {
    window.location="/";
} else {
    alert("Canceled");
    window.location="?ok";
}
  </script>'
?>
 <?php
                        	$min_number = 1;
                        	$max_number = 15;
                        
                        	$random_number1 = mt_rand($min_number, $max_number);
                        	$random_number2 = mt_rand($min_number, $max_number);
                        ?>    
 <script>
// ajax
 	$(document).ready(function(){
		$('#bentancoder').click(function() {
		$('#bentancoder').html('...');
		$('#bentancoder').prop('disabled', true);
		var formData = {
        'thaotac' : '1',
		'code_id_value' : $('input[id=code_id_value]').val(),
		'captcha'              : $('input[id=captcha]').val(),
		'captcha2'              : $('input[id=captcha2]').val(),
		'captcha3'              : $('input[id=captcha3]').val()
		};
		$.post("/muacode", formData,
		function (data) {
			    if(data.status == '1'){
			swal({
					title : "Notify",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
				$('#bentancoder').html('<i class="fa fa-check"></i>');
			$('#bentancoder').prop('disabled', false);
			    }else{
			   //  window.location="/";   
			    swal({
					title : "Notify",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
				$('#bentancoder').html('<i class="fa fa-check"></i>');
			$('#bentancoder').prop('disabled', false);
			    }
		}, "json");
	});
});

</script>
<div class="modal fade" id="bentancodercode" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body text-center font-18">
<h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to buy this code?</h4>
<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
<div class="col-6">
<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
Cancel
</div>
<div class="col-6">
<button id="bentancoder" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
OK
</div>
</div>
</div>
</div>
</div>
</div> 
		<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?=$bentancoder_code['title'];?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                               
                                <li class="breadcrumb-item active" aria-current="page"><a href="#">Code payment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            </a>
             
                          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                
                        <h4 class="text-blue h4"><?=$bentancoder_code['title'];?></h4>
        <div class="col-md-12" style="float:none;margin:0 auto;color:blue;">
          <div class="row" style="background-color:#fff;">
<h2 class="page-title">
<h4><center>
</font>
</h4></center>
<div class="sa-ttactit clearfix" style="
    width: 100%;
"><center><font style="color:blue;font-weight:550;"><i class="icon-copy fa fa-laptop"></i> The code has been verified by the admin to be the correct code as described in the code and photo! <br></font><br>    <h6 class="h4 font-w700 mb-2 text-muted text-center">
    <h6 class="h4 font-w700 mb-2 text-muted text-center">
<font style="color: blue;  margin-top: -100px;"> Rp.<?=tien($bentancoder_code['gia']);?></font>
</h6>
<br>Note: there is no refund policy for the above code purchases <?=$url;?>, It's up to you to buy it or not!</br>
<input type="hidden" id="code_id_value" value="<?=$bentancoder_code['id']?>">
<div class="col-sm-12 col-md-10">
<input type="text" class="form-control mt-2 mb-2" placeholder="<?php echo $random_number1 . ' + ' . $random_number2 . ' = ?';?>" id="captcha">
                        <input id="captcha2" type="hidden" value="<?php echo $random_number1; ?>" />
		                <input id="captcha3" type="hidden" value="<?php echo $random_number2; ?>" />
<button class="btn btn-primary" data-toggle="modal" data-target="#bentancodercode"><i class="icon-copy fa fa-send mr-1"
                            aria-hidden="true"></i> BUY NOW</button> </h4>
   </form>                                                     </center>

 <div cxlass="sl-dtprod">
<div class="container">
<div class="sl-dtprmain">
<div class="sa-lsnmain clearfix">
<div class="row">
</div>
</span>
</br>
<div class="title">
<p>Description : </p>
                        </div>
<center><p><?=$bentancoder_code['noidung'];?></p></center><br>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 
 
</div>
            
        	
	</div>
<?php require_once('../config/foot.php'); ?>