<?php
include 'db.php';

if (isset($_GET['id'])) {
    $messageId = $_GET['id'];
    
    // Construct the delete query
    $query = "DELETE FROM chat WHERE id = $messageId";
    
    // Execute the delete query
    $result = mysqli_query($connect, $query);
    
    if ($result) {
        // Deletion successful
        echo "Message deleted successfully.";
    } else {
        // Error occurred during deletion
        echo "Failed to delete the message.";
    }
} else {
    // No message ID provided in the URL
    echo "Invalid request.";
}
// Redirect back to the index page
header("Location: home.php");
exit(); // Make sure to exit after the redirect
?>