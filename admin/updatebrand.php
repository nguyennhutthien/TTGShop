<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa thương hiệu</title>
  <?php 
    include ('header.php');
    include ('connect.php');
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:login.php');
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $dataupdate=mysqli_query($connect,"select * from thuonghieu where id='$id'");
        $rowupdate=mysqli_fetch_array($dataupdate);  
    }
    if(isset($_POST['brandname'])){
        $idupdate=$_POST['idupdate'];
        $name=$_POST['brandname'];
        $country=$_POST['quocgia'];
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"./img/".$file_name);
        if($name!="" && $country!=""){
            $data=mysqli_query($connect,"update thuonghieu set name='$name',country='$country',image='$file_name' where id='$idupdate'");
            if($data){
                header('location:brand.php');
            }
        }
      else {
        echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin</div>';
      }
    }
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./css/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="login.php" class="nav-link">Đăng xuất</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../css/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

    <?php 
        include('sidebar.php');
    ?>
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thương hiệu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Update brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div style="margin-left: 10px; margin-right:20px">
    <form action="updatebrand.php" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
        <label for="">ID</label>
        <input type="text" class="form-control" placeholder="" name="idupdate" value="<?php echo $rowupdate['id'] ?>"><br>
        <label for="">Tên thương hiệu</label>
        <input type="text" class="form-control" placeholder="Tên thương hiệu..." name="brandname" value="<?php echo $rowupdate['name'] ?>"><br>
        <label for="">Quốc gia</label>
        <input type="text" class="form-control" placeholder="Quốc gia..." name="quocgia" value="<?php echo $rowupdate['country'] ?>">
        <label for="">Logo</label>
        <input type="file" class="form-control" name="image" accept=".png, .jpg, .ico"><br>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form><br>
    </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php 
  include('footer.php')
?>
</body>
</html>
