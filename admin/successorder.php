<?php 
    include('connect.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $submit=mysqli_query($connect,"UPDATE `order` SET `xacnhan` = b'1', `tinhtrang` = 'Giao hàng thành công' WHERE `order`.`id` = $id");
        if($submit){
            header('location:order.php');
        }
    }
?>