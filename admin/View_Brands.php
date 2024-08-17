<?php
include("../db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <style>
    .images{
        height:100px;
        width:100px;
    }
    </style>
</head>
<body>
    <h1 class="text-center text-success">All Brands</h1>
    <div class=" container text-center table-responsive">
    <table class="table table-dark table-striped  table-bordered table-hover mb-7 mt-4">
        <tr>
        <th>Serial No.</th>
        <th>Brands title</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php 
        $number = 0;
        $SearchQuery = "Select * FROM `brands`";
        $result = mysqli_query($conn,$SearchQuery);
        while( $rowdata = mysqli_fetch_assoc($result)){
            $Brands_ID = $rowdata['brands_Id'];
            $Brands_Title = $rowdata['brand_title'];
            $number++;
             echo "<tr class='text-center'>
            <td>$number</td>
            <td>$Brands_Title</td>
           <td><a href='index.php?Edit_Brands=$Brands_ID' class='text-light'><i class='bi bi-pencil-square'></i></a></td>
            <td><a href='index.php?Delete_Brands=$Brands_ID' class='text-light'><i class='bi bi-trash'></i></a></td>
        </tr>";
        }
       
        // ?>
        
    </table>
    </div>
</body>
</html>