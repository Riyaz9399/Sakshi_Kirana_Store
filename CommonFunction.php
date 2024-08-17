<?php
include("db.php");


// Rest of your script



// getting all the products

function getproduct(){
    global $conn;
    // condition to check isset or not
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brands'])){
             $selectcardDetails = "SELECT * FROM `products` order by rand() LIMIT 0,9";
                      $result = mysqli_query($conn,$selectcardDetails);
                     while ($rowdata = mysqli_fetch_assoc($result)){
                        $cardpicture = $rowdata['Image_1'];
                        $product_Id = $rowdata['product_id'];
                        $cardTitle = $rowdata['product_title'];
                        $carddescription = $rowdata['product_description'];
                        $product_Price = $rowdata['product_price'];
                        $product_keyword = $rowdata['product_keyword'];
                        $categories_Id = $rowdata['categories_Id'];
                        $brands_Id = $rowdata['brands_Id'];
                        $Image_1 = $rowdata['Image_1'];
                        // $base64Image = base64_encode($Image_1);
                        $Date = $rowdata['Date'];
                        $Status = $rowdata['Status'];
                        
                        echo "<div class='col-md-4 mb-2' >
                                  <div class='card'>
                                    <img class='card-img-top' src='admin/products_images/$Image_1' alt='$cardTitle'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$cardTitle</h5>
                                     
                                      <p class='card-text fst-italic'> Price: $product_Price/- </p>
                                      <a href='index.php?add_Cart=$product_Id' class='btn btn-primary'>ADD CART</a>
                                      <a href='products_Details.php?product_id=$product_Id' class='btn btn-secondary'>View Details </a>
                                    </div>
                                  </div>
                              </div>";

                    }     
        }
    }
};

    // getting unique categories

    function get_Unique_Categories(){
        global $conn;
        if(isset($_GET['category'])){
            $category_Id = $_GET["category"];
            $selectcardDetails = "SELECT * FROM `products` WHERE `categories_Id` =  '$category_Id' ";
                     $result = mysqli_query($conn,$selectcardDetails);
                     $count = mysqli_num_rows( $result);
                      if($count == 0){
                        echo "<h2 class='text-center text-danger fst-italic'>This Categories products are  is not available </h2>";
                      }

                          while ($rowdata = mysqli_fetch_assoc($result)){
                                $cardpicture = $rowdata['Image_1'];
                                $product_Id = $rowdata['product_Id'];
                                $cardTitle = $rowdata['product_title'];
                                $carddescription = $rowdata['product_description'];
                                $product_Price = $rowdata['product_price'];
                                $product_keyword = $rowdata['product_keyword'];
                                $categories_Id = $rowdata['categories_Id'];
                                $brands_Id = $rowdata['brands_Id'];
                                $Image_1 = $rowdata['Image_1'];
                                // $base64Image = base64_encode($Image_1);
                                $Date = $rowdata['Date'];
                                $Status = $rowdata['Status'];
                                
                                echo "<div class='col-md-4 mb-2' >
                                          <div class='card'>
                                            <img class='card-img-top' src='admin/products_images/$Image_1' alt='$cardTitle'>
                                            <div class='card-body'>
                                              <h5 class='card-title'>$cardTitle</h5>
                                              
                                              <p class='card-text fst-italic'> Price: $product_Price/- </p>
                                              <a href='index.php?add_Cart= $product_Id' class='btn btn-primary'>Add Cart</a>
                                              <a href='#' class='btn btn-secondary'>View Details </a>
                                            </div>
                                          </div>
                                      </div>";
                          }    
                    
         }          

    };

     // getting unique Brands

     function get_Unique_Brands(){
      global $conn;
      if(isset($_GET['brand'])){
          $Brand_Id= $_GET["brand"];
          $selectcardDetails = "SELECT * FROM `products` WHERE `brands_Id` =  '$Brand_Id' ";
                   $result = mysqli_query($conn,$selectcardDetails);
                   $count = mysqli_num_rows( $result);
                    if($count == 0){
                      echo "<h2 class='text-center text-danger fst-italic'>This Brands  is not available yet </h2>";
                    }

                        while ($rowdata = mysqli_fetch_assoc($result)){
                              $cardpicture = $rowdata['Image_1'];
                              $product_Id = $rowdata['product_Id'];
                              $cardTitle = $rowdata['product_title'];
                              $carddescription = $rowdata['product_description'];
                              $product_Price = $rowdata['product_price'];
                              $product_keyword = $rowdata['product_keyword'];
                              $categories_Id = $rowdata['categories_Id'];
                              $brands_Id = $rowdata['brands_Id'];
                              $Image_1 = $rowdata['Image_1'];
                              // $base64Image = base64_encode($Image_1);
                              // $Image_2 = $rowdata['Image_2'];
                              // $Image_3 = $rowdata['Image_3'];
                              $Date = $rowdata['Date'];
                              $Status = $rowdata['Status'];
                              
                              echo "<div class='col-md-4 mb-2' >
                                        <div class='card'>
                                          <img class='card-img-top' src='admin/products_images/$Image_1' alt='$cardTitle'>
                                          <div class='card-body'>
                                            <h5 class='card-title'>$cardTitle</h5>
                                          
                                            <p class='card-text fst-italic'> Price: $product_Price/- </p>
                                            <a href='index.php?add_Cart= $product_Id' class='btn btn-primary'>Add Cart</a>
                                            <a href='#' class='btn btn-secondary'>View Details</a>
                                          </div>
                                        </div>
                                    </div>";
                        }    
                  
       }          

  };

