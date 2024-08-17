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
        <th>Serial No.</th>
        <th>Categories title</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php 
        $number = 0;
        $SearchQuery = "Select * FROM `categories`";
        $result = mysqli_query($conn,$SearchQuery);
        while( $rowdata = mysqli_fetch_assoc($result)){
            $categories_ID = $rowdata['categories_ID'];
            $catedories_title = $rowdata['catedories_title'];
            $number++;
             echo "<tr class='text-center'>
            <td>$number</td>
            <td>$catedories_title</td>
           <td><a href='index.php?Edit_Categories=$categories_ID' class='text-light'><i class='bi bi-pencil-square'></i></a></td>
            <td><a href='index.php?Delete_Categories=$categories_ID' class='text-light'><i class='bi bi-trash'></i></a></td>
        </tr>";
        }
       
        // ?>
        
    </table>
    </div>
</body>
</html>