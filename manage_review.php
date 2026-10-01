<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review_id = $_POST['review_id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        $stmt = $conn->prepare("UPDATE review SET status = 'accepted' WHERE review_id = ?");
    } else if ($action == 'ban') {
        $stmt = $conn->prepare("UPDATE review SET status = 'banned' WHERE review_id = ?");
    }

    if ($stmt) {
        $stmt->bind_param("i", $review_id);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: admin_dashboard.php');
exit();
?>
