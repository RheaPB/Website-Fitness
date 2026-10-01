<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die('User not logged in.');
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user_id and class_id from POST request
$user_id = $_POST['user_id'] ?? null;
$class_id = $_POST['class_id'] ?? null;

if (!$user_id || !$class_id) {
    die('Invalid user ID or class ID.');
}

// Insert into booking table
$sql = "INSERT INTO booking (user_id, class_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $class_id);

if ($stmt->execute()) {
    echo 'Registration successful!';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>