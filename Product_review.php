<?php
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT product_id, name FROM product";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Product</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateProductForm() {
            var productComment = document.getElementById("product_comment").value;
            if (productComment.trim() === "") {
                alert("Please write a comment about the product.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="review-container">
        <h1>PLEASE REVIEW THE PRODUCT</h1>
        <h2>GIVE GENUINE FEEDBACK</h2>

        <form action="Process_product_review.php" method="POST" class="review-form" onsubmit="return validateProductForm()">
            <fieldset class="personal-details">
                <legend>Personal Details</legend>
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
            </fieldset>

            <fieldset class="product-details">
                <legend>Product Feedback</legend>
                <div class="input-group">
                    <label for="product">Product:</label>
                    <select id="product" name="product">
                        <option value="" disabled selected>Select a product</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row["product_id"]) . '">' . htmlspecialchars($row["name"]) . '</option>';
                            }
                        } else {
                            echo '<option value="">No products available</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="product_rating">Rate Product (1 to 10):</label>
                    <input type="number" id="product_rating" name="product_rating" min="1" max="10" required>
                </div>
                <div class="input-group">
                    <label for="product_comment">Comment on Product:</label>
                    <textarea id="product_comment" name="product_comment" rows="5"></textarea>
                </div>
            </fieldset>
            <div class="form-actions">
                <button type="submit" class="submit-btn">Submit</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>

