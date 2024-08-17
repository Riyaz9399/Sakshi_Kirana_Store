
<?php
include("../db.php");
 if(isset($_GET['Edit_Categories'])){
     $categories_id = $_GET['Edit_Categories'];
   $select = "SELECT * FROM `categories` WHERE `categories_ID`= '$categories_id' ";     
   $result = mysqli_query($conn,$select);
   $rowdata = mysqli_fetch_assoc($result);
   $categories_title =  $rowdata['catedories_title'];
 }
?>
<h2 class="text-center">Edit Categories</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text bg-secondary"  id="basic-addon1"><i class="bi bi-receipt-cutoff"></i></span>
  </div>
  <input type="text" class="form-control" value="<?php echo $categories_title; ?>" name="Categories_title" placeholder="Insert Categories"  aria-describedby="basic-addon1">
</div>   

  <div class="input-group w-10 mb-2 m-auto p-2">
  <input type="submit" class="bg-dark p-2 text-light"  name="UpdateCategories" value="Update Categories"/>
  </div>

</form>

<?php
if(isset($_POST["UpdateCategories"])){
   $categorie_title = $_POST["Categories_title"];
  // Select Query 
    $update_query = "UPDATE `categories` SET `catedories_title`='$categorie_title' WHERE `categories_ID` = $categories_id";
    $result = mysqli_query($conn,$update_query);
    if($result){
    echo "<script>alert('The category is Updated in the database');
    window.location.href='index.php?View_categories'</script>";
    }
   }


?>