<?php
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $userId = $_GET['user_id'];

    // Retrieve user information from the database
    // ... (Similar to your existing code)

    // Prepare CSV data
    $csvData = "Name,Email,Phone,Country,About Me\r\n";
    $csvData .= '"' . $user['user_name'] . '","' . $user['user_email'] . '","' . $user['user_phone'] . '","' . $user['user_country'] . '","' . $user['about_me'] . '"' . "\r\n";
    // Add more rows as needed

    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="user_profile.csv"');

    // Output CSV data
    echo $csvData;
}
?>
