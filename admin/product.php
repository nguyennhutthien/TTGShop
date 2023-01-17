<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách sản phẩm</title>
  <style>
    img{
        height: 70px;
        width: 70px;
    }
    .content{
    text-overflow: ellipsis;
    overflow: scroll;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    display: -webkit-box;
}
  </style>
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
            <h1 class="m-0">Danh sách sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div style="margin-left: 10px; margin-right:20px">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Thông số kỹ thuật | Mô tả</th>
            <th>Thương hiệu</th>
            <th>Danh mục</th>
            <th  style="width:100px">Sửa | Xoá</th>
        </tr>
    <?php 
          $data=mysqli_query($connect,'SELECT sanpham.id,sanpham.name,sanpham.image,sanpham.price,sanpham.thongso,sanpham.description,sanpham.luotmua,sanpham.luotxem,thuonghieu.name as thuonghieu,danhmuc.name as danhmuc FROM sanpham,thuonghieu,danhmuc WHERE sanpham.mathuonghieu=thuonghieu.id and sanpham.madanhmuc=danhmuc.id limit 10');
          while($row=mysqli_fetch_assoc($data)){
              echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td><img src="./img/'.$row['image'].'" alt=""></td>';
                $price=number_format($row['price'], 0, ',', '.') . " vnđ";
                echo '<td>'.$price.'</td>';
                echo '<td class="content">'.$row['thongso'].'</td>';
                echo '<td class="content">'.$row['description'].'</td>';
                echo '<td>'.$row['thuonghieu'].'</td>';
                echo '<td>'.$row['danhmuc'].'</td>';
                echo '<td><a href="updateproduct.php?id='.$row['id'].'" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>&ensp;<a href="delproduct.php?id='.$row['id'].'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>';
                echo '</tr>';
          }
    ?>
    </table>
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
