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
        "<3" => "💙",
        // Add more emojis and their text representations as needed
    ];

    // Iterate over each emoji in the emoji mapping and replace the text representation with the actual emoji
    foreach ($emojiMapping as $text => $emoji) {
        $message = str_replace($text, $emoji, $message);
    }

    return $message;
}

function timeElapsed($currentTimestamp, $timestamp) {
    $currentTime = new DateTime("@$currentTimestamp");
    $messageTime = new DateTime("@$timestamp");
    $interval = $messageTime->diff($currentTime); // Swap the positions of $messageTime and $currentTime

    $result = '';

    if ($interval->d > 0) {
        $result .= $interval->d . ' day(s) ';
    }

    if ($interval->h > 0) {
        $result .= $interval->h . ' hour(s) ';
    }

    if ($interval->i > 0) {
        $result .= $interval->i . ' minute(s) ';
    }

    if ($interval->s > 0) {
        $result .= $interval->s . ' second(s) ';
    }

    if (empty($result)) { // Check if the result is empty, indicating no time has elapsed
        $result = 'just now';
    } else {
        $result .= 'ago';
    }

    return $result;
}

/*************** DateTime- To -Time Function ****************/
function formatDate($date) {
    //return date('- M d - g:i a', strtotime($date));
    return date('- Y M d - g:i a', strtotime($date));
}

// Check if the "Delete All Messages" form was submitted
if (isset($_POST['delete_all'])) {
    // Include the delete_all.php file to handle the deletion
    include 'delete_all.php';
}
// Retrieve all messages from the database
$sql_1 = "SELECT * FROM users ORDER BY user_id DESC";
$run_1 = mysqli_query($connect, $sql_1);
$currentTimestamp = strtotime("now");
while ($row = mysqli_fetch_array($run_1)) {
$name = $row['name'];
}
// Retrieve all messages from the database
$sql_2 = "SELECT * FROM chat ORDER BY id DESC";
$run_2 = mysqli_query($connect, $sql_2);
// Get the total number of messages
$totalMessages = mysqli_num_rows($run_2);
// Get the current time
$currentTimestamp = strtotime("now");
while ($row = mysqli_fetch_array($run_2)) {
    $msg = $row['msg'];
    $date = formatDate($row['date']);
    $timestamp = strtotime($row['date']);
    $timeElapsed = timeElapsed($currentTimestamp, $timestamp);

    // Add emojis to the message
    $msg = addEmojis($msg);

    echo '
    <div class="chat_data">
    <span title="Delete"><a style="text-decoration:none; display: inline-block; color: #ff0000;" href="delete.php?id='.$row['id'].'">&close;</a></span>
    <span>'.$name.': </span>
    <span>'.$timeElapsed.'</span>
    <span>'.$msg.'</span>
    <span><small>'.$date.'</small></span>
    </div>';
}

// Display the total number of messages and the "Delete All Messages" button
echo '<div class="total_messages">Total Messages: '.$totalMessages.'</div>';

?>

<!-- Add the "Delete All Messages" form -->
<form style="text-align: center;" method="post" action="delete_all.php">
    <input type="submit" name="delete_all" value="Delete All Messages">
</form>
<a class="button" href="logout.php"><input type="logout" name="logout" value="Logout"></a>