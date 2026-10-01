<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function calculate_total_price() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

$total_price = calculate_total_price();


$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$user = null;


if ($logged_in && isset($_SESSION['user']) && is_array($_SESSION['user'])) {
    $user = htmlspecialchars($_SESSION['user']['name']);
}
?>

<?php
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Fitness Revolution</title>
    <link rel="stylesheet" href="style1.css">
    <script>
        function checkLogin(event) {
            <?php if (!$logged_in): ?>
                event.preventDefault(); 
                document.getElementById('login-popup').style.display = 'block'; 
            <?php endif; ?>
        }

        function closePopup() {
            document.getElementById('login-popup').style.display = 'none'; 
        }
    </script>
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
            <?php
            include 'includes/if_login.php';
            ?>
        </nav>
    </header>
<body class="checkout-body">

    <div class="checkout-container">
        <div class="form-section">
            <form action="process_checkout.php" method="POST" onsubmit="checkLogin(event)">
                <div class="credit-card-info">
                    <h2>Payment</h2>
                    <div class="input-group">
                        <label for="card-name">Name on Card</label>
                        <input type="text" id="card-name" name="card_name" required>
                    </div>

                    <div class="input-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" name="card_number" required>
                    </div>

                    <div class="input-group">
                        <label for="card-expiry">Expiration Date (MM/YY)</label>
                        <input type="text" id="card-expiry" name="card_expiry" required>
                    </div>

                    <div class="input-group">
                        <label for="card-cvc">CVC</label>
                        <input type="text" id="card-cvc" name="card_cvc" required>
                    </div>
                </div>

                <button type="submit" class="btn">Proceed to Payment</button>
            </form>
        </div>

        <div class="summary-section">
            <h2>Order Summary</h2>
            <div id="cart-items">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="summary-item">
                            <span><?php echo htmlspecialchars($item['name']); ?>)</span>
                            <span>Rs <?php echo htmlspecialchars($item['price']); ?> x <?php echo $item['quantity']; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>

            <hr>

            <div class="summary-item summary-total">
                <span>Total</span>
                <span>Rs <?php echo $total_price; ?></span> 
            </div>
        </div>
    </div>


    <div id="login-popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0, 0, 0, 0.5); z-index:1000;">
        <div style="background-color:white; padding:20px; margin:100px auto; width:300px; text-align:center;">
            <h3>Please Log In</h3>
            <p>You must log in to proceed with the payment.</p>
            <button onclick="closePopup()">Close</button>
        </div>
    </div>

    <script>
        window.onload = function() {
        document.getElementById("registrationForm").reset();
        };
    </script>

    <?php
    include 'includes/footer.php'
    ?>

</body>
</html>


