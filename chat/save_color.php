<?php
// Start or resume the PHP session
session_start();

// Check if the color parameter is present in the POST request
if (isset($_POST['color'])) {
    // Get the color from the POST request
    $color = $_POST['color'];

    // Save the color in the PHP session
    $_SESSION['chosenColor'] = $color;
}
?>
