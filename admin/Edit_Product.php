<?php
include('../db.php');
if(isset($_GET["Edit_Product"])){
     $product_id = $_GET["Edit_Product"];
     $select_query = "SELECT * FROM `products` WHERE `product_id`= $product_id ";
     $result = mysqli_query($conn,$select_query);
     $rowdata = mysqli_fetch_assoc($result);
     $product_title = $rowdata['product_title'];
     $product_description = $rowdata['product_description'];
     $product_keywords = $rowdata['product_keyword'];
     $Image_1 = $rowdata['Image_1'];
     $product_price = $rowdata['product_price'];
     $categories_Id = $rowdata['categories_Id'];
     $brands_Id = $rowdata['brands_Id'];
     echo  $categories_Id;
     
}


?>
<style>
.edit_image{
    height:100px;
    width:100px;
}
</style>

<div class="container mt-3 ">
            <br>
            <div class="text-center display-6 text-uppercase fw-bold  mb-4">Edit Products</div>
            <!-- Form -->
             <form action="" method="POST" enctype="multipart/form-data" >
                <!-- Project Title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-lable  fw-bold  p-2 my-2">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control"  value='<?php echo $product_title ?>' autocomplete="off" required = "required"/>
                </div>

                <!-- Description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_Description" class="form-lable fw-bold  p-2 my-2"> Product Description </label>
                    <input type="text" name="product_Description"  value="<?php echo $product_description; ?>" id="product_Description" class="form-control"  autocomplete="off" required = "required"/>
                </div>

                <!-- Product Keyword -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keyword" class="form-lable fw-bold  p-2 my-2"> Product keyword </label>
                    <input type="text" value="<?php echo $product_keywords; ?>"  name="product_keyword" id="product_keyword" class="form-control"  autocomplete="off" required = "required"/>
                </div>

                <!-- Select Category -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="procoduct_categories" id="" class="procoduct_categories p-2">
                        <!-- Php Code  -->
                        <option value=''>Select Categories</option>
                        <?php
                        $selectCategories = "SELECT * FROM `categories` WHERE `categories_ID` =  $categories_Id  ";
                        $result = mysqli_query($conn,$selectCategories);
                        while($rowdata = mysqli_fetch_assoc($result)){
                            $categoriesTitle = $rowdata['catedories_title'];
                            $categories_ID = $rowdata['categories_Id'];
                            echo " <option value='$categories_Id'> $categoriesTitle</option>";
                        }

                        ?>
                    </select> 
                </div>

                <!--  select Brnads  -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_Brands" id="" class="product_Brands p-2">
                        <!-- Php Code  -->
                        <option value='' >Select Brands</option>
                        <?php
                        $selectbrand = "SELECT * FROM `brands` WHERE `brands_Id` = $brands_Id  ";
                        $result = mysqli_query($conn,$selectbrand);
                        while($rowdata = mysqli_fetch_assoc($result)){
                            $BrandTitle = $rowdata['brand_title'];
                            $BrandId = $rowdata['brands_Id'];
                            echo " <option value='$BrandId'> $BrandTitle</option>";
                        }

                        ?>
                    </select> 
                </div>

                <!-- Inset Image 1-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="Product_Image1" class="form-lable fw-bold  p-2 my-2 "> Product Image 1 </label>
                    <div class="d-flex">
                    <input type="file" name="Product_Image1" id="Product_Image1" class="form-control"  autocomplete="off" required = "required"/>
                    <img class="edit_image" src="products_images/<?php echo $Image_1 ?>"  alt="user Image">
                    </div>

                </div>


                <!-- Insert Image 2 -->
                <!-- <div class="form-outline mb-4 w-50 m-auto">
                    <label for="Product_Image2" class="form-lable fw-bold bg-light p-2 my-2"> Product Image 2</label>
                    <input type="file" name="Product_Image2" id="Product_Image2" class="form-control"  autocomplete="off" required = "required"/>
                </div>-->

                <!-- Insert Image 3 -->

               <!--  <div class="form-outline mb-4 w-50 m-auto">
                    <label for="Product_Image3" class="form-lable fw-bold bg-light p-2 my-2 "> Product Image 3 </label>
                    <input type="file" name="Product_Image3" id="Product_Image3" class="form-control"  autocomplete="off" required = "required"/>
                </div> -->

                <!-- Product Price  -->

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="Product_Price" class="form-lable fw-bold   p-2 my-2 "> Product Price </label>
                    <input type="text" name="Product_Price" id="Product_Price" class="form-control"  autocomplete="off" required = "required" value="<?php echo $product_price ?>"/>
                </div>

                <!-- Submit Buttton -->

                 <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" name="Update_Product" class="btn mb-3 p-3 text-light bg-dark" value="Update_Product"></input>

                </div> 

                <!-- PHP code -->
                 <?php
                if(isset($_POST['Update_Product'])) {
                    $product_Title = $_POST["product_title"];
                    $product_Description = $_POST["product_Description"];
                    $product_Keyword = $_POST["product_keyword"];
                    $categories_ID = $_POST["procoduct_categories"];
                    $brands_Id = $_POST["product_Brands"];
                    $Product_Price = $_POST["Product_Price"];
                    $product_status = "True";
                
                    // Accessing the images 
                    $Image1 = $_FILES["Product_Image1"]['name'];
                    $temp_Image1 = $_FILES["Product_Image1"]['tmp_name'];

                    echo "Product Title: $product_Title<br>";
                echo "Product Description: $product_Description<br>";
                echo "Product Keyword: $product_Keyword<br>";
                echo "Categories ID: $categories_ID<br>";
                echo "Brands ID: $brands_Id<br>";
                echo "Product Price: $Product_Price<br>";
                echo "Image1: $Image1<br>";
                
                    // Check if all required fields are filled
                    if($product_Title != "" && $product_Description != "" && $product_Keyword != "" && $categories_ID != "" && $brands_Id != "" && $Product_Price != "" && $product_status != "") {
                        
                        // Specify target directory for image upload (use forward slashes for paths in PHP)
                         $target_dir = "products_images/";
                        $target_file = $target_dir . basename($Image1);
                
                        // Move uploaded file to target directory
                        if(move_uploaded_file($temp_Image1, $target_file)) {
                
                            // Insert product details into database
                           // Ensure database connection is included
                            $update_Product = "UPDATE `products` SET  `product_title` = '$product_Title', `product_description` = '$product_Description', `product_keyword` =       '$product_Keyword', `categories_Id` = '$categories_ID', `brands_Id` = '$brands_Id', `Image_1` = '$Image1', `product_price` = '$Product_Price', `Status` = '$product_status', `Date` = NOW()
        WHERE `product_id` = $product_id ";
                            
                            $result = mysqli_query($conn,$update_Product);
                
                            if($result) {
                                echo "<script>alert('Your Product are Updated');</script>";
                            } else {
                                echo "<script>alert('Failed to insert product. Please try again.');</script>";
                            }
                        } else {
                            echo "<script>alert('Failed to upload image. Please try again.');</script>";
                        }
                    } else {
                        echo "<script>alert('Please fill out all required fields.');</script>";
                    }
                }
                

               
                
                ?> 
                 


             </form>
        </div>