<?php
// logout.php
include 'db.php';
global $connect;

// Start the session (if not already started)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header('location: index.php');
    exit;
}

// Get the user ID based on the user email from the session
$user_email = $_SESSION['user_email'];
$query_user = "SELECT user_id FROM users WHERE user_email = ?";
$stmt_user = mysqli_prepare($connect, $query_user);
mysqli_stmt_bind_param($stmt_user, "s", $user_email);
mysqli_stmt_execute($stmt_user);
$result_user = mysqli_stmt_get_result($stmt_user);
$user_data = mysqli_fetch_assoc($result_user);
$user_id = $user_data['user_id'];

// Retrieve the active sessions for the user
$query_active_sessions = "SELECT * FROM active_sessions WHERE user_id = ?";
$stmt_active_sessions = mysqli_prepare($connect, $query_active_sessions);
mysqli_stmt_bind_param($stmt_active_sessions, "i", $user_id);
mysqli_stmt_execute($stmt_active_sessions);
$result_active_sessions = mysqli_stmt_get_result($stmt_active_sessions);

// Display the active session data
echo "<h1>Active Sessions:</h1>";
echo "<ul>";
while ($active_session = mysqli_fetch_assoc($result_active_sessions)) {
    echo "<li>Session ID: " . $active_session['session_id'] . "</li>";
    echo "<li>Login Time: " . $active_session['login_time'] . "</li>";
    echo "<br>";
}
echo "</ul>";

// Delete the session data from the active_sessions table
$query = "DELETE FROM active_sessions WHERE user_id = ?";
$stmt = mysqli_prepare($connect, $query);

if ($stmt) {
    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    // Close the statement after use
    mysqli_stmt_close($stmt);

    echo "Session data deleted from active_sessions table.";
} else {
    // Error in preparing the statement, handle it appropriately
    echo "Error in preparing the statement: " . mysqli_error($connect);
}

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

echo "User logged out successfully.";

// Redirect the user to the login page or home page after logout
header('Location: index.php');
exit;
?>

