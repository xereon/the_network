<?php
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $userId = $_GET['user_id'];

    // Retrieve user information from the database
    // ... (Similar to your existing code)

    // Prepare vCard data
    $vCardData = "BEGIN:VCARD\r\n";
    $vCardData .= "VERSION:3.0\r\n";
    $vCardData .= "FN:" . $user['user_name'] . "\r\n";
    $vCardData .= "EMAIL:" . $user['user_email'] . "\r\n";
    $vCardData .= "TEL:" . $user['user_phone'] . "\r\n";
    // Add more vCard properties as needed
    $vCardData .= "END:VCARD";

    // Set headers for vCard download
    header('Content-Type: text/vcard');
    header('Content-Disposition: attachment; filename="user_profile.vcf"');

    // Output vCard data
    echo $vCardData;
}
?>
