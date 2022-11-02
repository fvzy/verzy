<?php include '../config/head.php'; ?>
<title>Buy Hosting</title>
<?php include '../config/nav.php'; ?>
<?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
}
$bentancoder_host = $ketnoi->query("SELECT * FROM `ds_host` WHERE `id` = '$id' ")->fetch_array();
if(!$bentancoder_host)
echo '<script> if (confirm("Package does not exist")) {
    window.location="/";
} else {
    alert("Canceled");
    window.location="?ok";
}
  </script>'
?>
<?php
if($bentancoder['status_muahost'] == 'OFF')
{
   die('<script> if (confirm("This function has been disabled by admin!")) {
    window.location="/";
} else {
    alert("Canceled");
    window.location="?ok";
}
  </script>');
}
?>
<?php if($bentancoder_host['server'] == 'Singapore'){ ?> 
<script type="text/javascript">
$(document).ready(function(){
		$('#bentancoder').click(function() {
		$('#bentancoder').html('Processing...');
		$('#bentancoder').prop('disabled', true);
		var formData = {
		'type' : 'bentancoder',
            'emailuser'              : $("#emailuser").val(),
            'tenmien'              : $("#tenmien").val(),
            'id'              : $("#id").val()
		};
		$.post("/muahost", formData,
			function (data) {
			    if(data.status == '1'){
				swal('Notify', data.msg, 'error');
				$('#bentancoder').html('Buy nơ');
			$('#bentancoder').prop('disabled', false);
			    }else{
			     //window.location="/";   
			     swal('Notify', data.msg, 'success');
                 
			     	$('#bentancoder').html('Buy now');
			$('#bentancoder').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php } ?>
 <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Hosting Cpanel</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/host">hosting price list</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">hosting cpanel</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
                     
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Domain Information</h4>
                        <p class="mb-30">Enter the required information below</p>
                    </div>
                    
                </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Domain</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="tenmien" placeholder="Enter your domain name"
                                >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="emailuser"
                                placeholder="Your email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Id package</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="<?=$bentancoder_host['id'];?>" id="id" readonly="">
                        </div>
                    </div>
                    <?php if($bentancoder_host['server'] == 'Singapore'){ ?>
                    <button class="btn btn-primary" id="bentancoder" type="submit"><i class="icon-copy fa fa-send mr-1"
                            aria-hidden="true"></i>Buy now</button>
                    <?php } ?>
                    
                </form>
            </div>
            
        </div>
        	
                  
<?php include '../config/foot.php'; ?>                    