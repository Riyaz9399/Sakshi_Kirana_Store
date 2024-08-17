<?php
include("../db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
    .images{
        height:100px;
        width:100px;
    }
    </style>
</head>
<body>
    <h1 class="text-center text-success">All products</h1>
    <div class=" container text-center table-responsive">
    <table class="table table-dark table-striped  table-bordered table-hover mb-7 mt-4">
        <tr>
        <th>product_Id</th>
        <th>product_title</th>
        <th>Image_1	</th>
        <th>product_price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php 
        $number = 0;
        $SearchQuery = "Select * FROM `products`";
        $result = mysqli_query($conn,$SearchQuery);
        while( $rowdata = mysqli_fetch_assoc($result)){
            $product_Id = $rowdata['product_id'];
            $product_title = $rowdata['product_title'];
            $Image_1 = $rowdata['Image_1'];
            $product_price = $rowdata['product_price'];
            $status = $rowdata['Status'];
            $number++;
             echo "<tr class='text-center'>
            <td>$number</td>
            <td>$product_title</td>
            <td> <img class='images' src='products_images/$Image_1' alt='product image'/></td>
            <td>$product_price</td>
            <td>$status</td>
           <td><a href='index.php?Edit_Product=$product_Id' class='text-light'><i class='bi bi-pencil-square'></i></a></td>
            <td><a href='index.php?Delete_Product=$product_Id' class='text-light'><i class='bi bi-trash'></i></a></td>
        </tr>";
        }
       
        // ?>
        
    </table>
    </div>
</body>
</html>