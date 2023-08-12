<?php ob_start();
include 'db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If the user is already logged in, redirect to home.php
if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}

// Redirect users to the login form on index.php if accessed directly
/*if (basename($_SERVER['PHP_SELF']) === 'login.php') {
    header('Location: index.php'); // Change #login to the appropriate anchor on index.php
    exit;
}*/

    if (isset($_POST['login'])) {
        $emailorusername = mysqli_real_escape_string($connect, $_POST['emailorusername']);
        $pass = mysqli_real_escape_string($connect, $_POST['pass']);

        // Use prepared statements to prevent SQL injection
        $get_user = "SELECT * FROM users WHERE user_email=? OR user_name=?";
        $stmt = mysqli_prepare($connect, $get_user);
        mysqli_stmt_bind_param($stmt, "ss", $emailorusername, $emailorusername);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // Verify the password
            if (password_verify($pass, $user['user_pass'])) {
                // Check if the user is already logged in
                $session_id = session_id();
                $check_session = "SELECT * FROM active_sessions WHERE session_id = ?";
                $stmt_check = mysqli_prepare($connect, $check_session);
                mysqli_stmt_bind_param($stmt_check, "s", $session_id);
                mysqli_stmt_execute($stmt_check);
                $result_check = mysqli_stmt_get_result($stmt_check);
                $existing_session = mysqli_fetch_assoc($result_check);

                if ($existing_session) {
                    // Delete the existing active session
                    $delete_session = "DELETE FROM active_sessions WHERE session_id = ?";
                    $stmt_delete = mysqli_prepare($connect, $delete_session);
                    mysqli_stmt_bind_param($stmt_delete, "s", $session_id);
                    mysqli_stmt_execute($stmt_delete);
                }

                // Set session variables for the user's email and username
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['user_name'] = $user['user_name'];

                // Insert the new active session into the database
                $insert_session = "INSERT INTO active_sessions (user_id, session_id, login_time, expiration_time) VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR))";
                $stmt_insert = mysqli_prepare($connect, $insert_session);
                mysqli_stmt_bind_param($stmt_insert, "is", $user['user_id'], $session_id);
                mysqli_stmt_execute($stmt_insert);

                header('Location: home.php');
                exit;
            } else {
                echo "<h2 style='text-align: center; color: #ff3831'>Incorrect password! Please try again.</h2>";
            }
        } else {
            echo "<h2 style='text-align: center; color: #ff3831'>User not found! Please try again or register an account.</h2>";
        }

        // Close the prepared statement for retrieving user data
        mysqli_stmt_close($stmt);
		ob_end_clean();
    }
?>

