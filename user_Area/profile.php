<?php
include("../db.php");
include("../CommonFunction.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME <?php echo $_SESSION['username'] ?></title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  
    <style>
     

      .card-img-top{
        width:100%;
       height:200px;
       object-fit: cover;
      }
      .card{
        border-color:2px solid black;
        box-shadow: 23px 34px 67px black;
      }
       .img-logo{
        height: 100px;
        width: 100px;
        border-radius: 60%;
        margin : 0 4px 0 2px;  
       }
       .nav-img{
        height:200px;
        width:200px;
        margin:auto;
        display:block;
        object-fit:contain;
       }
       .edit_image{
        height:100px;
        width:100px;
        object-fit:contain;
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
       .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 300px;
      text-align: center;
    }

    .modal-buttons {
      display: flex;
      justify-content: space-around;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    .btn-ok {
      background-color: #3085d6;
      color: white;
    }

    .btn-cancel {
      background-color: #d33;
      color: white;
    }
    @media (max-width: 768px) {
        .img-logo,
        .nav-img {
            height: 40px;
            width: 40px;
        }

        .navbar-nav {
            flex-direction: row;
            gap: 10px;
        }

        .col-md-2 {
            display: none; /* Hide the sidebar on smaller screens */
        }

        .footer {
            position: static; /* Remove fixed position on small screens */
        }
    }

    @media (max-width: 576px) {
        .img-logo,
        .nav-img {
            height: 30px;
            width: 30px;
        }

        .nav-link {
            padding: 0.5rem;
            font-size: 0.9rem; /* Reduce font size for smaller screens */
        }
    }
      



    </style>
</head>
<body>
     <!-- go back to main -->
    <div class="container-fluid p-0">
            <!-- The first child  -->
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">

                <?php
                    $username = $_SESSION['username'];
                    $username_image = "SELECT * FROM `registration` WHERE `Username` = '$username'";
                    $result = mysqli_query($conn,$username_image );
                      $row_image = mysqli_fetch_array( $result);
                      
                      $user_image =  $row_image['user_Image'];

                echo "
                        <img class='img-logo' src='User_Images/$user_image'/>
                "; 
                ?>
                 <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                 </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                       <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="../allproducts.php">Products</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="registration.php">Register</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="../contact.php">Contact</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="../cart.php"> Carts<i class="bi bi-cart4"></i><sup> <?php number_of_cart_items();?></sup></a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="#">    Total Price <?php total_price();?></a>
                       </li>
                    </ul>
                    <form  class="d-flex" action="../serch_product" method="GET" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                      <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                       <input  class="btn btn-outline-light" type="submit" value="search" name="search_data_product">

                    </form>
               </div>
            </div>
        </nav>


        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg  navbar-dark text-light bg-dark">
            <ul class="navbar-nav me-auto ">
           
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
                      <a class="nav-link" href="user_Area\user_login.php">LOGIN</a>
                     </li>';
                   }else{
                 echo '<li class="nav-item">
                    <button class="btn btn-dark" onclick="confirmLogout()">Logout</button>
                  </li>';
        
                 echo '<div id="myModal" class="modal">
                 <div class="modal-content">
                   <p class="text-dark">MAT KAR BHAI RO DUGA PLEASE..!</p>
                   <div class="modal-buttons">
                     <button class="btn btn-ok" onclick="handleOk()">OK</button>
                     <button class="btn btn-cancel" onclick="handleCancel()">Cancel</button>
                   </div>
                 </div>
               </div>';
         
         echo '<script>
                 function confirmLogout() {
                   document.getElementById("myModal").style.display = "block";
                 }
                 
                 
                 function handleOk() {
                      // Send AJAX request to Logout.php and then redirect to index.php
                      var xhr = new XMLHttpRequest();
                      xhr.open("GET", "Logout.php", true);
                      xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                          window.location.href = "../index.php";
                        }
                      };
                      xhr.send();
                    }
        
                 function handleCancel() {
                      // Redirect to main root index.php without logging out
                      window.location.href = "profile.php";
                }    
                 
                 function closeModal() {
                   document.getElementById("myModal").style.display = "none";
                 }
                 
                 // Close the modal if the user clicks outside of it
                 window.onclick = function(event) {
                   var modal = document.getElementById("myModal");
                   if (event.target == modal) {
                     modal.style.display = "none";
                   }
                 }
               </script>';
        }
                   
                   ?>
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="">
                <h3 class="text-center">Sakshi Kirana Store</h3>
                <p class="text-center">We listen, we care, Personalized support tailored to your needs</p>
        </div>

        <!-- Forth Child -->
         <div class="row">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav  text-center bg-dark" style="height:100vh;">
                <li class="nav-item">
                         <a class="nav-link text-light  bg-dark" href="#"><h4>Your Profile</h4></a>
                </li>

                <?php
                    $username = $_SESSION['username'];
                    $username_image = "SELECT * FROM `registration` WHERE `Username` = '$username'";
                    $result = mysqli_query($conn,$username_image );
                      $row_image = mysqli_fetch_array( $result);
                      
                      $user_image =  $row_image['user_Image'];

                echo "<li class='nav-item '>
                         <a class='nav-link ' href='profile.php'><img class='nav-img' src='User_Images/$user_image'/></a>
                </li>
                ";
                
                 
                
                
                ?>

               <li class="nav-item ">
                         <a class="nav-link text-light" href="profile.php?profile">Pending Orders</a>
                </li>
                <li class="nav-item ">
                         <a class="nav-link text-light" href="profile.php?edit_Account">Edit Account</a>
                </li>
                <li class="nav-item ">
                         <a class="nav-link text-light" href="profile.php?my_orders">My orders</a> 
                </li>
                <li class="nav-item ">
                         <a class="nav-link text-light" href="profile.php?Delete_account">Delete Account</a>
                </li>
                <li class="nav-item ">
                         <a class="nav-link text-light" href="Logout.php">LogOut</a> 
                </li>
                
                </ul>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <?php
                    
                    
                    if(isset($_GET["profile"])){
                        get_user_order_details();
                    }
                    else if(isset($_GET["edit_Account"])){
                        include("edit_Account.php");
                    }else if(isset($_GET["my_orders"])){
                      include("my_orders.php");
                    }else if(isset($_GET["Delete_account"])){
                      include("delete_Account.php");
                    }else if(isset($_GET["Logout.php"])){
                        // echo '<script>alert("WE MISS YOU ");
                        // window.location.href="../index.php";</script>';
                        
                    }
                      else{
                        $username =  $_SESSION['username'];
                        echo "<div class='mx-10 my-10'><h2 class='text-center text-dark  '>WELCOME <span class='text-danger fst-italic'>$username</span> TO YOUR USER DASHBOARD </h2></div>";
                    }
                ?>
           
            </div>
         </div>


        
               

        <!--  last child -->
        <div class="container-fluid p-0 bg-dark footer text-dark text-center">
    <p class="text-center text-light">"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."</p>
        </div>

    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>