<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginType = $_POST['login_type'];

    $conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    if ($loginType === 'user') {
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    } elseif ($loginType === 'admin') {
        
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        if ($loginType === 'user') {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user'] = $user;
            $_SESSION['role'] = 'user';
            $_SESSION['logged_in'] = true;
            $success_message = "User login successful! Welcome " . $user['name'];
            header('Location: Homepage.php'); 
            exit(); 
        } elseif ($loginType === 'admin') {
            $_SESSION['admin_id'] = $user['admin_id'];
            $_SESSION['admin'] = $user;
            $_SESSION['role'] = 'admin';
            $_SESSION['logged_in'] = true;
            $success_message = "Admin login successful! Welcome " . $user['name'];
            header('Location: admin_dashboard.php'); 
            exit(); 
        }
    } else {
        $error_message = "Invalid email or password!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Fitness Revolution</title>
    <link rel="stylesheet" href="Style.css">
    <script>
        function redirectToHome() {
            setTimeout(function() {
                window.location.href = 'Homepage.php';
            }, 2000); 
        }
        
        function redirectToAdminDashboard() {
            setTimeout(function() {
                window.location.href = 'admin_dashboard.php';
            }, 2000); 
        }
    </script>
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
                <li><a href="Membership_Page.php">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="login-container">
        <div>
            <img src="image/login.webp" alt="login background" class="pricing-image">
        </div>
        <div class="signup-form">
            <h1>Login to Your Account</h1>

            <?php if (isset($success_message)): ?>
                <p class="success-message"><?php echo $success_message; ?></p>
                <?php if ($_POST['login_type'] === 'admin'): ?>
                    <script>redirectToAdminDashboard();</script>
                <?php else: ?>
                    <script>redirectToHome();</script>
                <?php endif; ?>
            <?php elseif (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form action="login.php" method="post" id="loginForm">
                <div class="form-field">
                    <input type="email" id="email-address" name="email" placeholder="Email" required>
                </div>
                <div class="form-field">
                    <input type="password" id="user-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-field">
                    <label for="login_type">Login as:</label>
                    <select name="login_type" id="login_type" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="submit-btn">Login</button>
                <p class="signin-link">Don't have an account? <a href="Registration.php">Sign Up</a></p>
            </form>
            <script>
                window.onload = function() {
                    document.getElementById("loginForm").reset();
                };
            </script>
        </div>
    </main>
    
</body>
</html>
