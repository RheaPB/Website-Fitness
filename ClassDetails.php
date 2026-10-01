<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize the input
if (!isset($_GET['class_id']) || !is_numeric($_GET['class_id'])) {
    die("Invalid request. Class ID is missing or invalid.");
}
$class_id = intval($_GET['class_id']);

// Fetch the selected class details with trainer's name
$sql = "SELECT optionalclass.*, trainer.name AS trainer_name 
        FROM optionalclass 
        JOIN trainer ON optionalclass.trainer_id = trainer.trainer_id 
        WHERE optionalclass.class_id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $class = $result->fetch_assoc();
    } else {
        die("Class not found.");
    }
    $stmt->close();
} else {
    die("Failed to prepare the SQL statement.");
}

// Fetch other available classes for the sidebar
$other_classes = [];
$sql = "SELECT class_id, class_name, image FROM optionalclass WHERE class_id != ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $other_classes[] = $row;
    }
    $stmt->close();
}
$conn->close();

include 'includes/Check_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($class['class_name']); ?> - Class Details</title>
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
            <li><a href="trainer.php">Coaches</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <?php include 'includes/if_login.php'; ?>
    </nav>
</header>

<section class="main-container">
    <!-- Class Details Section -->
    <div class="class-details">
        <img src="<?php echo htmlspecialchars($class['image']); ?>" alt="<?php echo htmlspecialchars($class['class_name']); ?>" class="class-image">
        <h1 class="class-title"><?php echo htmlspecialchars($class['class_name']); ?></h1>
        <p class="class-description"><?php echo nl2br(htmlspecialchars($class['description'])); ?></p>
        <p class="class-trainer">Trainer: <?php echo htmlspecialchars($class['trainer_name']); ?></p>
        <p class="class-price">Price: $<?php echo htmlspecialchars($class['price']); ?></p>

        <!-- Buttons for navigation and registration -->
        <div class="class-buttons">
            <!-- Back to Classes Button -->
<a href="Classes.php" class="back-arrow">
    <span>&larr;</span> 
</a>

            <a href="register_class_page.php?class_id=<?php echo $class['class_id']; ?>" class="register-button">Register for Class</a>
        </div>
    </div>

    <!-- Sidebar Section -->
    <aside class="sidebar">
        <h2>Other Classes</h2>
        <div class="sidebar-scroll-container">
            <ul>
                <?php foreach ($other_classes as $other_class) : ?>
                    <li class="sidebar-class">
                        <a href="ClassDetails.php?class_id=<?php echo $other_class['class_id']; ?>" class="sidebar-link">
                            <img src="<?php echo htmlspecialchars($other_class['image']); ?>" alt="<?php echo htmlspecialchars($other_class['class_name']); ?>" class="sidebar-image">
                            <span class="sidebar-title"><?php echo htmlspecialchars($other_class['class_name']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </aside>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>
