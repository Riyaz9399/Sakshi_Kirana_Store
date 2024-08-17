<?php
include("../db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .images {
        height: 100px;
        width: 100px;
    }
    </style>
</head>
<body>
    <h1 class="text-center text-success">All Users</h1>
    <div class="container text-center table-responsive">
    <?php 
    $number = 0;
    $SearchQuery = "SELECT * FROM `registration`";
    $result = mysqli_query($conn, $SearchQuery);
    if(mysqli_num_rows($result) > 0) {
    ?>
    <table class="table table-dark table-striped table-bordered table-hover mb-7 mt-4">
        <tr>
        <th>Serial No.</th>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>User IP Address</th>
        <th>User Address</th>
        <th>Phone Number</th>
        <th>Zip Code</th>
        <th>Delete</th>
        </tr>
        <?php 
        while($rowdata = mysqli_fetch_assoc($result)){
            $ID = $rowdata['id'];
            $Username = $rowdata['Username'];
            $Email = $rowdata['email'];
            $Password = $rowdata['password'];
            $User_Ip_Address = $rowdata['user_Ip_address'];
            $User_Address = $rowdata['user_address'];
            $Phone_Number = $rowdata['PHone_number'];
            $Zip_Code = $rowdata['Zip_code'];
            $number++;
            echo "<tr class='text-center'>
                <td>$number</td>
                <td>$ID</td>
                <td>$Username</td>
                <td>$Email</td>
                <td>$User_Ip_Address</td>
                <td>$User_Address</td>
                <td>$Phone_Number</td>
                <td>$Zip_Code</td>
                <td><a href='index.php?Delete_User=$ID' class='text-light'><i class='bi bi-trash'></i></a></td>
            </tr>";
        }
        ?>
    </table>
    <?php 
    } else {
        echo "<h1 class='text-center bg-warning font-weight-bold'>No users yet</h1>";
    }
    ?>
    </div>
</body>
</html>
