<?php
include 'includes/Check_login.php'; 

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch membership plans from the database
$sql = "SELECT * FROM membership_type";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Revolution - Membership</title>
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
                <li><a href="Classes.php">Classes</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="Review.php">Review</a></li>
                <li><a href="Membership_Page.php" class="active">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <?php include 'includes/if_login.php'; ?>
        </nav>
    </header>

    <section class="membership-container">
        <h1>DISCOVER YOUR FITNESS MEMBERSHIP</h1>
        <p>Choose from a variety of membership options designed to fit your lifestyle, whether you prefer a month-to-month plan or a yearly commitment. We offer flexible packages for individuals, couples, and families.</p>

        <div class="billing-options">
            <button class="billing-btn active">MONTHLY BILLING</button>
        </div>

        <div class="plans-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='plan'>
                        <h3>" . htmlspecialchars($row['plan_name']) . "</h3>
                        <h2>$" . htmlspecialchars($row['price']) . "</h2>
                        <a href='#' class='subscribe-btn'>SUBSCRIBE</a>
                        <p>" . htmlspecialchars($row['plan_description']) . "</p>
                    </div>
                    ";
                }
            } else {
                echo "<p>No membership plans available.</p>";
            }
            ?>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

</body>
</html>

<?php
// Close database connection at the very end
$conn->close();
?>
