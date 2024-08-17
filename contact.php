<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            flex-grow: 1;
           
        }
        .profile {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
             border-radius:30px;
        }
        .profile:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        .profile img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 5px solid black;
        }
        .profile h2 {
            margin: 10px 0;
        }
        .contact-details, .feedback-form, .review-system {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-details h2, .feedback-form h2, .review-system h2 {
            margin-top: 0;
        }
        .feedback-form form, .review-system form {
            display: flex;
            flex-direction: column;
        }
        .feedback-form form input, .feedback-form form textarea, .review-system form input, .review-system form textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .feedback-form form button, .review-system form button {
            padding: 10px;
            background: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .feedback-form form button:hover, .review-system form button:hover {
            background: #0056b3;
        }
        .footer {
            background: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-secondary">

    <div class="container">
        <div class="profile" style="grid-column: 2 / span 1;">
            <img src="./icons/owner.png" alt="Owner">
            <h2>Owner</h2>
            <h4>Susheel Kushwaha</h4>
            <p>Contact details of the owner.</p>
             <p>Phone no1 : +919301737984</p>
              <p>Phone no2 : +919589484482</p>
        </div>
        <div class="profile" style="grid-column: 1 / span 1;">
            <img src="./icons/developer.png" alt="Developer">
             <h2>Developer</h2>
             <h4>Sakshi Kushwaha</h4>
              <p>Contact details of the developer.</p>
             <p>Phone: +919399079431</p>
             <p>Email: <a href="mailto:sakshikushwaha5460@gmail.com">sakshikushwaha5460@gmail.com</a></p>
             <p> Go to Linkedin : <a href="https://www.linkedin.com/in/sakshi-k-aa267725b/">Linkedin profile</a></p>
        </div>
        <div class="contact-details" style="grid-column: 1 / span 2;">
            <h2>Contact Details</h2>
            <p>Phone : +919301737984</p>
            <p>Address : DALIBABA ,JAMUNA COLONY, DURGA MANDIR ,SATNA (M.P) </p>
            <P>ward no : 38</P>
        </div>
        <div class="review-system mb-4" style="grid-column: 1 / span 2;">
       <h2> Feedback/Review </h2>
    <form id="reviewForm" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        
        <div class="star-rating">
            <label for="star1" title="1 star">
                <input type="radio" id="star1" name="rating" value="1" required>
                ★
            </label>
            <label for="star2" title="2 stars">
                <input type="radio" id="star2" name="rating" value="2">
                ★
            </label>
            <label for="star3" title="3 stars">
                <input type="radio" id="star3" name="rating" value="3">
                ★
            </label>
            <label for="star4" title="4 stars">
                <input type="radio" id="star4" name="rating" value="4">
                ★
            </label>
            <label for="star5" title="5 stars">
                <input type="radio" id="star5" name="rating" value="5">
                ★
            </label>
        </div>
        
        <textarea name="review" placeholder="Your Review" required></textarea>
        <input  type="submit" class="bg-secondary text-light text-center" name="Submit" value="Submit"/>
    </form>
</div>

    </div>
   <div class="container-fluid p-0 bg-dark footer text-dark text-center mt-10">
    <p class="text-center text-light">"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."</p>
        </div>
</body>
</html>

<?php
include("db.php");
// Check if the form is submitted
if (isset($_POST['Submit']))  {

    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Prepare the SQL statement
    $sql = "INSERT INTO `reviews`(`name`, `email`, `rating`, `review`) VALUES ('$name',' $email','$rating','$review')";
    $result = mysqli_query($conn,$sql);

    // Execute the query
        if($result){
            echo "<script>alert('Thanks for your FeedBack!')</script>";
        } else {
        echo "<script>alert('Your Review is not Submitted')</script>";
        }
}
?>



