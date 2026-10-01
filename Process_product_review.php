<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("User is not logged in.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product'];
    $product_rating = $_POST['product_rating'];
    $product_comment = $_POST['product_comment'];
    $user_id = $_SESSION['user_id']; 
    $review_date = date('Y-m-d H:i:s'); 

    $stmt = $conn->prepare("INSERT INTO review (text, rating, date, user_id, product_id) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sisii", $product_comment, $product_rating, $review_date, $user_id, $product_id);

    if ($stmt->execute()) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();


