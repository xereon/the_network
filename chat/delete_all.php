<?php
include 'db.php';

// Construct the delete query
$query = "DELETE FROM chat";

// Execute the delete query
$result = mysqli_query($connect, $query);

if ($result) {
    // Deletion successful
    echo "All messages deleted successfully.";
} else {
    // Error occurred during deletion
    echo "Failed to delete all messages.";
}
// Redirect back to the index page
header("Location: home.php");
exit(); // Make sure to exit after the redirect
?>