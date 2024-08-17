<?php
include("../db.php");
require_once("../CommonFunction.php");
session_start();

if(isset($_GET['user_id'])){
    $get_id = $_GET['user_id'];
   
}

//  Getting total items and the total price of the items

    $get_ip_address =  getIPAddress();
    $total_price = 0;
    $cart_query_price = "SELECT * FROM `carts_detail` WHERE  `Ip_Address` = '$get_ip_address' ";
    $result = mysqli_query($conn,$cart_query_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    $count_row = mysqli_num_rows($result);
    while($row_price = mysqli_fetch_array($result )){
         $product_ID = $row_price['product_id'];
         $select_product = "SELECT * FROM `products` WHERE  `product_id` = '$product_ID' ";
         $product_result = mysqli_query($conn , $select_product);
            
         while($row_data_product = mysqli_fetch_array($product_result)){
            $product_price = array($row_data_product['product_price']);
            $sum_of_array_price = array_sum($product_price);
            $total_price +=  $sum_of_array_price;
         }


    }

    // Getting Quentity from Cart_details

    $get_cart = "SELECT * FROM `carts_detail`";
    $result = mysqli_query($conn, $get_cart);
    $get_item_quantity = mysqli_fetch_array( $result);
    $quantity = $get_item_quantity['quantity'];
    if( $quantity  == 0){
        $quantity = 1;
         $subtotal = $total_price;
    }else{
        $quantity  = $quantity ;
        $subtotal = $total_price *   (int)$quantity ;
    }

    // insert Order in the order_tables
    $insert_orders = "INSERT INTO `order_table`( `User_ID`, `amount_due`, `invoice_number`, `Total_products`, `Order_date`, `Order_status`) VALUES ('$get_id','$subtotal','$invoice_number','$quantity',NOW(),'$status') ";
    $update_orders_table = mysqli_query($conn,$insert_orders);
    if($update_orders_table){
        echo "<script>alert('The orders is placed please confirm yor payment !')
        window.location.href='profile.php?my_orders'</script>";
    }
    else{
        echo "<script>alert('The orders Items are not...updated..!')</script>";
    }

    // insert Order_tabels data to orders_pending table
    $insert_orders_data_topending = "INSERT INTO `order_pending`( `User_ID`, `invoice_number`, `Product_id`, `Quantity`, `Order_Status`) VALUES ('$get_id','$invoice_number','$product_ID',$quantity,' $status')";
    $update_orders_pending = mysqli_query($conn,$insert_orders_data_topending );
    

    // delete items from carts
    $empty_cart = "DELETE FROM `carts_detail` WHERE `Ip_Address` =  '$get_ip_address'";
    $delete_cart = mysqli_query($conn , $empty_cart);
    
?>


