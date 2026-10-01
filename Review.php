<?php
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Review - Fitness Revolution</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
        <div class="logo-container">
                <img src="image/FR.png" alt="Gym Logo" class="logo-image">
                <span class="brand-name">Fitness Revolution</span>
            </div>
            <ul class="choice">
                <li><a href="Homepage.php" >Homepage</a></li>
                <li><a href="#">Coaches</a></li>
                <li><a href="Shop.php">Shop</a></li>
                <li><a href="Review.php" class="active">Review</a></li>
                <li><a href="Membership_Page.php">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <?php
            include 'includes/if_login.php';
            ?>
     
        </nav>
    </header>

    <div>
        <section class="review-section">
            <h1>Your Feedback Matters!</h1>
            <p>At Fitness Revolution, we value your thoughts and experiences. Whether it&#39;s about our gym or the products you&#39;ve used, your review helps us improve and provide the best possible service. Share your feedback to make a difference today!</p>

            <div class="review-buttons">
                <a href="Gym_review.php" class="review-btn">Review the Gym</a>
                <a href="Product_review.php" class="review-btn">Review a Product</a>
            </div>
        </section>
    </div>
</body>
</html>
