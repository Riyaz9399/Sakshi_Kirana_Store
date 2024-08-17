<?php
include("../db.php");
require_once("../CommonFunction.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="style.css"/>
</head>

<body>


    <?php
        $username = $_SESSION['username'];
        $get_user = "SELECT * FROM `registration` Where `Username` = '$username'";
        $result = mysqli_query($conn,$get_user);
        $rowdata = mysqli_fetch_assoc($result);
        $userId = $rowdata['id'];
        // echo $userId;
    ?>
        

  <div class=" table-responsive">
      <table class=" table table-striped table-dark table-bordered table-hover ">
          <tr>
              <th>Serial no.</th>
              <th>Order Number</th>
              <th>Amount Due</th>
              <th>Total product</th>
              <th>Invoice Number</th>
              <th>Date</th>
              <th>Completed/Incomlpet</th>
              <th>Status</th>
          </tr>

          <?php
            $Get_orders_Table = "SELECT * FROM `order_table` WHERE `User_ID` = '$userId'";
            $result = mysqli_query($conn,$Get_orders_Table);
            $number = 1;
            while($row_orderdata = mysqli_fetch_array($result)){
                $order_Id  = $row_orderdata['Order_id'];
                $amount_due = $row_orderdata['amount_due'];
                $total_produts = $row_orderdata['Total_products'];
                $Invoice_number = $row_orderdata['invoice_number'];
                $date = $row_orderdata['Order_date'];
                $status = $row_orderdata['Order_status'];
                if($status == 'pending'){
                   $status = 'Incomplete'; 
                }
                else{
                    $status = 'Complete';
                }
                echo "<tr class='text-center'>
              <td>$number</td>
              <td> $order_Id </td> 
              <td>$amount_due</td>
              <td>$total_produts</td>
              <td> $Invoice_number</td>
              <td>$date</td>
              <td>$status</td>";
              if($status=='Complete'){
                echo "<td><a class='text-center fst-italic text-light' >Paid</a></td>
                </tr>";
              }else{
                // echo " <td><a href='confirm_payment.php?order_id=$order_Id' class='text-center fst-italic text-light' >Confirm Payment</a></td>
                // </tr>"
                 echo " <td><a href='../razorpay-sample-project/success.php?order_id=$order_Id' class='text-center fst-italic text-light' >Confirm Payment</a></td>
                </tr>";
              }
                $number++;
            }
          ?>
          <tr>
              
             
              
            </tr>         
     </table>
  </div>       
            
     

        


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>