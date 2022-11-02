<?php require_once('../config/head.php'); ?>

 
<script>
// ajax
 	$(document).ready(function(){
		$('#bentancoder').click(function() {
		$('#bentancoder').html('Checking...');
		$('#bentancoder').prop('disabled', true);
		var formData = {
        'thaotac' : '1',
		'username'              : $('input[name=username]').val(),
		'captcha'              : $('input[name=captcha]').val(),
		'captcha2'              : $('input[name=captcha2]').val(),
		'captcha3'              : $('input[name=captcha3]').val(),
		'password'              : $('input[name=password]').val()
		};
		$.post("/dangnhap", formData,
			function (data) {
			    if(data.status == '1'){
				swal({
					title : "Notify",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
				$('#bentancoder').html('Login');
			$('#bentancoder').prop('disabled', false);
			    }else{
			     window.location="/";   
			     swal({
					title : "Notify",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
			     	$('#bentancoder').html('Login');
			$('#bentancoder').prop('disabled', false);
			    }
		}, "json");
	});
});

</script>     
 
 <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center">Customer Login</h2>
						</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
						<?php
$min_number = 1;
$max_number = 15;
$random_number1 = mt_rand($min_number, $max_number);
$random_number2 = mt_rand($min_number, $max_number);
?>
  <div class="input-group custom">
                        <input type="text" class="form-control form-control-lg" placeholder="<?php echo $random_number1 . ' + ' . $random_number2 . ' = ?';?>" name="captcha">
                        <input name="captcha2" type="hidden" value="<?php echo $random_number1; ?>" />
		                <input name="captcha3" type="hidden" value="<?php echo $random_number2; ?>" />
		               <div class="input-group-append custom">
<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
</div>
</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Save Password</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="/client/quenmk.php">Forgot password ?</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button class="btn btn-primary btn-lg btn-block" id="bentancoder">Login</button>
</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="/reg">Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
          
	<!-- WEBSITE OPERATED BY NEFFTZY.DEV | TELEGRAM : @zeccto -->
	<!-- Clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
new ClipboardJS('.copy');
</script>
 <script src="/assets/vendors/scripts/core.js"></script>
  <script src="/assets/vendors/scripts/script.min.js"></script>
  <script src="/assets/vendors/scripts/process.js"></script>
  <script src="/assets/vendors/scripts/layout-settings.js"></script>
  <script src="/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
  <!-- add sweet alert js & css in footer -->
  <script src="/assets/src/plugins/sweetalert2/sweetalert2.all.js"></script>
  <script src="/assets/src/plugins/sweetalert2/sweet-alert.init.js"></script>
  <!-- buttons for Export datatable -->
  <script src="/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
  <script src="/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
  <!-- Datatable Setting js -->
  <script src="/assets/vendors/scripts/datatable-setting.js"></script>
  <script src="/assets/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
  <script src="/assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
  <script src="/assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
  <script src="/assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="/assets/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="/assets/vendors/scripts/dashboard.js"></script>
	
	
<style>
  @-webkit-keyframes snowflakes-fall {
    0% {top:-10%}
    100% {top:100%}
  }
  @-webkit-keyframes snowflakes-shake {
    0%,100% {-webkit-transform:translateX(0);transform:translateX(0)}
    50% {-webkit-transform:translateX(80px);transform:translateX(80px)}
  }
  @keyframes snowflakes-fall {
    0% {top:-10%}
    100% {top:100%}
  }
  @keyframes snowflakes-shake {
    0%,100%{ transform:translateX(0)}
    50% {transform:translateX(80px)}
  }
  .snowflake {
    color: #fff;
    font-size: 1em;
    font-family: Arial, sans-serif;
    text-shadow: 0 0 5px #000;
    position:fixed;
    top:-10%;
    z-index:9999;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
    cursor:default;
    -webkit-animation-name:snowflakes-fall,snowflakes-shake;
    -webkit-animation-duration:10s,3s;
    -webkit-animation-timing-function:linear,ease-in-out;
    -webkit-animation-iteration-count:infinite,infinite;
    -webkit-animation-play-state:running,running;
    animation-name:snowflakes-fall,snowflakes-shake;
    animation-duration:10s,3s;
    animation-timing-function:linear,ease-in-out;
    animation-iteration-count:infinite,infinite;
    animation-play-state:running,running;
  }
  .snowflake:nth-of-type(0){
    left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s
  }
  .snowflake:nth-of-type(1){
    left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s
  }
  .snowflake:nth-of-type(2){
    left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s
  }
  .snowflake:nth-of-type(3){
    left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s
  }
  .snowflake:nth-of-type(4){
    left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s
  }
  .snowflake:nth-of-type(5){
    left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s
  }
  .snowflake:nth-of-type(6){
    left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s
  }
  .snowflake:nth-of-type(7){
    left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s
  }
  .snowflake:nth-of-type(8){
    left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s
  }
  .snowflake:nth-of-type(9){
    left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s
  }
  .snowflake:nth-of-type(10){
    left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s
  }
  .snowflake:nth-of-type(11){
    left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s
  }
body {
    cursor: url(https://tools1s.com/src/cur/arrow.cur),auto;
}
a:hover, input:hover, select:hover, button:hover {
    cursor:url(https://tools1s.com/src/cur/hover.cur),auto!important
}
</style>
</body>
</html>
<!-- WEBSITE OPERATED BY NEFFTZY.DEV | TELEGRAM : @zeccto -->