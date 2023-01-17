<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập admin</title>
  <link rel="shortcut icon" type="image/png" href="./img/logottg.png"/>
  <style>
    body{
      background-image: url("./img/hinhnen.jpg");
    }
  </style>
  <?php 
    session_reset();
  ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../css/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Đăng nhập</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Đăng nhập trang admin</p>

      <form action="login.php" method="get">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="on" value="<?php if(isset($_COOKIE['user'])){ echo $_COOKIE['user']; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="on" value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass']; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" checked>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="signin">Sign in</button>
          </div>
          <!-- /.col -->
        </div>
      </form><br>
    <?php 
      if(isset($_GET['signin'])){
        include ('connect.php');
        session_start();
        if($_GET['email']=="" && $_GET['password']==""){
          echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin</div>';
        }else{
          $email=$_GET['email'];
          $password=MD5($_GET['password']);
          $pass=$_GET['password'];
          $data=mysqli_query($connect,"SELECT * FROM `admin` WHERE tendangnhap='$email' and md5(matkhau)='$password'");
          if(mysqli_num_rows($data)>0){
            if(isset($_GET['remember'])){
              setcookie("user",$email,time() + (86400 * 30), "/");
              setcookie("pass",$pass,time() + (86400 * 30), "/");
            }
            header('location:index.php');
            $_SESSION['login']="true";
          }
          else{
            echo '<div class="alert alert-danger">Sai email hoặc mật khẩu</div>';
          }
        }
      }
    ?>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../css/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../css/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../css/dist/js/adminlte.min.js"></script>
</body>
</html>
