<?php
include('../db.php');
 if(isset($_GET['Delete_Brands'])){
     $Brand_id = $_GET['Delete_Brands'];
     $delete_query = "DELETE FROM `brands` WHERE `brands_Id` = $Brand_id";
            $result = mysqli_query($conn,$delete_query);

            echo "<script>alert('Your Brand is deleted ');
            window.location.href='index.php?View_categories'; </script>";
 }
?>