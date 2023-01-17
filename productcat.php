<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TTG Shop</title>
        <link rel="icon" type="image/x-icon" href="./admin/img/TTG shop.png" />
    </head>
    <body>
        <?php 
            include ('header.php');
            if($_GET['id']){
                $id=$_GET['id'];
                $data=mysqli_query($connect,"select * from sanpham  where madanhmuc='$id'");
                $category=mysqli_query($connect,"select * from danhmuc where id='$id'");
                $brand=mysqli_query($connect,"select * from thuonghieu");
            }
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">TRỰC TIẾP GAME ECOMERCER</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Technology and more</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div style="margin-left:50px">
                <div class="col mb-5">
                    <?php 
                        while($rowbrand=mysqli_fetch_assoc($brand)){
                            echo '<a href="productbrand.php?id='.$rowbrand['id'].'"><img src="./admin/img/'.$rowbrand['image'].'" class="rounded-circle" alt="Cinque Terre" style="width:50px;height:50px"></a>&emsp;&emsp;&emsp;';
                        }
                    ?>
                </div>
            </div>
            <?php 
                while($rowcat=mysqli_fetch_assoc($category)){
                    echo '<p style="font-size: 30px;font-weight:bold;margin-left:30px">Tất cả các '. $rowcat['name'].'</p>';
                }
            ?>
            <div class="container px-4 px-lg-5 mt-5">
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
                                                '.$row['name'].'
                                                <!-- Product price-->
                                                <h5 class="fw-bolder">'.number_format($row['price'], 0, ',', '.') . " vnđ".'</h5>
                                                <p>'.$row['thongso'].'</p>
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
            include ('footer.php');
        ?>
    </body>
</html>
