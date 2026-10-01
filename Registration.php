<?php
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phonenumber = htmlspecialchars(trim($_POST['phonenumber']));
    $password = htmlspecialchars(trim($_POST['password']));

    
    $isValid = true;


    if (empty($name)) {
        $error_message .= "Name is required.<br>";
        $isValid = false;
    }

  
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message .= "Valid email is required.<br>";
        $isValid = false;
    }

    if (empty($phonenumber) || !preg_match('/^[0-9]{8}$/', $phonenumber)) {
        $error_message .= "Valid phone number is required (10-15 digits).<br>";
        $isValid = false;
    }


    if (empty($password)) {
        $error_message .= "Password is required.<br>";
        $isValid = false;
    } elseif (strlen($password) < 6) {
        $error_message .= "Password must be at least 6 characters long.<br>";
        $isValid = false;
    }

    if ($isValid) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

     
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO user (name, email, phonenumber, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssis", $name, $email, $phonenumber, $hashed_password);

            
            if ($stmt->execute()) {
                $success_message = "You have successfully signed up!";
            } else {
                $error_message .= "There was an error during signup. Please try again.<br>";
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Fitness Revolution</title>
    <link rel="stylesheet" href="Style.css">
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
                <li><a href="#">Coaches</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="Review.html">Review</a></li>
                <li><a href="Membership_Page.html">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="register-container"></main>
    <div>
        <img src="image/login.webp" alt="pricing background" class="pricing-image">
    </div>

    <div class="signup-form">
        <h1>Register Your Account</h1>

        
        <?php if ($success_message): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="Registration.php" method="post" id="registrationForm">
            <div class="form-field">
                <input type="text" id="full-name" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-field">
                <input type="email" id="email-address" name="email" placeholder="Email" required>
            </div>
            <div class="form-field">
                <input type="number" id="phonenumber" name="phonenumber" placeholder="Phone Number" required>
            </div>
            <div class="form-field">
                <input type="password" id="user-password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="submit-btn">Sign Up</button>
            <p class="signin-link">Already a member? <a href="login.php">Log in</a></p>
        </form>

        <script>
            window.onload = function() {
                document.getElementById("registrationForm").reset();
            };
        </script>
    </div>
    </main>
</body>
</html>
