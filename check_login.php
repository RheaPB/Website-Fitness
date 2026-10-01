<?php
// Check-Login.php


// Check if the user is logged in
$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$user = null;

// If the user is logged in, retrieve their information
if ($logged_in && isset($_SESSION['user']) && is_array($_SESSION['user'])) {
    $user = htmlspecialchars($_SESSION['user']['name']);
}
?>
