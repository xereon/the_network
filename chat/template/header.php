<?php
/**
 * Created by Ben Charles Gilbey. Ⓒ All rights reserved.
 * Date: 18/01/2016
 * Sarted coding again in july 2023
 * Time: 7:42 AM
 */
ob_start();
session_start();
include ("db.php");
?>
<!DOCTYPE html>
<html lang="en-AU">
<head>
    <title>My Social Network</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
<div class="container"><!-- container start -->
    <div class="header"><!-- header start -->
        <?php
            include "images/svg.php";
            include "includes/logo.php";
            // Check if the user wants to see the registration form
            if (isset($_GET['action']) && $_GET['action'] === 'register') {
                include 'includes/register.php';
				ob_end_flush();

            }
        ?>
    </div><!-- header end -->