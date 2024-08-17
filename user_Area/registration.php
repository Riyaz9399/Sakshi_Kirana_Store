
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
       background-color: #fff;
       box-shadow: 20px 30px 40px black;
       border-radius: 13px;
       overflow: hidden;
   }   
   
   .image-icon{
       height:80%;
       width:90%;
       object-fit:contain;
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
            padding: 5px; /* Optional: to make it look like a button */
            border-radius: 3px; /* Optional: to make it look like a button */
        }
        .toggle-btn1 {
            position: absolute;
             bottom: 3px;
            right: 10px; 
            cursor: pointer;
            background: black; /* Optional: to make it look like a button */
            padding: 5px; /* Optional: to make it look like a button */
            border-radius: 3px; /* Optional: to make it look like a button */
        }


</style>
<body> 
     <form action="" method="POST" class="registration-div" enctype="multipart/form-data">
        <div class="row ">
            <div class="col-md-8 mb-4">
            <h3 class="text-center">New User registration</h3>
              <h6 class="text-center fst-italic">IF YOU SIGNUP THEN GO TO <a href="./user_login.php">Login</a></h6>
              <br>
                   <div class="form-group mb-2 ">
                     <label for="username">Username</label>
                     <input type="text" name="username" class="form-control"  placeholder="Username" required autocomplete="off" >
                     <small id="emailHelp" class="form-text text-muted">Create a unique username</small>
                   </div>
                   <div class="form-group mb-4">
                     <label for="email">Email address</label>
                     <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
                     <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                   </div>
                   <div class="form-group mb-4">
                     <label for="password">Password</label>
                     <input type="password" id="password" name="password" class="form-control"  placeholder=" Enter Password" required >
                      <span class="toggle-btn text-light" onclick="togglePassword()">Show</span>
                   </div>
                   <div class="form-group mb-4">
                     <label for="confirmpassword">Confirm Password</label>
                     <input type="password" id="confirmpassword" name="Confirmpassword" class="form-control"  placeholder="Confirm Password" required >
                     <span class="toggle-btn1 text-light" onclick="toggleconfirmPassword()">Show</span>
                   </div>
                   <div class="form-group mb-4">
                    <label for="User_Image">User Image </label>
                    <input type="file" id="User_Image" name="User_Image"  class="form-control"  autocomplete="off" required = "required"/>
                    </div>

                   <div class="form-group mb-4">
                     <label for="Phone_Number">Phone number</label>
                     <input type="number" id="Phone_Number" name="phone_number" class="form-control"  placeholder="Enter Phone Number" required autocomplete="off" >
                   </div>
                   <div class="form-group mb-4">
                     <label for="address">Address </label>
                     <input type="text" id="address" name="address" class="form-control"  placeholder="Enter Address" required autocomplete="off" >
                   </div>
                   <div class="form-group mb-4">
                     <label for="zipcode">Enter the zip code of your city </label>
                     <input type="number" id="zipcode" name="Zipcode" class="form-control"  placeholder="Zip code " required autocomplete="off" >
                   </div>
                   <hr>
                   <!-- <div class="form-group mb-4">
                      <label>Role:</label>
                      <input type="radio" name="role" value="user" checked> User
                      <input type="radio" name="role" value="admin"> Admin
                   </div> -->
                   <div class="input-group w-10 mb-2  mx-2  ">
                      <input type="submit" class="bg-info border-0 p-2 btn btn-primary" name="Register" value="Register"/>
                    </div>
                   <br>
             </div>
             <div class="col-md-4 p-2 text-center text-danger fst-italic">
                   <!-- <img  class="image-icon " src="htdocs/icons/registration.jpg" alt="logo">-->
                     <img  class="image-icon " src="registration.jpg" alt="logo"/>
                    <caption>   <pre> "Your Trust Fuels Our Achievement." <pre> </caption>
             </div>
          </div>  
      </form>
        
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
   <script>
     function togglePassword(){
            var passwordInput = document.getElementById('password');
            var toggleBtn = document.querySelector('.toggle-btn');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        };

        function toggleconfirmPassword() {
            var passwordInput = document.getElementById('confirmpassword');
            var toggleBtn = document.querySelector('.toggle-btn1');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        };

     
       
   </script>  
</body>
</html>

<?php


include("../db.php");
include("../CommonFunction.php");
session_start();
// Rest of your script

 if (isset($_POST['Register'])) {
  // Retrieve form data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $userPassword = $_POST['password'];
  $hash_userpassword = password_hash($userPassword,PASSWORD_DEFAULT);
  $confirmPassword = $_POST['Confirmpassword'];
  $phone_number = $_POST['phone_number'];
  $address = $_POST['address'];
  $zipcode = $_POST['Zipcode'];
  $user_Ip_address = getIPAddress();

  $select_email = "SELECT * FROM `registration` WHERE `email` = '$email' AND  `Username` = ' $username'  ";
  $result = mysqli_query($conn,$select_email);
 $row_count = mysqli_num_rows($result);
  if( $row_count > 0){
    echo "<script>alert('This Username and email  is already registered! you can you another to register into the website');</script>";
  }
  else{
  // Retrieve and process image data
  if (isset($_FILES['User_Image'])) {
  

  $user_image = $_FILES["User_Image"]['name'];
  $user_image_temp = $_FILES["User_Image"]['tmp_name'];

  // Validate form data
  if (!empty($username) && !empty($email) && !empty($userPassword) && !empty($confirmPassword) && !empty($phone_number) && !empty($address) && !empty($zipcode)) {
      // Check if passwords match
      if ($userPassword === $confirmPassword) {
          // Move uploaded file to the desired directory

          $target_dir = "User_Images/";
          $target_file = $target_dir.basename($user_image);
  

          if (move_uploaded_file($user_image_temp, $target_file)) {
              // Insert user data into the database
              $insertQuery = "INSERT INTO `registration` (`Username`, `email`, `password`, `user_Image`, `user_Ip_address`, `user_address`, `PHone_number`, `Zip_code`) VALUES ('$username', '$email', '$hash_userpassword', '$user_image', '$user_Ip_address', '$address', '$phone_number', '$zipcode')";
              $result = mysqli_query($conn, $insertQuery);

              // Check if the insertion was successful
              if ($result) {
                    $_SESSION['username'] = $username;
                  echo "<script>alert('Your registration is done'); window.location.href = 'user_login.php';</script>";
              } else {
                  echo "<script>alert('Error: Could not register. Please try again.')</script>";
              }
          } else {
              echo "<script>alert('Error: Could not upload the image. Please try again.')</script>";
              echo "<script>console.log('Error: " . $_FILES['User_Image']['error'] . "');</script>";
          }
      } else {
          echo "<script>alert('Error: Passwords do not match.')</script>";
      }
  } else {
      echo "<script>alert('Error: All fields are required.')</script>";
  }
  } else {
    echo "<script>alert('Error: No file uploaded.')</script>";
}
}

// select Carts 
 $select_cart_items = "SELECT * FROM `carts_detail` WHERE  `Ip_Address` = ' $user_Ip_address '";
 $Result_cart = mysqli_query($conn,$select_cart_items);
 $result_count = mysqli_num_rows($Result_cart);
 if($result_count > 0){
  $_SESSION['username'] = $username;
  echo "<script>alert('You have items in your cart');
  window.location.href='ChecKout.php'</script>";
 }
 else{
  echo "<script>
  window.location.href='index.php'</script>";
 }






 }

?>