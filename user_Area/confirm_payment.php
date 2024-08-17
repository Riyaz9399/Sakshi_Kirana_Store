

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
    echo '<h2 class="text-center text-light bg-dark">Successfully payment is done</h2>';
    $update = "UPDATE `order_table` SET  `Order_status`= 'Complete' WHERE `order_id` = '$order_id'";
    $update_result = mysqli_query($conn,$update);
    echo "<script>window.location.href='profile.php'</script>";
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
    <title>Payment page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
<body class="bg-dark">
    <h1 class="text-center text-light">Confirm Payment</h1>

  <div class="container my-5">
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <label for="invoice_number" class="text-light mb-2">Invoice Number</label>
                <input type="text" class="form-control " name="invoice_number" value="<?php echo $invoice_number?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
            <label for="amount" class="text-light mb-2"> Amount</label>
                <input type="text" class="form-control " name="amount" value="<?php echo  $Due_amount ?>"> 
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
            <label for="amount" class="text-light mb-2"> Select Your Payment Mode</label>
            <select name="payment-mode" class="form-select">
                <option>Select Payment_mode</option>
                <option>UPI</option>
                <option>NET Banking</option>
                <option>Paypal</option>
                <option>Cash on delivery</option>
                <option>Rozerpay</option>
                <option>paytm</option>
                <option>pay offline</option>
                <option></option>
            </select>
               
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto ">
                <input type="submit" class=" btn btn-warning py-2 px-3" value="confirm_Payment" name="confirm_Payment"> 
            </div>

        </form>
  </div>


   



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   

</body>
</html>