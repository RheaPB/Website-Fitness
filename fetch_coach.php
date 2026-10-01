<?php
session_start();
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Check if trainer_id is set and valid
if (!isset($_POST['trainer_id']) || !is_numeric($_POST['trainer_id'])) {
    echo json_encode(["error" => "Invalid request. Trainer ID missing or incorrect."]);
    exit();
}

$trainer_id = intval($_POST['trainer_id']);

// Fetch trainer details
$sql = "SELECT * FROM trainer WHERE trainer_id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $trainer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $trainer = $result->fetch_assoc();
        echo json_encode([
            "name" => $trainer['name'],
            "bio" => $trainer['bio'],
            "image" => $trainer['image']
        ]);
    } else {
        echo json_encode(["error" => "Trainer not found."]);
    }
    $stmt->close();
} else {
    echo json_encode(["error" => "Failed to prepare SQL statement."]);
}

$conn->close();
?>
