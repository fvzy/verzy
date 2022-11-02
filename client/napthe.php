<?php include '../config/head.php'; ?>
<title>NẠP THẺ CÀO</title>
<?php include '../config/nav.php'; ?>
<?php
if($bentancoder['status_napthe'] == 'OFF')
{
   die('<script> if (confirm("Chức năng này đã bị admin tắt !")) {
    window.location="/";
} else {
    alert("Đã huỷ");
    window.location="?ok";
}
  </script>');
}
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
		$('#bentancoder').html('Đang kiểm tra...');
		$('#bentancoder').prop('disabled', true);
		var formData = {
        'thaotac' : '1',
		'loaithe'              : $('select[name=loaithe]').val(),
		'menhgia'              : $('select[name=menhgia]').val(),
		'seri'              : $('input[name=seri]').val(),
		'captcha'              : $('input[name=captcha]').val(),
		'captcha2'              : $('input[name=captcha2]').val(),
		'captcha3'              : $('input[name=captcha3]').val(),
		'pin'              : $('input[name=pin]').val()
		};
		$.post("/naptheajax", formData,
			function (data) {
			    if(data.status == '1'){
			swal({
					title : "Thông báo",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
				$('#bentancoder').html('<i class="fa fa-send mr-1"></i> Nạp Ngay');
			$('#bentancoder').prop('disabled', false);
			    }else{
			    // window.location="/";   
			    swal({
					title : "Thông báo",
					html: data.msg, 
					buttonsStyling: false,
                    confirmButtonClass: "btn btn-primary",
					type: data.type
				});
				$('#bentancoder').html('<i class="fa fa-send mr-1"></i> Nạp Ngay');
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
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Nạp Thẻ Cào</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Nạp Tiền</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thẻ Cào</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">NẠP THẺ</h4>
                        <p class="mb-30">Nạp tiền qua thẻ cào tự động</p>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                            role="button">Auto</a>
                    </div>
                </div>
                
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nhập seri:</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="seri" placeholder="10008987182738">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nhập mã thẻ:</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pin" placeholder="387999182734674">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Loại thẻ:</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="loaithe">
                                <option value="">Chọn loại thẻ</option>
                                 <?php
$result = mysqli_query($ketnoi,"SELECT * FROM `bentancoder_loaithe` WHERE `status` = 'ON' ORDER BY id desc limit 0, 20");
while($row = mysqli_fetch_assoc($result))
{
?>
<option value="<?=$row['value'];?>" data-price="<?=$row['ck'];?>"><?=$row['loaithe'];?>
                                    (<?=$row['ck'];?>%)</option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Mệnh giá:</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="menhgia">
                                <option value="">Chọn mệnh giá</option>
                                <option value="10000">10,000đ </option>
                        <option value="20000">20,000đ</option>
                        <option value="30000">30,000đ</option>
                        <option value="50000">50,000đ</option>
                        <option value="100000">100,000đ</option>
                        <option value="200000">200,000đ</option>
                        <option value="300000">300,000đ</option>
                        <option value="500000">500,000đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Xác nhận captcha:</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control form-control-lg" placeholder="<?php echo $random_number1 . ' + ' . $random_number2 . ' = ?';?>" name="captcha">
                        <input name="captcha2" type="hidden" value="<?php echo $random_number1; ?>" />
		                <input name="captcha3" type="hidden" value="<?php echo $random_number2; ?>" />
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" id="bentancoder" type="submit"><i class="fa fa-send mr-1"></i> Nạp Ngay</button>
                    </div>
                </form>
            </div>
            



         <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">LỊCH SỬ NẠP THẺ</h4>
                 </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                                <th>SERI</th>
                                <th>PIN</th>
                                <th>LOẠI THẺ</th>
                                <th>MỆNH GIÁ</th>
                                <th>THỰC NHẬN</th>
                                <th>THỜI GIAN</th>
                                <th>TRẠNG THÁI</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 1;
$result = $ketnoi->query("SELECT * FROM `bentancoder_napthe` WHERE `username` = '$username' ORDER BY id desc ");
while($bentancoder = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?=$i;?> <?php $i++;?></td>
                                <td><?=$bentancoder['seri'];?></td>
                                <td><?=$bentancoder['pin'];?></td>
                                <td><span class="badge badge-danger"><?=$bentancoder['loaithe'];?></span></td>
                                <td><?=number_format($bentancoder['menhgia']);?>đ</td>
                                <td><?=number_format($bentancoder['thucnhan']);?>đ</td>
                                <td><span class="badge badge-dark"><?=$bentancoder['time'];?></span></td>
                                <td><?=status($bentancoder['status']);?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Export Datatable End -->
        </div>


                                <?php require_once('../config/foot.php'); ?>