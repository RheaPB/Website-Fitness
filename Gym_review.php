<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $title = $_POST['title'] ?? '';
    $cleanliness = $_POST['cleanliness'] ?? '';
    $comment_gym = $_POST['comment_gym'] ?? '';
  

    
    $conn = new mysqli('localhost', 'root', '', 'fitness_revolution');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        
        $stmt = $conn->prepare("INSERT INTO gym_review (name, title, cleanliness, comment) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $title, $cleanliness, $comment_gym);

        
        if ($stmt->execute()) {
            echo "Review successfully submitted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Review Gym</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="review-container">
        <h1>PLEASE REVIEW YOUR GYM EXPERIENCE</h1>
        <h2>GIVE GENUINE FEEDBACK</h2>

        
        <form action="Gym_review.php" method="POST" class="review-form" >
            
            <fieldset class="personal-details">
                <legend>Personal Details</legend>
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label>Gender:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="title" value="Male" > Male</label>
                        <label><input type="radio" name="title" value="Female"> Female</label>
                        <label><input type="radio" name="title" value="Other"> Other</label>
                        
                    </div>
                </div>
            </fieldset>

            
            <fieldset class="gym-details">
                <legend>Gym Feedback</legend>
                <p>Please give us feedback on your gym experience</p>
                <div class="input-group">
                    <label for="cleanliness">Cleanliness:</label>
                    <select id="cleanliness" name="cleanliness">
                        <option value="" disabled selected>Please select a value</option>
                        <option value="1">Very Poor</option>
                        <option value="2">Poor</option>
                        <option value="3">Average</option>
                        <option value="4">Good</option>
                        <option value="5">Excellent</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="comment">Comment on Gym:</label>
                    <textarea id="comment_gym" name="comment_gym" rows="5"></textarea>
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


