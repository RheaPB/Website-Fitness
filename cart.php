<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['remove'])) {
    $remove_index = intval($_GET['remove']);
    if (isset($_SESSION['cart'][$remove_index])) {
        unset($_SESSION['cart'][$remove_index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}


function calculate_total_price() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Fitness Revolution</title>
    <link rel="stylesheet" href="style1.css">
</head>
<header>
        <nav>
            <div class="logo-container">
                <img src="image/FR.png" alt="Gym Logo" class="logo-image">
                <span class="brand-name">Fitness Revolution</span>
            </div>
            <ul class="choice">
                <li><a href="Homepage.php">Homepage</a></li>
                <li><a href="Classes.php">Classes</a></li>
                <li><a href="shop.php" class="active">Shop</a></li>
                <li><a href="Review.php">Review</a></li>
                <li><a href="Membership_Page.php">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <a href="#" class="join-btn">Join now</a>
        </nav>
 </header>
<body class ="cart-back">

    <div class="small-container">
        <h2 class = "head" >Your Shopping Cart</h2>

        <?php if (!empty($_SESSION['cart'])): ?>
            <div id="cartItems">
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <div class="cart-item">
                        <h4><?php echo htmlspecialchars($item['name']); ?> (Size: <?php echo htmlspecialchars($item['size']); ?>)</h4>
                        <p>Quantity: <?php echo $item['quantity']; ?></p>
                        <p>Price: Rs <?php echo $item['price']; ?></p>
                        <a href="cart.php?remove=<?php echo $index; ?>" class="remove-btn">Remove</a>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>

            <div id="totalPrice">
                <h3>Total Price: Rs <?php echo calculate_total_price(); ?></h3>
            </div>

            <a href="products.php" class="btn">Continue Shopping</a>
            <a href="checkout.php" class="checkout-btn">Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
            <a href="shop.php" class="btn">Start Shopping</a>
        <?php endif; ?>
    </div>

    <?php
    include 'includes/footer.php'
    ?>

</body>
</html>
