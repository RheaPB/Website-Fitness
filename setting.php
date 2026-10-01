<?php
session_start(); 

$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$user = null;

if ($logged_in && isset($_SESSION['user']) && is_array($_SESSION['user'])) {
    $user = $_SESSION['user']; 
}


if (!$user) {
    header('Location: login.php');
    exit();
}


$success_message = '';
$error_message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
    $conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    if ($action == 'rename') {
        $new_name = htmlspecialchars(trim($_POST['new_name']));
        if (!empty($new_name)) {
            $stmt = $conn->prepare("UPDATE user SET name = ? WHERE user_id = ?");
            $stmt->bind_param("si", $new_name, $user['user_id']);
            if ($stmt->execute()) {
                $success_message = "Name updated successfully!";
                $_SESSION['user']['name'] = $new_name; 
            } else {
                $error_message = "Failed to update name.";
            }
            $stmt->close();
        } else {
            $error_message = "Name cannot be empty.";
        }
    } elseif ($action == 'change_email') {
        $new_email = htmlspecialchars(trim($_POST['new_email']));
        if (filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("UPDATE user SET email = ? WHERE user_id = ?");
            $stmt->bind_param("si", $new_email, $user['user_id']);
            if ($stmt->execute()) {
                $success_message = "Email updated successfully!";
                $_SESSION['user']['email'] = $new_email; 
            } else {
                $error_message = "Failed to update email.";
            }
            $stmt->close();
        } else {
            $error_message = "Invalid email format.";
        }
    } elseif ($action == 'change_password') {
        $new_password = htmlspecialchars(trim($_POST['new_password']));
        $isValid = true;

        
        if (empty($new_password)) {
            $error_message .= "Password is required.<br>";
            $isValid = false;
        } elseif (strlen($new_password) < 6) {
            $error_message .= "Password must be at least 6 characters long.<br>";
            $isValid = false;
        }

        if ($isValid) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE user SET password = ? WHERE user_id = ?");
            $stmt->bind_param("si", $hashed_password, $user['user_id']);
            if ($stmt->execute()) {
                $success_message = "Password updated successfully!";
            } else {
                $error_message = "Failed to update password.";
            }
            $stmt->close();
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Fitness Revolution</title>
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
            <?php if ($logged_in): ?>
                <div class="user-info" onclick="window.location.href='setting.php'">
                    <img src="image/login_logo.png" alt="User Icon" class="user-icon"> 
                    <span class="user-name"><?php echo htmlspecialchars($user['name']); ?></span>
                </div>
            <?php else: ?>
                <a href="login.php" class="join-btn">Join now</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="setting_writings">
        <h1>Settings</h1>
        <p>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</p>

        <?php if ($success_message): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="post">
            <h2>Rename</h2>
            <input type="text" name="new_name" placeholder="New Name" required>
            <input type="hidden" name="action" value="rename">
            <button type="submit">Update Name</button>
        </form>

        <form method="post">
            <h2>Change Email</h2>
            <input type="email" name="new_email" placeholder="New Email" required>
            <input type="hidden" name="action" value="change_email">
            <button type="submit">Update Email</button>
        </form>

        <form method="post">
            <h2>Change Password</h2>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="hidden" name="action" value="change_password">
            <button type="submit">Update Password</button>
        </form>

        <a href="logout.php" class="logout-btn">Logout</a>
    </main>
</body>
</html>

