<?php 
    include('connect.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $delcat=mysqli_query($connect,"delete from sanpham where id='$id'");
        header('location:product.php');
    }
?>