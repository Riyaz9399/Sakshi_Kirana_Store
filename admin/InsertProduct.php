<?php
include("../db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="..\style.css"/>
    <style>   
       
        .container{
            border-radius: 50px;
        }
        
    </style>



</head>

<body>
        <div>
            <br>
            <div class="text-center display-6 text-uppercase fw-bold  mb-4">Insert Products</div>
            <!-- Form -->
             <form action="" method="POST" enctype="multipart/form-data" >
                <!-- Project Title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-lable  fw-bold  p-2 my-2">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter the product title" autocomplete="off" required = "required"/>
                </div>

                <!-- Description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_Description" class="form-lable fw-bold  p-2 my-2"> Product Description </label>
                    <input type="text" name="product_Description" id="product_Description" class="form-control" placeholder="Enter the product Description" autocomplete="off" required = "required"/>
                </div>

                <!-- Product Keyword -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keyword" class="form-lable fw-bold  p-2 my-2"> Product keyword </label>
                    <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter the product KeyWord" autocomplete="off" required = "required"/>
                </div>

                <!-- Select Category -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="procoduct_categories" id="" class="procoduct_categories p-2">
                        <!-- Php Code  -->
                        <option value=''>Select Categories</option>
                        <?php
                        $selectCategories = "SELECT * FROM `categories` ";
                        $result = mysqli_query($conn,$selectCategories);
                        while($rowdata = mysqli_fetch_assoc($result)){
                            $categoriesTitle = $rowdata['catedories_title'];
                            $categories_ID = $rowdata['categories_ID'];
                            echo " <option value='$categories_ID'>$categoriesTitle</option>";
                            
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
                        $selectbrand = "SELECT * FROM `brands` ";
                        $result = mysqli_query($conn,$selectbrand);
                        while($rowdata = mysqli_fetch_assoc($result)){
                            $BrandTitle = $rowdata['brand_title'];
                            $BrandId = $rowdata['brands_Id'];
                            echo " <option value='$BrandId'> $BrandTitle</option>";
                            echo  $BrandId;
                        }

                        ?>
                    </select> 
                </div>

                <!-- Inset Image 1-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="Product_Image1" class="form-lable fw-bold  p-2 my-2 "> Product Image 1 </label>
                    <input type="file" name="Product_Image1" id="Product_Image1" class="form-control"  autocomplete="off" required = "required"/>
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
                    <input type="text" name="Product_Price" id="Product_Price" class="form-control" placeholder="Enter the product Price" autocomplete="off" required = "required"/>
                </div>

                <!-- Submit Buttton -->

                 <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" name="insert_product" class="btn mb-3 p-3 text-light bg-dark" value="insert_product"></input>

                </div> 

                <!-- PHP code -->

                 <?php
                if(isset($_POST['insert_product'])) {
                    $product_Title = $_POST["product_title"];
                    $product_Description = $_POST["product_Description"];
                    $product_Keyword = $_POST["product_keyword"];
                    $categories_ID = $_POST["procoduct_categories"];
                    $brands_Id = $_POST["product_Brands"];
                    $Product_Price = $_POST["Product_Price"];
                    $product_status = "True";

                      echo "Product Title: $product_Title<br>";
                echo "Product Description: $product_Description<br>";
                echo "Product Keyword: $product_Keyword<br>";
                echo "Categories ID: $categories_ID<br>";
                echo "Brands ID: $brands_Id<br>";
                echo "Product Price: $Product_Price<br>";
                echo "Image1: $Image1<br>";
                
                    // Accessing the images 
                    $Image1 = $_FILES["Product_Image1"]['name'];
                    $temp_Image1 = $_FILES["Product_Image1"]['tmp_name'];
                
                    // Check if all required fields are filled
                    if($product_Title != "" && $product_Description != "" && $product_Keyword != "" && $categories_ID != "" && $brands_Id != "" && $Product_Price != "") {
                        
                        // Specify target directory for image upload (use forward slashes for paths in PHP)
                        $target_dir = "products_images/";
                        $target_file = $target_dir . basename($Image1);
                
                        // Move uploaded file to target directory
                        if(move_uploaded_file($temp_Image1, $target_file)) {
                
                            // Insert product details into database
                           
                            $insertProduct = "INSERT INTO `products` (`product_title`, `product_description`, `product_keyword`, `categories_Id`, `brands_Id`, `Image_1`, `product_price`, `Status`, `Date`) 
                                              VALUES ('$product_Title', '$product_Description', '$product_Keyword', '$categories_ID ', '$brands_Id', '$Image1', '$Product_Price', '$product_status', NOW())";
                            
                            $result = mysqli_query($conn, $insertProduct);
                
                       
                            if($result) {
                                echo "<script>alert('Your Product is added'); window.location.href = 'index.php?InsertProduct';</script>";
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>

