<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm sản phẩm</title>
  <script src="./ckeditor/ckeditor.js"></script>
  <?php 
    include ('header.php');
    include ('connect.php');
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:login.php');
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
            <h1 class="m-0">Thêm sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div style="margin-left: 10px; margin-right:20px">
    <?php 
      if(isset($_POST['add'])){
        $name=$_POST['name'];
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"./img/".$file_name);
        $price=$_POST['price'];
        $category=$_POST['category'];
        $brand=$_POST['brand'];
        $description=$_POST['description'];
        $thongso=$_POST['thongso'];
        if($name!="" && $file_name!="" && $price!="" && $description!=""){
          $data=mysqli_query($connect,"insert sanpham values('','$name','$file_name','$price','$description','$thongso','0','0','$brand','$category')");
          if($data){
              echo '<div class="alert alert-success">Thêm thành công</div>';
          }
        }
        else{
          echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin</div>';
        }
      }
    ?>
    <form action="addproduct.php" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name"><br>
        <label for="">Hình sản phẩm</label>
        <input type="file" class="form-control" name="image" accept=".png, .jpg, .ico"><br>
        <label for="">Giá</label>
        <input type="number" class="form-control" name="price"><br>
        <label for="">Danh mục:</label>
        <select name="category" id="category" class="form-control">
            <?php 
                $category=mysqli_query($connect,"select * from danhmuc");
                while($rowcategory=mysqli_fetch_assoc($category)){
                    echo '<option value="'.$rowcategory['id'].'">'.$rowcategory['name'].'</option>';
                }
            ?>
        </select><br>
        <label for="">Thương hiệu:</label>
        <select name="brand" id="brand" class="form-control">
            <?php 
                $brand=mysqli_query($connect,"select * from thuonghieu");
                while($rowbrand=mysqli_fetch_assoc($brand)){
                    echo '<option value="'.$rowbrand['id'].'">'.$rowbrand['name'].'</option>';
                }
            ?>
        </select><br>
        <label for="">Mô tả:</label>
        <textarea class="form-control" name="description" id="description"></textarea><br>
        <label for="">Thông số kỹ thuật:</label>
        <textarea class="form-control" name="thongso" id="thongso"></textarea><br>
        </div>
        <button type="submit" class="btn btn-primary" name="add">Thêm</button>
      </div>
    </form>
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
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('thongso');
    </script>
</body>
</html>
