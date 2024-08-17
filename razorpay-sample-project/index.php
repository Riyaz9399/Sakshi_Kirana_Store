<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the Razorpay PHP library
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

$api_key = 'rzp_test_Y2wy8t1wD1AFaA';
$api_secret = 'zSqRMpIa2ljBBpkieFYGmfLa';

$api = new Api($api_key, $api_secret);

include("../db.php");

if (isset($_GET["order_id"])) {
    $order_id = $_GET['order_id'];
    // Select data from database
    $select_data = "SELECT * FROM `order_table` WHERE `Order_id` = $order_id";
    $result = mysqli_query($conn, $select_data);
    $data = mysqli_fetch_assoc($result);
    $Due_amount = $data['amount_due'];
    $invoice_number = $data['invoice_number'];
    

    // Create an order in Razorpay
    
    $razorpay_order = $api->order->create([
        'amount' => $Due_amount * (70) , 
        'currency' => 'INR',
        'receipt' => 'order_receipt_' . $order_id
    ]);
    $razorpay_order_id = $razorpay_order->id;

    // Set your callback URL
    $callback_url = "http://sakshi-kirana-store.infinityfreeapp.com/razorpay-sample-project/success.php?order_id=$order_id";

    // Include Razorpay Checkout.js library
    echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';

    // Create a payment button with Checkout.js
    echo '<div class="container">
            <button onclick="startPayment()" class="payment-button">Pay with Razorpay</button>
        </div>';

    // Add a script to handle the payment
    echo '<script>
            function startPayment() {
                var options = {
                    key: "' . $api_key . '",
                    amount: ' . $razorpay_order->amount . ',
                    currency: "' . $razorpay_order->currency . '",
                    name: "Sakshi Kirana Store",
                    description: "Payment for your order",
                    image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
                    order_id: "' . $razorpay_order_id . '",
                    theme:
                    {
                        "color": "#738276"
                    },
                    callback_url: "' . $callback_url . '"
                };
                var rzp = new Razorpay(options);
                rzp.open();
            }
        </script>';
}
?>

<style>
body {
    font-family: Arial, sans-serif;
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
}

.payment-button {
    background-color: #5469d4;
    border: none;
    color: white;
    padding: 15px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 2px;
    cursor: pointer;
    border-radius: 5
}