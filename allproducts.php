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
    <title>E-commerce Website</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href="style.css" rel="stylesheet"/>
   
    
  
    <style>
      

      .card-img-top{
        width:100%;
       height:200px;
       object-fit: contain;
      }
      .card{
        border-color:2px solid black;
        box-shadow: 3px 4px 8px rgba(173, 216, 230, 0.5);
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
    .divider{
        height:100px;
        width:100vw;
    }

    .scrollable-div {
            height: 400px; /* Adjust the height as needed */
            overflow-y: auto; /* Enable vertical scrolling */
            overflow-x: hidden; /* Disable horizontal scrolling */
            background-color: black; /* Match the background color */
        }
        .scrollable-div ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .scrollable-div li {
            border-bottom: 1px solid #555; /* Optional: Add a border for better visibility */
        }


    </style>
</head>
<body >
     <!-- go back to main -->
    <div class="container-fluid p-0 bg-dark">
            <!-- The first child  -->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <img class="img-logo" src="./icons/logo.png">
                 <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                 </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                       <li class="nav-item">
                         <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
                       </li>
                      
                       <?php
                        if(isset($_SESSION['username'])){
                          echo '<li class="nav-item">
                         <a class="nav-link text-light" href="user_Area\profile.php">My Account</a>
                       </li>';
                        }else{
                            echo '<li class="nav-item">
                         <a class="nav-link text-light" href="user_Area\registration.php">Register</a>
                       </li>';
                        }
                       ?>
                       
                       <li class="nav-item">
                         <a class="nav-link text-light" href="contact.php">Contact</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="cart.php"> Carts<i class="bi bi-cart4"></i><sup> <?php number_of_cart_items();?></sup></a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link text-light" href="#">    Total Price <?php total_price();?></a>
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
            
            <?php
         
         if(!isset($_SESSION['username'])){
          echo '<li class="nav-item">
      <a class="nav-link" href="">WELCOME GUEST</a>
      </li>';
      }else{
         echo '<li class="nav-item">
         <a class="nav-link" href="user_Area\profile.php">WELCOME '.$_SESSION['username'].'</a>
         </li>';
      }

        if(!isset($_SESSION['username'])){
            echo '<li class="nav-item">
              <a class="nav-link" href="user_Area\user_login.php">LOGIN</a>
             </li>';
           }else{
         echo '<li class="nav-item">
            <button class="btn btn-secondary" onclick="confirmLogout()">Logout</button>
          </li>';

         echo '<div id="myModal" class="modal">
         <div class="modal-content">
           <p>MAT KAR BHAI RO DUGA PLEASE..!</p>
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
              xhr.open("GET", "user_Area/Logout.php", true);
              xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                  window.location.href = "index.php";
                }
              };
              xhr.send();
            }

         function handleCancel() {
              // Redirect to main root index.php without logging out
              window.location.href = "index.php";
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
        <div class="text-light">
                <h3 class="text-center">Sakshi Kirana Store</h3>
                <p class="text-center">We listen, we care, Personalized support tailored to your needs</p>
        </div>


        <!--Fourth Child  -->
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                     <?php
                     
                     if(isset($_GET["search_data_product"])){
                              search_Product();  
                     }else {
                          getAllproduct();
                     }
                     ?> 

                </div>         
            </div>         
            
        </div>

            <div class=" divider bg-dark md-4 "></div>
        <!--  last child -->
        <div class="container-fluid p-0 bg-dark footer text-dark text-center">
    <p class="text-center text-light">"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."</p>
        </div>

       



    </div>


      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>


