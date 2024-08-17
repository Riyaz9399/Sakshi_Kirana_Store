<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="..\style.css"/>
</head>
<style>
    
    .devider{
        height:100px;
        width:100vw;
    } 
    
</style>
<body>

    <div class="container-fluid p-0 m-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img class="img-logo" src="../icons/logo.png" alt="Logo">
                <div class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">Welcome guest</a>
                    </li>
                </div>
            </div>
        </nav>



        <!--  second Child -->
          <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
          </div>

          <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-2 ">
                <div class="button text-center ">
                    <button class="mx-2 my-2"><a href="index.php?InsertProduct" class="nav-link text-light bg-dark my-2 mx-2 p-2">insert products </a></button>
                    
                    <button class="mx-2 my-2"><a href="index.php?View_products" class="nav-link text-light bg-dark my-2 mx-2 p-2"> View Products</a></button>
                    
                    <button class="mx-2 my-2"><a href="index.php?insert_categories" class="nav-link text-light bg-dark my-2 mx-2 p-2">insert Categories</a></button>
                    
                    <button class="mx-2 my-2"><a href="index.php?View_categories" class="nav-link text-light bg-dark my-2 mx-2 p-2">view Categories</a></button>
                    
                    <button class="mx-2 my-2"><a href="index.php?insert_Brands" class="nav-link text-light bg-dark my-2 mx-2 p-2">insert Brands</a></button>
                    
                    <button class="mx-2 my-2"><a href="index.php?View_Brands" class="nav-link text-light bg-dark my-2 mx-2 p-2">View Brands</a></button>
                    
                    <button class="mx-2 my-2"><a href="index.php?All_orders" class="nav-link text-light bg-dark my-2 mx-2 p-2">All orders </a></button>
  
                    <button class="mx-2 my-2"><a href="index.php?All_payments" class="nav-link text-light bg-dark my-2 mx-2 p-2">All payment</a></button>
 
                    <button class="mx-2 my-2"><a href="index.php?All_Users" class="nav-link text-light bg-dark my-2 mx-2 p-2">list User</a></button>
    
                    <button class="mx-2 my-2"><a href="index.php?Logout" class="nav-link text-light bg-dark my-2 mx-2 p-2">log Out</a></button>
                </div>
            </div>
        </div>

        <hr>
        <!-- fourth Child -->
        <div>
         <?php
          if(isset($_GET["insert_categories"])){
            include("insert_categories.php");
          }
          if(isset($_GET["insert_Brands"])){
            include("insert_brands.php");
          }          
          if(isset($_GET['View_products'])){
            include('View_products.php');
          }
          if(isset($_GET['Edit_Product'])){
              include('Edit_Product.php');
          }
          if(isset($_GET['InsertProduct'])){
              include('InsertProduct.php');
          }
          if(isset($_GET['Delete_Product'])){
                include('Delete_Product.php');
          }
          if(isset($_GET['View_categories'])){
              include('View_categories.php');
          }
          if(isset($_GET['Edit_Categories'])){
              include('Edit_categories.php');
          }
          if(isset($_GET['Delete_Categories'])){
              include('Delete_Categories.php');
          }if(isset($_GET['View_Brands'])){
              include('View_Brands.php');
          }
          if(isset($_GET['Edit_Brands'])){
              include('Edit_Brands.php');
          }
          if(isset($_GET['Delete_Brands'])){
              include('Delete_Brands.php');
          }
          if(isset($_GET['All_orders'])){
              include('AllOrders.php');
          }
          if(isset($_GET['Delete_Order'])){
              include('Delete_Order.php');
          }
          if(isset($_GET['All_payments'])){
              include('All_payments.php');
          }
          if(isset($_GET['Delete_Payment'])){
              include('Delete_Payment.php');
          }
          if(isset($_GET['All_Users'])){
              include('All_Users.php');
          }
         
         ?>
         </div>


        <div class="devider"></div>

        <!-- Fifth Child -->
        <img class="admin-image" src="../icons/sakshi-kirana-store.jpg">



    </div>
    


    <div class="devider"></div>
    
    <div  class="container-fluid p-0  admin-footer bg-dark"> 
                    <p class="text-center text-light" >"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."
                   </p>
    </div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>