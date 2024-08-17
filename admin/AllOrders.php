<?php
include("../db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center text-success">All Orders</h1>
    <div class="container text-center table-responsive">
    <?php 
    $number = 0;
    $SearchQuery = "SELECT * FROM `order_table`";
    $result = mysqli_query($conn, $SearchQuery);
    if(mysqli_num_rows($result) > 0) {
    ?>
    <table class="table table-dark table-striped table-bordered table-hover mb-7 mt-4">
        <tr>
        <th>Serial No.</th>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Amount Due</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Order Status</th>
        <th>Delete</th>
        </tr>
        <?php 
        while($rowdata = mysqli_fetch_assoc($result)){
            $Order_ID = $rowdata['Order_id'];
            $User_ID = $rowdata['User_ID'];
            $Amount_Due = $rowdata['amount_due'];
            $Invoice_Number = $rowdata['invoice_number'];
            $Total_Products = $rowdata['Total_products'];
            $Order_Date = $rowdata['Order_date'];
            $Order_Status = $rowdata['Order_status'];
            $number++;
            echo "<tr class='text-center'>
                <td>$number</td>
                <td>$Order_ID</td>
                <td>$User_ID</td>
                <td>$Amount_Due</td>
                <td>$Invoice_Number</td>
                <td>$Total_Products</td>
                <td>$Order_Date</td>
                <td>$Order_Status</td>
                <td><a href='index.php?Delete_Order=$Order_ID' class='text-light'><i class='bi bi-trash'></i></a></td>
            </tr>";
        }
        ?>
    </table>
    <?php 
    } else {
        echo "<h1 class='text-center text-danger text-bold'> No orders yet</h1>";
    }
    ?>

    
    </div>
</body>
</html>
