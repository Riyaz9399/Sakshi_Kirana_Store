<?php
include('../db.php');
 if(isset($_GET['Delete_Order'])){
     $order_Id = $_GET['Delete_Order'];
     echo $product_id;
     $delete_query = "DELETE FROM `order_table` WHERE `Order_id` = $order_Id";
            $result = mysqli_query($conn,$delete_query);

            echo "<script>alert('Your Order is deleted ');
            window.location.href='index.php?All_orders'; </script>";
 }
?>