// display all products 
  function getAllproduct(){
    global $conn;
    // condition to check isset or not
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brands'])){
             $selectcardDetails = "SELECT * FROM `products` order by rand() ";
                      $result = mysqli_query($conn,$selectcardDetails);
                     while ($rowdata = mysqli_fetch_assoc($result)){
                        $cardpicture = $rowdata['Image_1'];
                        $product_Id = $rowdata['product_id'];
                        $cardTitle = $rowdata['product_title'];
                        $carddescription = $rowdata['product_description'];
                        $product_Price = $rowdata['product_price'];
                        $product_keyword = $rowdata['product_keyword'];
                        $categories_Id = $rowdata['categories_Id'];
                        $brands_Id = $rowdata['brands_Id'];
                        $Image_1 = $rowdata['Image_1'];
                        // $base64Image = base64_encode($Image_1);
                        $Date = $rowdata['Date'];
                        $Status = $rowdata['Status'];
                        
                        echo "<div class='col-md-4 mb-2' >
                                  <div class='card'>
                                    <img class='card-img-top' src='admin/products_images/$Image_1' alt='$cardTitle'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$cardTitle</h5>
                                      <p class='card-text fst-italic'> Price: $product_Price/- </p>
                                      <a href='index.php?add_Cart=$product_Id' class='btn btn-primary'>ADD CART</a>
                                      <a href='products_Details.php?product_id=$product_Id' class='btn btn-secondary'>View Details </a>
                                    </div>
                                  </div>
                              </div>";

                    }     
        }
    }
};



    // Display all the brands of side navbaar 
    function displayBrands(){
        global $conn ;
        $selectBrands = "SELECT * FROM `brands`";
        $result = mysqli_query($conn, $selectBrands);
        while ($rowdata = mysqli_fetch_assoc($result)){
          $brand_title = $rowdata['brand_title'];
          $brand_id = $rowdata['brands_Id'];
          echo "<li class='nav-item' >
                    <a href='index.php?brand=$brand_id' class='nav-link text-light '><h6>$brand_title</h6></a>
                </li>";
        }
    }


    // Display Categories of side navBarr

    function displayCategories(){
        global $conn;
        $selectcategories = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $selectcategories);
        while ($rowdata = mysqli_fetch_assoc($result)){
          $category_id = $rowdata['categories_ID'];
          $category_title = $rowdata['catedories_title'];
          echo "<li class='nav-item' >
            <a href='index.php?category=$category_id' class='nav-link text-light '><h6>$category_title</h6></a>
        </li>";

        }
    }


 



    // Searching for the products 

    function search_Product(){
        global $conn;
        if(isset($_GET["search"])){
          $search_Data_Product = $_GET["search"];
               $selectcardDetails = "SELECT * FROM `products` WHERE `product_keyword` LIKE '%{$search_Data_Product}%' ";
                      $result = mysqli_query($conn,$selectcardDetails);
                      $count = mysqli_num_rows($result);
                    if($count == 0){
                      echo "<h2 class='text-center text-danger fst-italic'>This product which you are looking for it's not available in my shop </h2>";
                    }
                     while ($rowdata = mysqli_fetch_assoc($result)){
                        $cardpicture = $rowdata['Image_1'];
                        $cardTitle = $rowdata['product_title'];
                        $product_Id = $rowdata['product_id'];
                        $carddescription = $rowdata['product_description'];
                        $product_Price = $rowdata['product_price'];
                        $product_keyword = $rowdata['product_keyword'];
                        $categories_Id = $rowdata['categories_Id'];
                        $brands_Id = $rowdata['brands_Id'];
                        $Image_1 = $rowdata['Image_1'];
                        // $base64Image = base64_encode($Image_1);
                        // $Image_2 = $rowdata['Image_2'];
                        // $Image_3 = $rowdata['Image_3'];
                        $Date = $rowdata['Date'];
                        $Status = $rowdata['Status'];
                        
                        echo "<div class='col-md-4 mb-2' >
                                  <div class='card'>
                                    <img class='card-img-top' src='admin/products_images/$Image_1' alt='$cardTitle'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$cardTitle</h5>
                                       <p class='card-text fst-italic'> Price: $product_Price/- </p>
                                      <a href='index.php?add_Cart=$product_Id' class='btn btn-primary'>Add Cart</a>
                                      <a href='#' class='btn btn-secondary'>View Details</a>
                                    </div>
                                  </div>
                              </div>";

                    }     
          }
    }


    function products_details(){
      global $conn;
    }

      // Getting id address of system 

      function getIPAddress() {
        // whether ip is from the share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        // whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 
    }
    
    //  Carts functionality
    function carts(){
      global $conn;
      if(isset($_GET["add_Cart"]))
      $ip = getIPAddress();  
      $get_product_Id = $_GET['add_Cart'];
      $select_QUERY = "SELECT * FROM `carts_detail` WHERE `Ip_Address` =  '$ip' AND `product_Id` = '$get_product_Id'"; 
      $result = mysqli_query($conn,$select_QUERY);
      $count = mysqli_num_rows( $result);
      
      if($count > 0){
        echo "<script>alert('This item is already present inside the cart');
        window.location.href = 'index.php';
        </script>";
      }else {
        $insert_query = "INSERT INTO `carts_detail`(`product_Id`, `Ip_Address`, `quantity`) VALUES ('$get_product_Id','$ip','1')";
        $result = mysqli_query($conn,$insert_query);
        echo "<script>alert('Item is added in the cart ');  window.location.href = 'index.php'; </script>";
      }
    }


    //  get carts number function

    function number_of_cart_items(){
      global $conn;
      if(isset($_GET["add_Cart"])){
      $ip = getIPAddress();  
      $select_QUERY = "SELECT * FROM `carts_detail` WHERE `Ip_Address` =  '$ip' ";
      $result = mysqli_query($conn,$select_QUERY);
      $carts_items = mysqli_num_rows( $result);
      }else {
        $ip = getIPAddress();  
        $select_QUERY = "SELECT * FROM `carts_detail` WHERE `Ip_Address` =  '$ip' ";
        $result = mysqli_query($conn,$select_QUERY);
        $carts_items = mysqli_num_rows( $result);
      }
      echo $carts_items;
    }

    // Total price function 

    function total_price(){
      global $conn;
      global $totalprice_value;
      $ip = getIPAddress();  
      $cart_Query = "SELECT * FROM `carts_detail` WHERE `Ip_Address` =  '$ip' ";
      $result = mysqli_query($conn, $cart_Query);

       $product_prices = array();

      while ($row = mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $select_Price = "SELECT * FROM  `products` Where `product_Id` = '$product_id'  ";
        $result_product = mysqli_query($conn, $select_Price);
        while ($row_product_price = mysqli_fetch_array($result_product)){
          $product_prices[] = $row_product_price["product_price"];
        }
      }

          // Calculate the total price
          $totalprice_value = array_sum($product_prices);

          echo "$totalprice_value/-";
      
     
    }


    // function get user order Details

    function get_user_order_details(){
      global $conn;
      $username = $_SESSION['username'];
      $get_details = "SELECT * FROM `registration` WHERE `Username` = '$username'";

      $result = mysqli_query($conn,$get_details);
      while($rowdata = mysqli_fetch_array($result)){
        $user_id = $rowdata['id'];
        if (!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['Delete_account'])) {
          $get_orders = "SELECT * FROM `order_table` WHERE `User_ID` = '$user_id'  AND `Order_status` = 'pending'";

          // Debugging: Print query
          // echo "Query: $get_orders<br>";

          $result_order = mysqli_query($conn, $get_orders);

          // Check if the query was successful
          if (!$result_order) {
              echo "Error in query execution: " . mysqli_error($conn) . "<br>";
          } else {
              $row_Count = mysqli_num_rows($result_order);

              // Check if any rows were returned
              if ($row_Count > 0) {
                  // Fetch the result row
                  $row_data = mysqli_fetch_assoc($result_order);

                  // Safely access the Order_status
                  if ($row_data) {
                      $order_status = $row_data["Order_status"];
                      echo "<h3 class='text-center'> You have <span class='text-danger'> $row_Count</span> Pending Orders</h3>";
                  } else {
                      echo "<h3 class='text-center'>You have <span class='text-danger'> 0</span> Pending Orders</h3>";
                  }
              } else {
                  echo "<h3 class='text-center'>You have <span class='text-danger'>0</span> Pending Orders</h3>";
              }
          }
      }
      }
    }
?>