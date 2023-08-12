<?php
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL);

include 'db.php';
ob_start();
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

// Close the prepared statements
mysqli_stmt_close($stmt_user);
mysqli_stmt_close($stmt_active_sessions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Live Chat</title>
    <meta name="theme-color" content="#293a4a">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" media="all">
    <link rel="stylesheet" href="styles.css" media="all">
<script>
    function ajax() {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if(req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;

                if ('<?php echo isset($_SESSION["new_message"]) ? $_SESSION["new_message"] : "0"; ?>' === '1') {
                    var soundElement = new Audio('message-received.mp3');
                    soundElement.play();
                    <?php unset($_SESSION['new_message']); ?>;
                }
            }
        }
        req.open('GET','chat.php',true);
        req.send();
    }
    setInterval(function(){ajax()},1000);
</script>
</head>
<body onload="ajax();">
<?php include ('header_svg.php'); ?>
<div class="container">
    <div class="chat_box">
        <div id="chat"></div>
        <div class="chat_input_wrap">
            <form method="post" action="">
            <textarea id="chatForm" autofocus="autofocus" required="required" name="msg" placeholder="Send a message"></textarea>                
            <div class="send_button">
                    <input type="submit" name="submit" value="Send" />
                </div>
            </form>
        </div>
        <div class="logout_button_wrap">
    <form class="logout_form" method="post" action="logout.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</div>

    </div>
<?php
global $connect;

if(isset($_POST['submit']) && isset($_POST['msg'])){
    $msg = $_POST['msg'];
    $user_email = $_SESSION['user_email'];

    // Retrieve user_id based on the user_email from session
    $query_user = "SELECT user_id FROM users WHERE user_email = '$user_email'";
    $run_user = mysqli_query($connect, $query_user);
    $user_data = mysqli_fetch_array($run_user);
    $user_id = $user_data['user_id'];

    // Use the user_id in the INSERT query
    $query = "INSERT INTO chat (user_id, msg) VALUES ('$user_id', '$msg')";

    $run_insert = mysqli_query($connect,$query);

    if($run_insert) {
        // echo "<audio id='sound' src='sound.mp3' autoplay></audio>";
        // Instead of echoing the audio element, redirect to the same page (PRG pattern)
        header("HTTP/1.1 303 See Other");
        header("Location: ".$_SERVER['REQUEST_URI']); // Redirect to the current page
        exit();
       
    }
}

?>
</div>
<script>
    
</script>
</body>
</html> 
