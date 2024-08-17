<?php
include('../db.php');
 if(isset($_GET['Delete_Payment'])){
     $payment_Id = $_GET['Delete_Payment'];
     echo $product_id;
     $delete_query = "DELETE FROM `payment_table` WHERE `payment_id` = $payment_Id";
            $result = mysqli_query($conn,$delete_query);

            echo "<script>alert('Your Payment is deleted ');
            window.location.href='index.php?All_payments'; </script>";
 }
?>