<?php
@session_start();

if(isset($_GET["edit_Account"])){
  $user_session_name = $_SESSION['username'];
  $select_query = "SELECT * FROM `registration` WHERE `Username` = '$user_session_name' ";
  $result = mysqli_query($conn,$select_query);
  $rowdata = mysqli_fetch_assoc($result);
  $user_ID = $rowdata['id'];
  $user_name = $rowdata['Username'];
  $user_email = $rowdata['email'];
  $user_image = $rowdata['user_Image'];
  $phone_number = $rowdata['PHone_number'];
  $user_address = $rowdata['user_address'];
  $user_Zipcode = $rowdata['Zip_code'];

}
  
if(isset($_POST['Edit_account'])){
  $user_ID = $user_ID;
  $user_NAME = $_SESSION['username'];
  $Update_username = $_POST['username'];
  $Update_email = $_POST['email'];
  $update_Image = $_FILES['User_Image']['name'];
  $update_Image_temp = $_FILES['User_Image']['tmp_name'];
  $update_Phone = $_POST['phone_number'];
  $upadate_Address = $_POST['address'];
 
  $target_dir = "User_Images/";
  $target_file = $target_dir.basename($update_Image);

  if (move_uploaded_file($update_Image_temp, $target_file)) {
       $update_query = "UPDATE `registration` SET `Username`='$Update_username',`email`='$Update_email',`user_Image`='$update_Image',`user_address`=' $upadate_Address',`PHone_number`='$update_Phone',`Zip_code`='$user_Zipcode' WHERE  `id` = '$user_ID'";
       $Upadte_user_info = mysqli_query($conn,$update_query);
     
       if ($Upadte_user_info ) {
        echo "<script>
                alert('The data is updated.');
                window.open('Logout.php');</script>";
         echo "<script> window.location.href = '../index.php';
              </script>";
       } else {
        echo "<script>alert('Error updating user information.')</script>";
    }
  }
  else {
      echo "<script>alert('Error: No file uploaded.')</script>";
   }


}





?>

 <form action='' method='POST' enctype='multipart/form-data' >
        <div class='row'>
            <div class='col-md-11 '>
            <h3 class='text-center'>Edit Account</h3>
            <div class="form-group mb-2 ">
                     <label  for="username"> Update username </label>
                     <input type="text" name="username" class="form-control" value="<?php echo $user_name  ?>" placeholder="Username " required autocomplete="off" >
                     <small id="emailHelp" class="form-text text-muted">Create a unique username</small>
                   </div>
                   <div class="form-group mb-4">
                     <label  for="email"> Update Email address</label>
                     <input type="email" id="email" name="email" class="form-control"  value="<?php echo  $user_email ?>" placeholder="Enter email" required>
                     <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                   </div>
                   <label  for="User_Image">Update User Image </label>
                   <div class="form-group mb-4 d-flex align-items-cente justify-content-center">
                    <input type="file" id="User_Image" name="User_Image"  class="form-control"  autocomplete="off" required = "required"/>
                    <img class="edit_image" src="User_Images/<?php echo $user_image?>"  alt="user Image">
                    </div>

                   <div class="form-group mb-4">
                     <label  for="Phone_Number">Update Phone number</label>
                     <input type="number" id="Phone_Number" name="phone_number" class="form-control" value="<?php echo $phone_number ?>" placeholder="Enter Phone Number" required autocomplete="off" >
                   </div>
                   <div class="form-group mb-4">
                     <label  for="address">Update Address </label>
                     <input type="text" id="address" name="address" class="form-control" value="<?php echo  $user_address?>" placeholder="Enter Address" required autocomplete="off" >
                   </div> 
                   <div class="form-group mb-4">
                     <label  for="address">Update Zipcode </label>
                     <input type="text" id="address" name="address" class="form-control" value="<?php echo  $user_Zipcode ?>" placeholder="Enter Address" required autocomplete="off" >
                   </div> 
                   <div class="input-group w-10 mb-2  mx-2  ">
                      <input type="submit" class="bg-info border-0 p-2 btn btn-primary" name="Edit_account" value="Edit_account"/>
                    </div>
             </div>
        
              
        </div>
          
        </form>



