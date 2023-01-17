<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Product details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="./admin/img/TTG shop.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php 
            include ('header.php');
            include ('connect.php');
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $product=mysqli_query($connect,"select * from sanpham where id='$id'");
            } 
        ?>
        <!-- Product section-->
        <section class="py-5">
            <p style="font-size: 30px;font-weight:bold;margin-left:30px">Chi tiết sản phẩm</p>
            <?php 
                while($row=mysqli_fetch_array($product)){
                    $name=$row['name'];
                    $brand=$row['mathuonghieu'];
                    $category=$row['madanhmuc'];
                    echo '<div class="container px-4 px-lg-5 my-5">
                            <div class="row gx-4 gx-lg-5 align-items-center">
                                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./admin/img/'.$row['image'].'" alt="..." /></div>
                                <div class="col-md-6">
                                    <h1 class="display-5 fw-bolder">'.$row['name'].'</h1>
                                    <div class="fs-5 mb-5">
                                        <span>'.number_format($row['price'], 0, ',', '.') . " vnđ".'</span>
                                    </div>
                                    <p style="font-size:20px;font-weight:bold">Thông số kỹ thuật</p>
                                    <p>'.$row['thongso'].'</p>
                                    <div class="d-flex">
                                        <a href="cart.php?id='.$row['id'].'">
                                            <button class="btn btn-outline-success flex-shrink-0" type="button">
                                                <i class="bi-cart-fill me-1"></i>
                                                Mua ngay
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><br>';
                    echo '<p style="font-size: 30px;font-weight:bold;margin-left:30px">Mô tả chi tiết</p>
                    <div class="container px-4 px-lg-5 my-5" style="text-align:center">
                            <div>'.$row['description'].'</div>
                        </div>';
                }
                
            ?>
        </section>
        <!-- Related items section-->
        <?php 
            $data=mysqli_query($connect,"select * from sanpham where mathuonghieu='$brand' and madanhmuc='$category' and name!='$name' limit 4");
        ?>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Sản phẩm liên quan</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php 
                        while($row=mysqli_fetch_assoc($data)){
                            echo '<div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Product image-->
                                        <img class="card-img-top" src="./admin/img/'.$row['image'].'" alt="..." />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">'.$row['name'].'</h5>
                                                <!-- Product price-->
                                                '.number_format($row['price'], 0, ',', '.') . " vnđ".'
                                            </div>
                                        </div>
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center">
                                                <a class="btn btn-outline-primary mt-auto" href="cart.php?id='.$row['id'].'">Mua ngay</a>
                                                <a class="btn btn-outline-danger mt-auto" href="details.php?id='.$row['id'].'">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php 
            include('footer.php')
        ?>
    </body>
</html>
