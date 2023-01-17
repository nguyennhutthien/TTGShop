<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=".admin/css/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./admin/img/TTG shop.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
     <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <?php 
        include ('connect.php');
        $category=mysqli_query($connect,"select * from danhmuc");
        $brand=mysqli_query($connect,"select * from thuonghieu");
    ?>
</head>
<body>
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img src="./admin/img/TTG shop.png" alt="" style="width:70px;height:70px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <?php 
                            if($category){
                                echo '<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sản phẩm</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                while($rowcat=mysqli_fetch_assoc($category)){
                                    echo '<li><a class="dropdown-item" href="productcat.php?id='.$rowcat['id'].'">'.$rowcat['name'].'</a></li>';
                                }
                                echo    '</ul></li>';
                            }
                            if($brand){
                                echo '<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thương hiệu</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                while($rowbrand=mysqli_fetch_assoc($brand)){
                                    echo '<li><a class="dropdown-item" href="productbrand.php?id='.$rowbrand['id'].'"><img src="./admin/img/'.$rowbrand['image'].'" alt="" style="height:20px;width:20px">&emsp;'.$rowbrand['name'].'</a></li>';
                                }
                                echo    '</ul></li>';
                            }
                        ?>
                    </ul>
                    <form class="d-flex" action="searchproduct.php" method="get">
                        <input type="text" name="productname" class="form-control" placeholder="Nhập sản phẩm cần tìm...">&ensp;
                        <button class="btn btn-outline-dark" type="submit" name="search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
</body>
</html>