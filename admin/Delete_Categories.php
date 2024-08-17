<?php
include('../db.php');
 if(isset($_GET['Delete_Categories'])){
     $categories_id = $_GET['Delete_Categories'];
     echo $product_id;
     $delete_query = "DELETE FROM `categories` WHERE `categories_ID` = $categories_id";
            $result = mysqli_query($conn,$delete_query);

            echo "<script>alert('Your Categorie is deleted ');
            window.location.href='index.php?View_categories'; </script>";
 }
?>