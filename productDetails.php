<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT name, image, price, description FROM product WHERE product_id = $product_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found.";
    exit;
}

if (isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']);
    $size = isset($_POST['size']) ? $_POST['size'] : null;
    $product_price = $product['price'];
    $product_name = $product['name'];

    $cart_item = array(
        'product_id' => $product_id,
        'name' => $product_name,
        'size' => $size,
        'price' => $product_price,
        'quantity' => $quantity
    );

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $product_id && $item['size'] == $size) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $cart_item;
    }

    header("Location: cart.php");
    exit;
}

$review_sql = "
    SELECT u.name, r.rating, r.text, r.date
    FROM review r
    JOIN user u ON r.user_id = u.user_id
    WHERE r.product_id = $product_id AND r.status = 'accepted'";
$reviews = $conn->query($review_sql);
?>
<?php
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Fitness Revolution</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
                <li><a href="Shop.php" class="active">Shop</a></li>
                <li><a href="Review.html">Review</a></li>
                <li><a href="Membership_Page.html">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
                <a href="cart.php"><img src="images/cartlink.jpg" width="30px" height="30px"></a>
            </ul>
            <?php
            include 'includes/if_login.php';
            ?>
        </nav>
    </header>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" width="100%" id="ProductImg">
            </div>
            <div class="col-2">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <h4>Rs <?php echo htmlspecialchars($product['price']); ?></h4>
                <form method="POST" action="">
                    <br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required />
                    <br>
                    <button type="submit" name="add_to_cart" class="btn">Add To Cart</button>
                </form>
                <form method="GET" action="review.php">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                    <button type="submit" class="btn">Review Product</button>
                </form>
                <h3>Product Details <i class="fas fa-indent"></i></h3>
                <br>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
            </div>
        </div>
    </div>

    <div class="review-section">
        <h3>Customer Reviews</h3>
        <div class="review-container">
            <?php if ($reviews->num_rows > 0): ?>
                <?php while ($review = $reviews->fetch_assoc()): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <div class="review-info">
                                <h4><?php echo htmlspecialchars($review['name']); ?></h4>
                                <span class="review-rating"><?php echo htmlspecialchars($review['rating']); ?> ★</span>
                            </div>
                        </div>
                        <p class="review-text"><?php echo htmlspecialchars($review['text']); ?></p>
                        <small class="review-date"><?php echo htmlspecialchars($review['date']); ?></small>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No reviews yet. Be the first to review!</p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    include 'includes/footer.php'
    ?>
</body>
</html>
