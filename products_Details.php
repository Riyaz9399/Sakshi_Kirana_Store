<?php
include("db.php");
include("CommonFunction.php");
session_start();
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
    <style>
      .nav-img{
        height:150px;
        width: 150px;
        object-fit: fill;
      }
    </style>
</head>
<body>
     <!-- go back to main -->
    <div class="container-fluid p-0">
            <!-- The first child  -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <img class="img-logo" src="../icons/logo.png">
                 <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                 </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                       <li class="nav-item">
                         <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light " href="display_all.php">Products</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="#">Register</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="#">Contact</a>
                       </li>
                       <li class="nav-item">
                       <a class="nav-link text-light" href="#"> Carts<i class="bi bi-cart4"></i><sup> <?php number_of_cart_items();?></sup></a>

                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="#">  Total Price 100/-</a>
                       </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                      <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                       <input  class="btn btn-outline-light" type="submit" value="search" name="search_data_product">

                    </form>
               </div>
            </div>
        </nav>


        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
            </li>
            <?php
         
                   if(!isset($_SESSION['username'])){
                        echo '<li class="nav-item">
                <a class="nav-link" href="./user_Area/user_login.php">LogIn</a>
            </li>';
                   }else{
                    echo '<li class="nav-item">
                    <a class="nav-link" href="./user_Area/user_logOut.php">LogOut</a>
                </li>';
                   }
                   ?>
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="bg-dark">
                <h3 class="text-center text-light ">Sakshi Kirana Store</h3>
                <p class="text-center text-light">We listen, we care, Personalized support tailored to your needs</p>
        </div>


  <div class=" table-responsive">
      <table class=" table table-striped  table-bordered table-hover ">
          <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Product Description</th>
              <th>Product Image</th>
              <th>Product price</th>
              <th>Status</th>
              
          </tr>
          <?php
          if(isset($_GET['product_id'])){
            $product_id = $_GET["product_id"];
            $select = "SELECT * FROM `products` WHERE `product_id` = '$product_id' ";
            $result = mysqli_query($conn,$select);
            $rowdata = mysqli_fetch_assoc($result);
            $ID = $rowdata['product_id'];
            $name = $rowdata['product_title'];
            $Description = $rowdata['product_description'];
            $image = $rowdata['Image_1'];
            $price = $rowdata['product_price'];
            $status = $rowdata['Status'];
           echo "<tr> 
             <td>$ID </td>
            <td>$name</td>
            <td>$Description </td>
            <td><a class='nav-link ' href='#'><img class='nav-img' src='./admin/products_images/$image'/></a></td>
            <td>$price</td>
            <td>$status</td>
            </tr>";
          }
          
          ?>
          <!-- <tr>
              <td>{$id}</td>
              <td>{$product['name']}</td>
              <td>{$product['price']}</td>
              <td>{$product['brand']}</td>
              <td>{$product['rating']}</td>
              <td>{$product['manufacture_date']}</td>
              <td>{$product['expiry_date']}</td>
              <td>products_details();</a></td>
            </tr>          -->
     </table>
  </div>       
            
     

        <!--  last child -->
        <div class="container-fluid p-0 bg-dark footer text-dark text-center">
    <p class="text-center text-light">"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."</p>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>