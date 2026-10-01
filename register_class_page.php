<?php
session_start();
include 'includes/Check_login.php';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$class_id = $_GET['class_id'] ?? null;
if (!$class_id || !is_numeric($class_id)) {
    die("Invalid class ID.");
}

// Check if class exists
$sql = "SELECT * FROM optionalclass WHERE class_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $class_id);
$stmt->execute();
$result = $stmt->get_result();
$class = $result->fetch_assoc();
if (!$class) {
    die("Class not found.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Class</title>
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

<section class="register-container">
    <h1>Register for Class: <?php echo htmlspecialchars($class['class_name']); ?></h1>
    
    <!-- Button to start registration -->
    <button id="registerButton" class="register-button">Register for Class</button>

    <!-- Popup for login -->
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <h2>Please Log in to Register</h2>
            <button id="loginButton">Login</button>
        </div>
    </div>

    <!-- Popup for entering name -->
    <div id="namePopup" class="popup">
        <div class="popup-content">
            <h2>Enter Your Name</h2>
            <input type="text" id="userName" placeholder="Enter your name" />
            <button id="submitName">Submit</button>
        </div>
    </div>
</section>

    <?php include 'includes/footer.php'; ?>

    <script>
        document.getElementById('registerButton').addEventListener('click', function() {
            <?php if (isset($_SESSION['user_id'])): ?>
                // User is logged in, show name popup
                document.getElementById('namePopup').style.display = 'flex';
            <?php else: ?>
                // User is not logged in, show login popup
                document.getElementById('loginPopup').style.display = 'flex';
            <?php endif; ?>
        });

        document.getElementById('loginButton').addEventListener('click', function() {
            window.location.href = 'login.php'; // Redirect to login page
        });

        document.getElementById('submitName').addEventListener('click', function() {
            const userName = document.getElementById('userName').value;
            if (userName) {
                // Send data to server using AJAX
                const classId = <?php echo $class_id; ?>;
                const userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;

                if (userId) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'register_class.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            alert('Registration successful!');
                            document.getElementById('namePopup').style.display = 'none';
                        } else {
                            alert('Error: ' + xhr.responseText);
                        }
                    };
                    xhr.send(`user_id=${userId}&class_id=${classId}`);
                } else {
                    alert('User ID not found. Please log in again.');
                }
            } else {
                alert('Please enter your name.');
            }
        });

        // Close popups when clicking outside of them
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('popup')) {
                event.target.style.display = 'none';
            }
        });
    </script>
</body>
</html>