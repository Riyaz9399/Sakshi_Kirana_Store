<?php
include("../db.php");

 if(isset($_POST["insert_brand"])){
  $Brand_title = $_POST["Brand_Title"];
 // Select Query 
  $select_Query = "SElECT * FROM `brands` WHERE `brand_title`= '$Brand_title' ";
  $result_Query = mysqli_query($conn,$select_Query);
  $countRow = mysqli_num_rows($result_Query);
  if($countRow > 0){
   echo "<script>alert('The Brands is alreay present in the database'); </script> ";
  }
  else{
        //  Insert Query
      $insert_query = "INSERT INTO `brands`(`brand_title`) VALUES ('$Brand_title ')";
      $result = mysqli_query($conn, $insert_query);
      if($result){
         echo "<script>alert('The Brand is added in the database'); </script>";
      }
  }

}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text bg-secondary"  id="basic-addon1"><i class="bi bi-receipt-cutoff"></i></span>
  </div>
  <input type="text" class="form-control" name=" Brand_Title" placeholder="Insert Brands"  aria-describedby="basic-addon1">
</div>   

  <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-dark p-2 text-light" name="insert_brand" value="Insert Barands"/>
  </div>

</form>