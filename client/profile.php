<?php include '../config/head.php'; ?>
<title>User Profile</title>
<?php include '../config/nav.php'; ?>
      
 
<script>
// ajax
 	$(document).ready(function(){
		$('#bentancoder').click(function() {
		$('#bentancoder').html('Checking...');
		$('#bentancoder').prop('disabled', true);
		var formData = {
        'thaotac' : '1',
		'password1'              : $('input[name=passcu]').val(),
		'captcha'              : $('input[name=captcha]').val(),
		'captcha2'              : $('input[name=captcha2]').val(),
		'captcha3'              : $('input[name=captcha3]').val(),
		'password2'              : $('input[name=passmoi]').val()
		};
		$.post("/doimatkhau", formData,
			function (data) {
			    if(data.status == '1'){
				swal({
					title : "Notify",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
				$('#bentancoder').html('Change Password');
			$('#bentancoder').prop('disabled', false);
			    }else{
			    // window.location="/";   
			     swal({
					title : "Notify",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
			 				$('#bentancoder').html('Change Password');
			$('#bentancoder').prop('disabled', false);
			    }
		}, "json");
	});
});

</script>   
                                
                              <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <img src="/anh/photo1.jpg" alt="" class="avatar-photo">
                        </div>
                        <h5 class="text-center h5 mb-0"><?=$username;?></h5>
                        <p class="text-center text-muted font-14"><?=typeRank($user['level']);?> </p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Personal Information</h5>
                            <ul>
                                
                                <li>
                                    <span>ID:</span>
                                    <?=$id;?>                            </li>
                                <li>
                                    <span>Email address:</span>
                                    <a href="mailto:<?=$user['email'];?>"><?=$user['email'];?></a>                                </li>
                                
                                <li>
                                    <span>Username:</span>
                                    <?=$username;?>                               </li>
                                
                                <li>
                                    <span>Balance:</span>
                                    Rp. <?=number_format($user['money']);?>                         </li>
                                
                                <li>
                                    <span>Account registration date:</span>
                                    <?=$user['time'];?>                             </li>
                                    <li>
                                    <span>Registered IP:</span>
                                    <?=$user['ip'];?>                             </li>
                                    
                                    <li>
                                     <span>Api key:</span>
                                    <b style="color: red;" id="copyAPI"><?=$user['api_key'];?></b>   
                                    <a class="copy"
                            data-clipboard-target="#copyAPI"><i class="fa fa-copy"></i></a>                          </li>
                                    </li>
                            </ul>
                        </div>

                    </div>
                </div>
                 <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Change password</a>
                                    </li>
                                </ul>
                                 <div class="tab-content">
                                    <!-- Setting Tab start -->
                                     <div class="tab-pane fade show active" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Enter information to change new password</h4>
                                                        <div class="form-group">
                                                            <label>Current password</label>
                                                            <input class="form-control form-control-lg" name="passcu"
                                                                type="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>A new password</label>
                                                            <input class="form-control form-control-lg" name="passmoi"
                                                                type="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm captcha</label>
                                                            <?php
                        	$min_number = 1;
                        	$max_number = 15;
                        
                        	$random_number1 = mt_rand($min_number, $max_number);
                        	$random_number2 = mt_rand($min_number, $max_number);
                        ?>
                        <input type="text" class="form-control form-control-lg" placeholder="<?php echo $random_number1 . ' + ' . $random_number2 . ' = ?';?>" name="captcha"/>
                        <input name="captcha2" type="hidden" value="<?php echo $random_number1; ?>" />
		                <input name="captcha3" type="hidden" value="<?php echo $random_number2; ?>" />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="button" id="bentancoder"
                                                                class="btn btn-primary" value="Change your password now">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
       

	</div>
	</div>

<?php include '../config/foot.php'; ?>                    