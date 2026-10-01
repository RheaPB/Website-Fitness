<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all classes
$sql = "SELECT * FROM optionalclass";
$result = $conn->query($sql);

include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Classes</title>
    <link rel="stylesheet" href="style1.css">
   
</head>
<body>
<header>
    <nav>
        <div class="logo-container">
            <img src="image/FR.png" alt="Gym Logo" class="logo-image">
            <span class="brand-name">Fitness Revolution</span>
        </div>
        <ul class="choice">
            <li><a href="Homepage.php">Homepage</a></li>
            <li><a href="Classes.php" class="active">Classes</a></li>
            <li><a href="Shop.php">Shop</a></li>
            <li><a href="Review.php">Review</a></li>
            <li><a href="Membership_Page.php">Membership</a></li>
            <li><a href="">Free trial</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <?php include 'includes/if_login.php'; ?>
    </nav>
</header>

<section class="classes">
    <div class="classes-header">
        <h2>Our Classes</h2>
        <p>Discover our wide range of fitness classes designed for every need.</p>
        <a href="trainer.php" class="coaches-button1">Meet Our Coaches</a>
    </div>
    <div class="class-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='class-card'>
                    <img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['class_name']) . "'>
                    <div class='class-info'>
                        <h3>" . htmlspecialchars($row['class_name']) . "</h3>
                        <p>" . htmlspecialchars($row['description']) . "</p>
                        <h4>Time Schedule: " . htmlspecialchars($row['time']) . "</h4>
                        <p class='price'>Price: $" . htmlspecialchars($row['price']) . "</p>
                        <a href='ClassDetails.php?class_id=" . htmlspecialchars($row['class_id']) . "' class='read-more'>Read more</a>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<p class='no-classes'>No classes found.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>
