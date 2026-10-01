<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fitness_revolution');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch trainer names from the database
$sql = "SELECT trainer_id, name, image FROM trainer"; // Ensure 'trainer' table has 'trainer_id', 'name', 'image'
$result = $conn->query($sql);

include 'includes/Check_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Coaches</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            <li><a href="Classes.php">Classes</a></li>
            <li><a href="Shop.php">Shop</a></li>
            <li><a href="Review.html">Review</a></li>
            <li><a href="Membership_Page.html">Membership</a></li>
            <li><a href="trainer.php" class="active">Coaches</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <?php include 'includes/if_login.php'; ?>
    </nav>
</header>

<section class="coaches">
    <h1 class="coaches-title">Our Coaches</h1>
    <p class="coaches-description">THE FACES BEHIND FITNESS_REVOLUTION</p>
    <div class="coaches-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='coach-card'>
                    <div class='coach-photo'>
                        <img src='{$row['image']}' alt='Photo of {$row['name']}'>
                    </div>
                    <h3 class='coach-name'>{$row['name']}</h3>
                    <p class='coach-bio'>Passionate and experienced trainer to help you achieve your fitness goals.</p>
                    <button 
                        class='view-more' 
                        data-id='{$row['trainer_id']}'>
                        View Profile
                    </button>
                </div>
                ";
            }
        } else {
            echo "<p>No trainers found.</p>";
        }
        $conn->close();
        ?>
    </div>
</section>

<!-- Modal for Trainer Details -->
<div id="coach-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-body">
            <img id="modal-image" src="" alt="Coach Photo">
            <h2 id="modal-name"></h2>
            <p id="modal-bio"></p>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".view-more").click(function() {
        var trainerId = $(this).data("id"); // Get trainer_id

        // Fetch trainer data using AJAX
        $.ajax({
            url: "fetch_coach.php",
            type: "POST",
            data: { trainer_id: trainerId },
            dataType: "json",
            success: function(data) {
                if (!data.error) {
                    $("#modal-name").text(data.name);
                    $("#modal-bio").text(data.bio);
                    $("#modal-image").attr("src", data.image);

                    $("#coach-modal").fadeIn(); // Show modal
                } else {
                    alert(data.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });

    // Close modal
    $(".close").click(function() {
        $("#coach-modal").fadeOut();
    });

    // Close when clicking outside modal
    $(window).click(function(event) {
        if ($(event.target).is("#coach-modal")) {
            $("#coach-modal").fadeOut();
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
</body>
</html>


