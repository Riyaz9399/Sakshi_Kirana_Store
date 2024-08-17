<?php
include("../db.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Details</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="style.css"/>
</head>
<style>
    body{
        overflow-x:hidden;
    }
    .img-logo{
    height: 5%;
    width: 5%;
    border-radius: 60%;
    margin : 0 4px 0 2px;   
  }

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}


.content {
    flex: 1;
}

.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #17a2b8; /* bg-info color */
    text-align: center;
    padding: 10px 0;
    color: white; /* Ensure text color is readable */
}


</style>
<body>
     <!-- go back to main -->
    <div class="container-fluid p-0">
            <!-- The first child  -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <img class="img-logo" src="../icons/logo.png">
                 <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
                 </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                       <li class="nav-item">
                         <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link  text-light" href="../allproducts.php">Products</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="registration.php">Register</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="../contact.php">Contact</a>
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
            

                    <!-- Php code  -->
                   <?php
                   if(!isset($_SESSION['username'])){
                    echo '<li class="nav-item">
                <a class="nav-link" href="#">WELCOME GUEST</a>
                </li>';
                }else{
                   echo '<li class="nav-item">
                   <a class="nav-link" href="#">WELCOME '.$_SESSION['username'].'</a>
                   </li>';
                }
        
                  if(!isset($_SESSION['username'])){
                      echo '<li class="nav-item">
                        <a class="nav-link" href="user_Area/user_login.php">LOGIN</a>
                       </li>';
                     }else{
                   echo '<li class="nav-item">
                   <a class="nav-link" href="user_Area/payment.php">LOGOUT</a>
                   </li>';
                     }
                  
                   ?>

            
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="bg-dark p-2">
                <h3 class="text-center text-light">Sakshi Kirana Store</h3>
                <p class="text-center text-light">We listen, we care, Personalized support tailored to your needs</p>
        </div>

        <!-- Fourth Child -->
            <div class="row">
                <?php
                if(!isset($_SESSION['username'])){
                    include('user_login.php');
                }else{
                    include('payment.php');
                }
                
                ?>
            </div>
     

        <!--  last child -->
        <div class="container-fluid p-0 bg-dark footer text-dark text-center">
    <p class="text-center text-light">"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."</p>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>