<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in. Redirecting to checkout...";
    header("Location: checkout.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Cart is empty. No items to purchase.");
}

$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    if (isset($item['price']) && isset($item['quantity'])) {
        $total_price += floatval($item['price']) * intval($item['quantity']);
    }
}

$total_price = number_format($total_price, 2, '.', '');

$date = date('Y-m-d');

$stmt = $conn->prepare("INSERT INTO order_table (order_date,total_amount,user_id) VALUES (?, ?, ?)");
$stmt->bind_param("sdi", $date, $total_price, $user_id);

if ($stmt->execute()) {
    unset($_SESSION['cart']);
    echo "<h1>Payment is done!</h1>";
    echo "<p>Redirecting to the shop page...</p>";

    echo "<script>
            setTimeout(function() {
                window.location.href = 'shop.php'; // Redirect to shop page after 3 seconds
            }, 3000);
          </script>";
   
} else {
    echo "Execution failed: " . $stmt->error;

}

$stmt->close();
$conn->close();


















