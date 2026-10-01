<?php
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Policy - Fitness Revolution</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <header>
        <div class="video-container">
            <video autoplay muted loop class="background-video">
              <source src="videoplayback.webm" type="video/webm">
            </video>
        </div>
        <nav>
            <div class="logo-container">
                <img src="image/FR.png" alt="Gym Logo" class="logo-image">
                <span class="brand-name">Fitness Revolution</span>
            </div>
            <ul class="choice">
                <li><a href="Homepage.php" class="active">Homepage</a></li>
                <li><a href="#">Coaches</a></li>
                <li><a href="Shop.php">Shop</a></li>
                <li><a href="Review.php">Review</a></li>
                <li><a href="Membership_Page.php">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <?php
            include 'includes/if_login.php';
            ?>
        </nav>
        <div class="hero-content">
            <h1>Return Policy</h1>
            <p>We want you to be completely satisfied with your purchase. Please read our return policy below.</p>
        </div>
    </header>

    <main>
        <section class="policy-section">
            <h2>Our Return Policy</h2>
            <p>At Fitness Revolution, we strive to ensure our customers are happy with their purchases. Here are the key points of our return policy:</p>
            <ul>
            <li><strong>Return Policy:</strong> No return on edible products.</li>
                <li><strong>Return Policy:</strong> You have 30 days from the date of purchase to return clothing items.</li>
                <li><strong>Condition:</strong> Clothing/Equipment items must be returned in their original condition, unused, and with all tags attached.</li>
                <li><strong>Proof of Purchase:</strong> A receipt or proof of purchase is required for all returns.</li>
                <li><strong>Refund Process:</strong> Once we receive your return, we will process your refund within 7-10 business days.</li>
                <li><strong>Shipping Costs:</strong> Shipping costs for returns are the responsibility of the customer unless the item is defective.</li>
              
            </ul>
         
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Fitness Revolution. All rights reserved.</p>
    </footer>

</body>
</html>
