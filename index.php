<?php require_once('config/head.php'); ?>
<title>Home | <?=$tenweb;?></title>
<?php require_once('config/nav.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
 <div class="main-container">
		<div class="pd-ltr-20">
		    
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="https://telegra.ph/file/0738c99808f34e7bd2668.jpg" alt="Neffz">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome to <div class="weight-600 font-30 text-blue"><?=$_SERVER['SERVER_NAME'];?>!</div>
						</h4>
						<p class="font-18 max-width-600"><?=$bentancoder['mo_ta'];?></p>
				</div>
            </div>
        </div>
       
<div class="row">
 
<div class="col-lg-6 col-md-6 mb-20">
<div class="card-box height-100-p pd-20 min-height-200px">
<div class="d-flex justify-content-between pb-10">
<div class="h5 mb-0">Contact Admin Via</div>
<div class="dropdown">
</div>
</div>
<div class="user-list">
<ul>
<li class="d-flex align-items-center justify-content-between">
<div class="name-avatar d-flex align-items-center pr-2">
<div class="avatar mr-2 flex-shrink-0">
<img src="https://telegra.ph/file/10e2bc81e7057059fb09f.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="NEFTZY">
</div>
<div class="txt">
<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
<div class="font-14 weight-600">Telegram</div>
<div class="font-12 weight-500" data-color="#b2b1b6">Telegram</div>
</div>
</div>
<div class="cta flex-shrink-0">
<a href="//t.me/<?=$bentancoder['telegram'];?>" class="btn btn-sm btn-outline-primary">Chat</a>
</div>
</li>
<li class="d-flex align-items-center justify-content-between">
<div class="name-avatar d-flex align-items-center pr-2">
<div class="avatar mr-2 flex-shrink-0">
<img src="https://telegra.ph/file/e903302008fb475df496f.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="NEFFTZY">
</div>
<div class="txt">
<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
<div class="font-14 weight-600">Whatsapp</div>
<div class="font-12 weight-500" data-color="#b2b1b6">Whatsapp</div>
</div>
</div>
<div class="cta flex-shrink-0">
<a href="//wa.me/<?=$bentancoder['whatsapp'];?>" class="btn btn-sm btn-outline-primary">Chat</a>
</div>
</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-6 col-md-15 mb-20">
<div class="card-box height-100-p pd-20 min-height-200px">
<div class="max-width-300 mx-auto">
<img src="https://jimathosting.com/wp-content/uploads/2019/09/jimathosting-slider-image9.png.webp" alt="">
</div>
<div class="text-center">
<div class="h5 mb-1">Hosting</div>
<div class="font-14 weight-500 max-width-200 mx-auto pb-20 text-start" data-color="#a6a6a7">
Cpanel hosting suitable for personal web, phishing, store!
</div>
<a href="/host" class="btn btn-primary btn-lg">Order hosting</a>
</div>
</div>
</div>
</div>

<?php if(!isset($_SESSION['username'])){ ?>
   <!--Thông báo-->
        <div class="modal fade" id="bentancodermodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-blue">Notify</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
               <?=$bentancoder['thongbao'];?>
               </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $("#bentancodermodal").modal('show');
        });
        </script>			
<?php } ?> 

<?php require_once('config/foot.php'); ?>