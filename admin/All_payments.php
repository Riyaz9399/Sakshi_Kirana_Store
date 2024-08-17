<?php
include("../db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .devider{
        height:100px;
        width:100px;
    }
    </style>
</head>
<body>
    <h1 class="text-center text-success">All Payments</h1>
    <div class="container text-center table-responsive">
    <?php 
    $number = 0;
    $SearchQuery = "SELECT * FROM `payment_table`";
    $result = mysqli_query($conn, $SearchQuery);
    if(mysqli_num_rows($result) > 0) {
    ?>
    <table class="table table-dark table-striped table-bordered table-hover mb-7 mt-4">
        <tr>
        <th>Serial No.</th>
        <th>Payment ID</th>
        <th>Order ID</th>
        <th>Invoice Number</th>
        <th>Amount Due</th>
        <th>Payment Mode</th>
        <th>Date</th>
        <th>Delete</th>
        </tr>
        <?php 
        while($rowdata = mysqli_fetch_assoc($result)){
            $Payment_ID = $rowdata['payment_id'];
            $Order_ID = $rowdata['order_id'];
            $Invoice_Number = $rowdata['invoice_number'];
            $Amount_Due = $rowdata['amount_due'];
            $Payment_Mode = $rowdata['payment_mode'];
            $Date = $rowdata['Date'];
            $number++;
            echo "<tr class='text-center'>
                <td>$number</td>
                <td>$Payment_ID</td>
                <td>$Order_ID</td>
                <td>$Invoice_Number</td>
                <td>$Amount_Due</td>
                <td>$Payment_Mode</td>
                <td>$Date</td>
                <td><a href='index.php?Delete_Payment=$Payment_ID' class='text-light'><i class='bi bi-trash'></i></a></td>
            </tr>";
        }
        ?>
    </table>
    <?php 
    } else {
        echo "<h1 class='text-center text-danger font-weight-bold'>No payments yet</h1>";
    }
    ?>
    </div>

    <div class="devider"></div>
</body>
</html>
