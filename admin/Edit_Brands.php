
<?php
include("../db.php");
 if(isset($_GET['Edit_Brands'])){
     $Brands_id = $_GET['Edit_Brands'];
   $select = "SELECT * FROM `brands` WHERE `brands_Id`= '$Brands_id' ";     
   $result = mysqli_query($conn,$select);
   $rowdata = mysqli_fetch_assoc($result);
   $brand_title =  $rowdata['brand_title'];
 }
?>
<h2 class="text-center">Edit Brands</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text bg-secondary"  id="basic-addon1"><i class="bi bi-receipt-cutoff"></i></span>
  </div>
  <input type="text" class="form-control" value="<?php echo $brand_title; ?>" name="Brand_title" placeholder="Insert Categories"  aria-describedby="basic-addon1">
</div>   

  <div class="input-group w-10 mb-2 m-auto p-2">
  <input type="submit" class="bg-dark p-2 text-light"  name="UpdateBrands" value="Update Categories"/>
  </div>

</form>

<?php
if(isset($_POST["UpdateBrands"])){
   $Brand_title = $_POST["Brand_title"];
  // Select Query 
    $update_query = "UPDATE `brands` SET `brand_title`='$Brand_title' WHERE `brands_Id` = $Brands_id";
    $result = mysqli_query($conn,$update_query);
    if($result){
    echo "<script>alert('The Brands is Updated in the database');
    window.location.href='index.php?View_Brands'</script>";
    }
   }


?>