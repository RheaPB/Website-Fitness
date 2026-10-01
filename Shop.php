<?php
include 'includes/Check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Fitness Revolution Shop</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body> 
    <header>
        <nav>
            <div class="logo-container">
              <img src="image\FR.png" alt="Gym Logo" class="logo-image">
              <span class="brand-name">Fitness Revolution</span>
            </div>
            <ul class = "choice">
              <li><a href="Homepage.php" >Homepage</a></li>
              <li><a href="Classes.php">Classes</a></li>
              <li><a href="shop.php" class = "active">Shop</a></li>
              <li><a href="Review.php">Review</a></li>
              <li><a href="Membership_Page.php" >Membership</a></li>
              <li><a href="#">Free trial</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <?php
            include 'includes/if_login.php';
            ?>
        </nav>
    </header>
 
<div class="header">
    <div class="container">
        <div class="navbar">
           <a href="cart.php"><img src="images/cartblack.png" width="30px" height="30px"></a> 
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Browse your gym products</h1>
                <p>Making your journey more comfortable.</p>
                <a href="products.php"><button class="btn">Explore now &#8594;</button></a>
            </div>
            <div class="col-2">
                <img src="image\body.png" alt="Body Image">
            </div>
        </div>
    </div>   
</div>  

<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="image\bcaa.webp">
            </div>
            <div class="col-3">
                <img src="image\biotech-multivitamin-for-men.jpg">
            </div>
            <div class="col-3">
                <img src="image\casein.webp">
            </div>
        </div>
    </div>
    </div>

    <div class="small-container">
        <h2 class="title">New Arrivals</h2>
        <div class="row">
            <div class="col-4">
               <a href="products.html"><img src="image\Bulkup.webp"></a>
               <a href="products.html"><h4>Bulk-Up Blend</h4></a>
               
                
                <p>Rs 4000</p>
            </div>
            <div class="col-4">
                <a href="products.html"><img src="image\wheyprotein2lbs.jpg"></a>
                <a href="products.html"><h4>Whey Protein Powder 2 lbs</h4></a>
              
                
                <p>Rs 1200</p>
            </div>
            <div class="col-4">
                <a href="products.html"><img src="image\Ultramassgainer.jpg"></a>
                <a href="products.html"><h4>Ultra Mass Gainer</h4></a>
               
                <p>Rs 3500</p>
            </div>
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="row">
            
        <div class="col-4" >
            <a href="products.php"><img src="image/treadmil.webp"></a> 
            <a href="products.php"><h4>Treadmill</h4></a>
            <p>Rs 25000</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\biotech-multivitamin-for-men.jpg"></a> 
            <a href="productDs.php"><h4>Multivitamin (30-60 tablets)</h4></a>
           
            <p>Rs 550</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\bcaa.webp"></a> 
            <a href="products.php"><h4>BCAA  30 servings</h4></a>
            
            <p>Rs 2200</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\pre-workout.jpg"></a> 
            <a href="products.php"><h4> Pre-Workout Supplement (30 servings)</h4></a>
          
            <p>Rs 1600</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\casein.webp"></a> 
            <a href="products.php"><h4>Casein Protein 2 lbs</h4></a>
           
            <p>Rs 1200</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\proteinbars.webp"></a> 
            <a href="products.php"><h4>Protein Bars (12 bars)</h4></a>
         
            <p>Rs 1800</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\creat.jpeg.jpg"></a> 
            <a href="products.php"><h4>Creatine Monohydrate 300g</h4></a>
            
            <p>Rs 850</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\Adjustable_dumbells.png"></a> 
            <a href="products.php"><h4>Adjustable Dumbbells</h4></a>
          
            <p>Rs 1200</p>
        </div>
        <div class="col-4" >
            <a href="products.php"><img src="image\Omega3.avif"></a> 
            <a href="products.php"><h4> Omega-3 Fish Oil (120 capsules)</h4></a>
          
            <p>Rs 900</p>
        </div>

        </div>
     
    </div>
    <div class="offer">
        <div class="small-container">
            <div class="row">
            <div class="col-2">
               <img src="images/exclusive.png" class="offer-img">
            </div>

            <div class="col-2">
                <p>Exclusively Available at Fitness Revolution</p>
            <h1>Health Smart Watch</h1>
            <small>The Fitness Revolution Health Watch features a 40% larger AMOLED colour full touch-display and a personalize health tracker to monitor your workouts.</small>
            <a href="products.php" class="btn">Buy Now &#8594;</a> 
        </div>
     </div>
        </div>
    </div>

    

<div class="brands">
    <div class="small-container">
    <div class="row">
        <div class="col-5">
            <img src="images/logo-godrej.png">
        </div>
        <div class="col-5">
                <img src="images/logo-coca-cola.png">
            </div>
            <div class="col-5">
                <img src="images/logo-oppo.png">
            </div>
            <div class="col-5">
                <img src="images/logo-paypal.png">
            </div>
        <div class="col-5">
            <img src="images/logo-philips.png">
        </div>
    </div>
    </div>
</div>

<?php
    include 'includes/footer.php'
?>


<script>
    var MenuItems=document.getElementById("MenuItems");
    MenuItems.style.maxHeight="0px";

    function menutoggle(){
        if(MenuItems.style.maxHeight=="0px")
    {
        MenuItems.style.maxHeight="200px";
    }
    else
    {
        MenuItems.style.maxHeight="0px";
     }
    }
    
</script>
</body>
</html>