<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/card.css">
    <link rel="icon" type="image/x-icon" href="./admin/img/TTG shop.png" />
</head>
<body>
    <?php 
        include ('connect.php');
        include ('header.php');
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $product=mysqli_query($connect,"select * from sanpham where id='$id'");
        
    ?>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <?php 
                if(isset($_POST['order'])){
                  $tenkh=$_POST['tenkh'];
                  $sdt=$_POST['sdt'];
                  $diachi=$_POST['diachi'];
                  $email=$_POST['email'];
                  $sl=$_POST['quantity'];
                  $price=$_POST['price'];
                  $order=mysqli_query($connect,"INSERT INTO `order` (`id`, `name`, `sdt`, `diachi`, `email`, `masanpham`, `sl`, `thanhtien`, `xacnhan`,`tinhtrang`) VALUES (NULL, '$tenkh', '$sdt', '$diachi', '$email', '$id', '$sl', $sl*$price, b'0','Chờ xác nhận');");
                  if($order){
                    echo '<span class="alert alert-success">Đặt hàng thành công, nhân viên sẽ sớm liên hệ với bạn để xác nhận đơn hàng! Xin cảm ơn!</span>';
                  }
                }
              ?>
      <div class="col">
        <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">
          <form class="mb-5" action="" method="post">
            <div class="row">
              <div class="col-lg-6 px-5 py-4">
                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Giỏ hàng</h3>
                <?php 
                    while($row=mysqli_fetch_assoc($product)){
                        echo '<div class="d-flex align-items-center mb-5">
                                <div class="flex-shrink-0">
                                <img src="./admin/img/'.$row['image'].'"
                                    class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                <h5 class="text-primary">'.$row['name'].'</h5>
                                <div class="d-flex align-items-center">
                                    <input type="number" class="from-control" value="'.$row['price'].'" name="price" style="display: none"/>&emsp;
                                    <div class="def-number-input number-input safari_only">Số lượng:
                                    <input class="form-control" min="1" name="quantity" value="1" type="number" id="quantity" onchange="Updatetotal()">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                            <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                              <h5 class="fw-bold mb-0">Giá sản phẩm:</h5>
                              <h5 class="fw-bold mb-0" id="total">'.number_format($row['price'], 0, ',', '.') . " vnđ".'</h5>
                            </div>
            
                          </div>';
                    }
                ?>
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Thông tin khác hàng</h3>

                  <div class="form-outline mb-5">
                  <label class="form-label" for="typeText">Tên người mua:</label>
                    <input type="text" id="typeText" class="form-control form-control-lg" value="" name="tenkh"/>
                  </div>

                  <div class="form-outline mb-5">
                  <label class="form-label" for="typeText">Số điện thoại:</label>
                    <input type="number" id="typeText" class="form-control form-control-lg" name="sdt"/>
                  </div>

                  <div class="form-outline mb-5">
                  <label class="form-label" for="typeText">Địa chỉ:</label>
                    <input type="text" id="typeText" class="form-control form-control-lg" name="diachi"/>
                  </div>

                  <div class="form-outline mb-5">
                  <label class="form-label" for="typeText">Email:</label>
                    <input type="email" id="typeText" class="form-control form-control-lg" name="email"/>
                  </div>

                  <div class="row">
                  </div>

                  <button type="submit" class="btn btn-primary btn-block btn-lg" name="order">Đặt hàng</button><br>
          </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  include('footer.php');
            }

            ?>
</body>
</html>