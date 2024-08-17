<?php
include("../db.php");
include("../CommonFunction.php");
session_start();
if(isset($_GET["order_id"])){
   $order_id = $_GET['order_id'];
    /*Select data from database */
    $select_data = "SELECT * FROM `order_table` WHERE `Order_id` = $order_id";
    $result = mysqli_query($conn,$select_data);
    $data = mysqli_fetch_assoc($result);
    $Due_amount = $data['amount_due'];
    $invoice_number = $data['invoice_number'];
}

if(isset($_POST['confirm_Payment'])){
 $pay_invoice_number = $_POST['invoice_number'];
 $pay_due_amount = $_POST['amount'];
 $pay_selected_Pay_method = $_POST['payment-mode'];
 $insert_payment_details = "INSERT INTO `payment_table`(`order_id`, `invoice_number`, `amount_due`, `payment_mode`, `Date`) VALUES ('$order_id','$pay_invoice_number','$pay_due_amount','$pay_selected_Pay_method',NOW())";
 $result = mysqli_query($conn,$insert_payment_details);
 if($result){
    $update = "UPDATE `order_table` SET  `Order_status`= 'Complete' WHERE `order_id` = '$order_id'";
    $update_result = mysqli_query($conn,$update);
    echo "<script>window.location.href='../index.php'</script>";
 }else{
     echo "<script>alert('The data is not safed'); </script>";
 }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }
        .icon {
            color: #4caf50;
            font-size: 60px;
            margin-bottom: 20px;
        }
        h1 {
            color: #4caf50;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        .button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .button:hover {
            background-color: #45a049;
        }
        .form{
            display:flex;
            justify-content:center;
            padding:10px;
            align-items:center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your transaction was successful.</p>
        <div class="form">
         <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <label for="invoice_number" class="text-light mb-2">your Invoice Number</label>
                <input type="text" class="form-control " name="invoice_number" value="<?php echo $invoice_number?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
            <label for="amount" class="text-light mb-2"> payment Amount</label>
                <input type="text" class="form-control " name="amount" value="<?php echo $Due_amount ?>"> 
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
            <label for="amount" class="text-light mb-2">your payment method is </label>
            <select name="payment-mode" class="form-select">
                <option>Rozerpay</option>
            </select>             
            </div>
            <input type="submit" class="button text-light bg-success btn  py-2 px-3" value="Back to home" name="confirm_Payment">
        </form>
        </div>
                     

       
        
    </div>
    
</body>
</html>







