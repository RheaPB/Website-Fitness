<?php
session_start();
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Revolution</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>

    <header >
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
                <li><a href="Classes.php">Classes</a></li>
                <li><a href="Shop.php">Shop</a></li>
                <li><a href="Review.php">Review</a></li>
                <li><a href="Membership_Page.php">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <?php
            include 'includes/if_login.php';
            ?>
        </nav>
        <div class="hero-content">
            <h1>Build Your Tomorrow</h1>
            <p>We strive to make you the best version of yourself, so the rest of your life can thrive.</p>
            <a href="Membership_Page.php" class="cta-button">Start Today</a>
        </div>
    </header>

   
</body>
</html>


