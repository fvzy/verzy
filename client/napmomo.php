<?php include '../config/head.php'; ?>
<title>NẠP MOMO AUTO</title>
<?php include '../config/nav.php'; ?>
<?php
if($bentancoder['status_napmomo'] == 'OFF')
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


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Nạp Qua Momo</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#">Nạp Tiền</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Momo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
     <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">NẠP TIỀN BẰNG MOMO</h4>
                        <p class="mb-30">Nạp tiền qua ví momo tự động<br>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                            role="button">Auto</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Số tài khoản:</label>
                    <div class="col-sm-12 col-md-10">
                        <b class="text-danger"
                            style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e!important;" id="copySDT"><?=$bentancoder['momo'];?></b> <a class="copy"
                            data-clipboard-target="#copySDT"><i class="fa fa-copy"></i></a>
                    </div>
                </div>
                <?php if($_SESSION['username']) { ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nội dung chuyển tiền:</label>
                    <div class="col-sm-12 col-md-10">
                        <b class="text-danger"
                            style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e!important;"
                            id="copyNoiDung">auto <?=$user['id'];?></b>
                        <a class="copy" data-clipboard-target="#copyNoiDung"><i class="fa fa-copy"></i></a>
                    </div>
                </div>
                <?php } ?>
                <?php if(!$_SESSION['username']) { ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nội dung chuyển tiền:</label>
                    <div class="col-sm-12 col-md-10">
                        <b class="text-danger"
                            style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e!important;"
                            id="copyNoiDung">Vui lòng đăng nhập</b>
                        <a class="copy" data-clipboard-target="#copyNoiDung"><i class="fa fa-copy"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>    
           <!-- Export Datatable start -->
             <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">LỊCH SỬ NẠP MOMO</h4>
                    
                 </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                                <th>MÃ GD</th>
                                <th>THỰC NHẬN</th>
                                <th>THỜI GIAN</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 1;
$cash = mysqli_query($ketnoi, "SELECT * FROM bentancoder_napmomo where `uid` = '".$user['id']."'");
if($user['level'] == '810'){
    $cash = mysqli_query($ketnoi, "SELECT * FROM bentancoder_napmomo where `code` = 'Nạp từ MOMO'");
}
if (mysqli_num_rows($cash) == 0):
?><tr><td colspan="7" class="text-center">Chưa có lượt nạp nào!</td></tr>
<?php else: while ($row = mysqli_fetch_array($cash, MYSQLI_ASSOC)):?>
                            <tr>
                                <td><?=$i;?> <?php $i++;?></td>
                                <td><?=$row['magd'];?></td>
                                <td><?=number_format($row['sotien']);?>đ</td>
                                <td><span class="badge badge-dark"><?=date("H:i:s - d/m/Y", $row['time']);?></span></td>
                            </tr>
                            <?php endwhile; endif; ?> 
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Export Datatable End -->
   

<?php require_once('../config/foot.php'); ?>