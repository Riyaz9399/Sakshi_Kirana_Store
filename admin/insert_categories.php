
<?php
include("../db.php");
 if(isset($_POST["insert_cat"])){
   $categorie_title = $_POST["Categories_title"];
  // Select Query 
   $select_Query = "SElECT * FROM `categories` WHERE `catedories_title`= '$categorie_title' ";
   $result_Query = mysqli_query($conn,$select_Query);
    $countRow = mysqli_num_rows($result_Query);
  
   if($countRow > 0){
    echo "<script>alert('The categories is alreay present in the database'); </script>";
   }else{
      //  Insert Query
    $insert_query = "INSERT INTO `categories`(`catedories_title`) VALUES ('$categorie_title')";
    $result = mysqli_query($conn, $insert_query);
    if($result){
    echo "<script>alert('The category is added in the database'); </script>";
    }
   }

  
 }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text bg-secondary"  id="basic-addon1"><i class="bi bi-receipt-cutoff"></i></span>
  </div>
  <input type="text" class="form-control" name="Categories_title" placeholder="Insert Categories"  aria-describedby="basic-addon1">
</div>   

  <div class="input-group w-10 mb-2 m-auto p-2">
  <input type="submit" class="bg-dark p-2 text-light"  name="insert_cat" value="Insert Categories"/>
  </div>

</form>