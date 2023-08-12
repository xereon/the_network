<?php
include 'db.php';

global $pdo;
global $connect;

header('Content-Type: text/html; charset=utf-8');

function addEmojis($message) {
    // Define a mapping of possible emojis and their corresponding text representations
    $emojiMapping = [
        ":)" => "😊",
        ":(" => "😢",
        ":D" => "😄",
        ":P" => "😜",
        ":O" => "😮",
        "<3" => "🤍",
        ":8" => "😎",
        // Add more emojis and their text representations as needed
    ];

    // Iterate over each emoji in the emoji mapping and replace the text representation with the actual emoji
    foreach ($emojiMapping as $text => $emoji) {
        $message = str_replace($text, $emoji, $message);
    }

    return $message;
}

// Function to format time elapsed since a message was sent
function timeElapsed($currentTimestamp, $timestamp) {
    $currentTime = new DateTime("@$currentTimestamp");
    $messageTime = new DateTime("@$timestamp");
    $interval = $messageTime->diff($currentTime);

    if ($interval->y > 0) {
        return $interval->format('%y year(s) ago');
    } elseif ($interval->m > 0) {
        return $interval->format('%m month(s) ago');
    } elseif ($interval->d > 0) {
        return $interval->format('%d day(s) ago');
    } elseif ($interval->h > 0) {
        return $interval->format('%h hour(s) ago');
    } elseif ($interval->i > 0) {
        return $interval->format('%i minute(s) ago');
    // } elseif ($interval->s > 0) {
    //     return $interval->format('%s second(s) ago');
    // }
    } else {
        return 'Just now'; // Display "Just now" for messages sent within the last minute
    }
}

/*************** DateTime- To -Time Function ****************/
function formatDate($date) {
    //return date('- M d - g:i a', strtotime($date));
    return date('- Y M d - g:i a', strtotime($date));
}

// Check if the "Delete All Messages" form was submitted
if (isset($_POST['delete_all'])) {
    include 'delete_all.php';
}

// Retrieve all messages from the database
$sql = "SELECT id, user_id, msg, date FROM chat ORDER BY id DESC";
$run = mysqli_query($connect, $sql);

// Get the total number of messages
$totalMessages = mysqli_num_rows($run);

// Get the current time
$currentTimestamp = strtotime("now");

while ($row = mysqli_fetch_array($run)) {
    $user_id = $row['user_id'];
    $sql_user = "SELECT user_name FROM users WHERE user_id = $user_id";
    $run_user = mysqli_query($connect, $sql_user);

    if($run_user === false) {
        die('Error: ' . mysqli_error($connect));
    }
    
    $user_data = mysqli_fetch_array($run_user);
    if($user_data === null) {
        // Handle error, e.g., by showing a message or redirecting
        echo 'No user found with the given ID';
        exit;
    }

    if($user_data !== null) {
        $name = $user_data['user_name'];
    } else {
        // Handle the error (e.g., you might want to set $name to a default value)
        $name = "Default Name";
    }
    
    $name = $user_data['user_name'];
    
    $msg = addEmojis($row['msg']);
    $timestamp = strtotime($row['date']);
    $timeElapsed = timeElapsed($currentTimestamp, $timestamp);

    echo '
    <div class="chat_data">
    <span title="Delete"><a style="text-decoration:none; font-size: 24px;font-weight: 700; display: inline; color: #ff0000;" href="delete.php?id='.$row['id'].'">&times;</a></span>
    <span>'.$name.': </span>
    <span>'.$timeElapsed.'</span>
    <span>'.$msg.'</span>
    <span><small>'.formatDate($row['date']).'</small></span>
    </div>';
}

// Display the total number of messages and the "Delete All Messages" button
echo '<div class="total_messages">Total Messages: '.$totalMessages.'</div>';

?>

<!-- Add the "Delete All Messages" form -->
<form style="text-align: center;" method="post" action="delete_all.php">
    <input type="submit" name="delete_all" value="Delete All Messages">
</form>
<a href="logout.php"><input class="button" type="logout" name="logout" value="Logout"/></a>