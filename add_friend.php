<?php
include "template/header.php"; // FUNCTIONS & SETTINGS INCLUDE todo rename
// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the friend's user ID from the URL
    $friendId = $_GET['id'];

    // Get the logged-in user ID from the session
    $loggedInUserId = $_SESSION['user_id'];

    // Create a MySQL connection
    $host = 'localhost';        // MySQL host
    $username = 'root';   // MySQL username
    $password = '';   // MySQL password
    $database = 'chat_new';   // MySQL database

    $connection = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if ($connection === false) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    // Prepare the SQL query to check if the friendship already exists
    $checkQuery = "SELECT * FROM friendships WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)";

    // Prepare the statement
    $checkStmt = mysqli_prepare($connection, $checkQuery);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($checkStmt, "iiii", $loggedInUserId, $friendId, $friendId, $loggedInUserId);
    $checkResult = mysqli_stmt_execute($checkStmt);

    // Check if the query was successful
    if ($checkResult === false) {
        die('Error executing the check query: ' . mysqli_error($connection));
    }

    // Check if the friendship already exists
    if (mysqli_num_rows(mysqli_stmt_get_result($checkStmt)) > 0) {
        echo '<p>This user is already your friend.</p>';
    } else {
        // Prepare the SQL query to add friend
        $addQuery = "INSERT INTO friendships (user_id, friend_id) VALUES (?, ?)";

        // Prepare the statement
        $addStmt = mysqli_prepare($connection, $addQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($addStmt, "ii", $loggedInUserId, $friendId);
        $addResult = mysqli_stmt_execute($addStmt);

        // Check if the query was successful
        if ($addResult === false) {
            die('Error executing the add query: ' . mysqli_error($connection));
        }

        // Check if the query was successful
        if (mysqli_affected_rows($connection) > 0) {
            echo '<p>Friend added successfully!</p>';
        } else {
            echo '<p>Failed to add friend.</p>';
        }

        // Close the statement
        mysqli_stmt_close($addStmt);
    }

    // Close the statements
    mysqli_stmt_close($checkStmt);

    // Close the MySQL connection
    mysqli_close($connection);
} else {
    echo '<p>Invalid friend ID.</p>';
}
?>