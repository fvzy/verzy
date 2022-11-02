<?php include('../config/config.php');?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng Nhập Quản Trị Web</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Đăng Nhập ADMIN</b></a>
  </div>


<?php

if (isset($_POST["submit"]))
{
    $username = AntiXss($_POST['username']);
    $password = AntiXss($_POST['password']);
    
    if ($username == "" || $password =="") {
        echo '<script type="text/javascript">swal.fire("Lỗi", " Không được để trống tên đăng nhập hoặc mật khẩu", "error");
        setTimeout(function(){ location.href = "login.php" },2000);</script>';
    } else {
        $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."' AND `level` = '810'  ";
        $query = mysqli_query($ketnoi,$sql);
        $num_rows = mysqli_num_rows($query);

        if ($num_rows == 0) {
            echo '<script type="text/javascript">swal.fire("Lỗi", " Thông tin đăng nhập không chính xác !!!", "error");
            setTimeout(function(){ location.href = "" },2000);</script>';
            die();
        } else {
            
            $_SESSION['admin'] = $username;
            echo '<script type="text/javascript">swal.fire("Thành Công","Đăng Nhập Thành Công","success");
                setTimeout(function(){ location.href = "index.php" },10);</script>';
        }
    }
}
?> 



  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng Nhập Bằng Tài Khoản Admin</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">ĐĂNG NHẬP</button>
          
      </form>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>