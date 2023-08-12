<?php
include 'includes/index_header.php';

// If the user is logged in, redirect to home.php
if (isset($_SESSION['user_email'])) {
    header('Location: home.php');
} else {
    // Check the action parameter to determine which form to display
    if(isset($_GET['action']) && $_GET['action'] === 'register') {
        include 'includes/register_form.php'; // Include the registration form
    } else {
        include 'includes/login_form.php'; // Include the login form by default
    }
}
?>