<?php
session_start();
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Fitness Revolution Store</title>
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
                <li><a href="shop.php" class="active">Shop</a></li>
                <li><a href="Review.php">Review</a></li>
                <li><a href="Membership_Page.php">Membership</a></li>
                <li><a href="#">Free trial</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="cart.php"><img src="images/cartlink.jpg" width="30px" height="30px" alt="Cart"></a></li>
            </ul>
            <?php
            include 'includes/if_login.php';
            ?>
        </nav>
    </header>

    <div class="small-container1">
        <div class="row row-2">
            <div class="product-filter">
                <label for="category">Choose a category:</label>
                <select id="category" name="category" onchange="filterProductsByCategory()">
                    <option value="all">All Products</option>
                    <option value="supplements">Supplements</option>
                    <option value="equipment">Equipment</option>
                    <option value="clothing">Clothing</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>
            
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search for products..." onkeyup="searchProducts()">
                <button class="search-btn" onclick="searchProducts()">Search</button>
                <select id="sortSelect" onchange="sortProducts()">
                    <option value="default">Default Sorting</option>
                    <option value="price">Sort by price</option>
                </select>
            </div>
        </div>

        <div class="row" id="product-container">
            <div class="col-4" data-price="1200" data-category="supplements">
                <a href="productDetails.php?id=14">
                    <img src="image/glutamine.jpg" alt="L-Glutamine Powder (500g)">
                    <h4>L-Glutamine Powder (500g)</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Rs 1200</p>
                </a>
            </div>

               <!-- Product 2 -->
        <div class="col-4" data-price="1800" data-category="supplements">
            <a href="productDetails.php?id=15">
                <img src="image\whey_isolate.jpg" alt="Whey Protein Isolate (2 lbs)">
                <h4>Whey Protein Isolate (2 lbs)</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Rs 1800</p>
            </a>
        </div>

        <!-- Product 3 -->
        <div class="col-4" data-price="550" data-category="supplements">
            <a href="productDetails.php?id=3">
                <img src="image\biotech-multivitamin-for-men.jpg" alt="Multivitamin (30-60 tablets)">
                <h4>Multivitamin (30-60 tablets)</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Rs 550</p>
            </a>
        </div>

        <!-- Product 4 -->
        <div class="col-4" data-price="1200" data-category="supplements">
            <a href="productDetails.php?id=4">
                <img src="image\wheyprotein2lbs.jpg" alt="Whey Protein Powder 2 lbs">
                <h4>Whey Protein Powder 2 lbs</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 1200</p>
            </a>
        </div>

        <!-- Product 5 -->
        <div class="col-4" data-price="1500" data-category="supplements">
            <a href="productDetails.php?id=5">
                <img src="image\casein.webp" alt="Casein Protein 2 lbs">
                <h4>Casein Protein 2 lbs</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 1500</p>
            </a>
        </div>

        <!-- Product 6 -->
        <div class="col-4" data-price="2200" data-category="supplements">
            <a href="productDetails.php?id=6">
                <img src="image\bcaa.webp" alt="BCAA (Branched-Chain Amino Acids) 30 servings
                ">
                <h4>BCAA (Branched-Chain Amino Acids) 30 servings
                </h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 2200</p>
            </a>
        </div>

        <!-- Product 7 -->
        <div class="col-4" data-price="850" data-category="supplements">
            <a href="productDetails.php?id=7">
                <img src="images\creat.jpeg" alt="Creatine">
                <h4>Creatine Monohydrate 300g</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 850</p>
            </a>
        </div>

        <!-- Product 8 -->
        <div class="col-4" data-price="1600" data-category="supplements">
            <a href="productDetails.php?id=8">
                <img src="image\pre-workout.jpg" alt=" Pre-Workout Supplement (30 servings)">
                <h4> Pre-Workout Supplement (30 servings)</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 1600</p>
            </a>
        </div>

        <!-- Product 9 -->
        <div class="col-4" data-price="1500" data-category="supplements">
            <a href="productDetails.php?id=9">
                <img src="image\proteinbars.webp" alt="Protein Bars (12 bars)">
                <h4>Protein Bars (12 bars)</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 1500</p>
            </a>
        </div>

        <!-- Product 10 -->
        <div class="col-4" data-price="3500" data-category="supplements">
            <a href="productDetails.php?id=10">
                <img src="image\Ultramassgainer.jpg" alt="Ultra Mass Gainer">
                <h4>Ultra Mass Gainer</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 3500</p>
            </a>
        </div>

        <!-- Product 11 -->
        <div class="col-4" data-price="4000" data-category="supplements">
            <a href="productDetails.php?id=12">
                <img src="image\Bulkup.webp" alt="Bulk-Up Blend">
                <h4>Bulk-Up Blend</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 4000</p>
            </a>
        </div>

        <div class="col-4" data-price="900" data-category="supplements">
            <a href="productDetails.php?id=13">
                <img src="image\Omega3.avif" alt="Omega-3 Fish Oil (120 capsules)">
                <h4>Omega-3 Fish Oil (120 capsules)</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rs 900</p>
            </a>
        </div>


        </div>

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>

    <?php
    include 'includes/footer.php'
    ?>

    <script>
        function sortProducts() {
            const container = document.getElementById('product-container');
            const products = Array.from(container.children);
            const sortOption = document.getElementById('sortSelect').value;

            products.sort((a, b) => {
                let aValue, bValue;

                if (sortOption === 'price') {
                    aValue = parseFloat(a.getAttribute('data-price'));
                    bValue = parseFloat(b.getAttribute('data-price'));
                    return aValue - bValue;
                }
                return 0;
            });

            container.innerHTML = '';
            products.forEach(product => container.appendChild(product));
        }

        function searchProducts() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const products = document.querySelectorAll('.col-4');

            products.forEach(product => {
                const productName = product.querySelector('h4').innerText.toLowerCase();
                if (productName.includes(input)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none'; 
                }
            });
        }

        function filterProductsByCategory() {
            const selectedCategory = document.getElementById('category').value;
            const products = document.querySelectorAll('.col-4');

            products.forEach(product => {
                const productCategory = product.getAttribute('data-category');
                if (selectedCategory === 'all' || productCategory === selectedCategory) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none'; 
                }
            });
        }
    </script>
</body>
</html>

