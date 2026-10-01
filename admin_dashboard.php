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

// Handle review actions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_changes'])) {
    foreach ($_POST['reviews'] as $review_id => $action) {
        $stmt = $conn->prepare("UPDATE review SET status = ? WHERE review_id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("si", $action, $review_id);
        $stmt->execute();
        $stmt->close();
    }
}

$sql = "SELECT r.review_id, u.name, r.rating, r.text, r.date, r.status
        FROM review r
        JOIN user u ON r.user_id = u.user_id
        WHERE r.status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Reviews</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Manage Reviews</h1>
    <form method="POST">
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['rating']); ?></td>
                        <td><?php echo htmlspecialchars($row['text']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td>
                            <input type="radio" name="reviews[<?php echo $row['review_id']; ?>]" value="accepted"> Accept
                            <input type="radio" name="reviews[<?php echo $row['review_id']; ?>]" value="banned"> Ban
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button type="submit" name="save_changes">Save Changes</button>
    </form>
</body>
</html>
