<?php
  include("../db.php");
// In your script
require_once( "../CommonFunction.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
   
</head>
<style>
    
   .registration-div{
       margin: 10%;
       padding:20px;
       position: relative;
       width: 80%;
       height: 70%;
       background-color: #FFF;
       box-shadow: 30px 30px 55px #5557;
       border-radius: 13px;
       overflow: hidden;
   
   } 
   .devider{
       height:100px;
       width:100vw;
   }  
   
   .image-icon{
       height:80%;
       width:90%;
       object-fit:contain;
    }
     @media (max-width: 768px) {
            .registration-div {
                margin: 5%;
                padding: 10px;
                width: 90%;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .input-group {
                width: 100%;
            }

            .image-icon {
                max-width: 100px;
            }

            h3, h6 {
                font-size: 1.2rem;
            }

            caption pre {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .registration-div {
                margin: 5%;
                padding: 5px;
                width: 95%;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .form-control {
                font-size: 0.9rem;
            }

            .input-group input {
                font-size: 0.9rem;
            }

            h3 {
                font-size: 1.1rem;
            }

            h6 {
                font-size: 0.8rem;
            }

            caption pre {
                font-size: 0.8rem;
            }
        }

            .form-group {
            position: relative;
        }
        .form-control {
            padding-right: 50px; /* Make space for the toggle button */
        }
        .toggle-btn {
            position: absolute;
            bottom: 3px;
            right: 10px;
            cursor: pointer;
            background: black; /* Optional: to make it look like a button */
            padding: 2px 5px; /* Optional: to make it look like a button */
            border-radius: 3px; /* Optional: to make it look like a button */
        }


</style>
<body> 
     <form action="" method="POST" class="registration-div">
        <div class="row ">
            <div class="col-md-8 gap-4">
            <h3 class="text-center">Login</h3>
              <h6 class="text-center fst-italic">IF YOU can't Complete your registration? THEN GO TO <a href="registration.php">Registration</a></h6>
                   <div class="form-group mb-4 ">
                     <label for="Username">Username</label>
                     <input type="text" name="username" class="form-control"  placeholder="Enter Username">
                   </div>
                   <div class="form-group mb-4">
                     <label for="email">Email address</label>
                     <input type="email" name="email" class="form-control" placeholder="Enter email">
                     <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                   </div>
                   <div class="form-group  mb-4">
                     <label for="password">Password</label>
                     <input type="password" id="password" name="password" class="form-control"  placeholder="Password">
                     <span class="toggle-btn text-light" onclick="togglePassword()">Show</span>
                   </div>
                   <div class="input-group w-20 mb-4  mx-2  ">
                     <input type="submit" class="bg-info border-0 p-2 btn btn-primary" name="Login" value="Login">
                    </div>
                   <br>
                   <br>
             </div>
             <div class="col-md-4 text-center text-danger fst-italic">
                 <img class="image-icon" src="registration.jpg" onerror="this.onerror=null; this.src='user_Area/registration.jpg';" alt="logo">
                 <caption><pre>"Your Trust Fuels Our Achievement."</pre></caption>
             </div>
              
        </div>
          
        </form>
        <div class="devider"></div>
        
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
   <script>
         function togglePassword() {
            var passwordInput = document.getElementById('password');
            var toggleBtn = document.querySelector('.toggle-btn');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        }
   
   </script>  
</body>
</html>

<?php



// registration details

if (isset($_POST['Login'])) {
  $login_username = $_POST['username'];
  $login_password = $_POST['password'];
  $login_email = $_POST['email'];

      // Query to select the user based on username and email
      $select = "SELECT * FROM `registration` WHERE `Username` = '$login_username' AND `email` = '$login_email'";
      $result = mysqli_query($conn, $select); 
    
    // carts deatils 
      $get_ip = getIPAddress();
      $select_carts = "SELECT * FROM `carts_detail` WHERE  `Ip_Address` = '$get_ip' ";
      $select_carts_details = mysqli_query($conn,$select_carts);
      $count = mysqli_num_rows($select_carts_details);




      if ($result ) {
        $rowdata = mysqli_fetch_assoc($result);
        $user_count = mysqli_num_rows($result);
        $ip_Address = $rowdata['user_Ip_address'];
       
        $_SESSION['username'] = $login_username ;
        //    echo "<pre>Session Data: ";
        //         print_r($_SESSION);
        //         echo "</pre>";
        // Check if the user exists
        if ($user_count > 0) {
          
            // Verify the password
            if (password_verify($login_password, $rowdata['password'])) {
                $_SESSION['username'] = $login_username ;
               if($count == 0){
                    $_SESSION['username'] = $login_username ;
                echo "<script>alert('Login succefully');
                window.location.href='../index.php';</script>";
               }else{
                echo "<script>alert('Login succefully');
                window.location.href='payment.php';</script>";
               }
            } else {
                echo "<script>alert('Invalid Credentials');</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } else {
        echo "<script>alert('Error in query execution');</script>";
    }


}

?>