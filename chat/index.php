<?php
ob_start(); // Start output buffering
include 'template/header.php';

// If the user is logged in, redirect to home.php
if (isset($_SESSION['user_email'])) {
    header('Location: home.php');
    exit; // Exit the script to prevent further execution
} else {
    include 'includes/login_form.php';
	ob_end_flush();
}

// page content after login
include 'template/content.php';
?>