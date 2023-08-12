<?php
// Fetch and display private messages
$user_id = $_SESSION['user_id'];

$fetchMessagesQuery = "SELECT * FROM private_messages WHERE sender_id = $user_id OR recipient_id = $user_id ORDER BY created_at DESC";
$fetchMessagesResult = mysqli_query($connect, $fetchMessagesQuery);

if ($fetchMessagesResult && mysqli_num_rows($fetchMessagesResult) > 0) {
    while ($row = mysqli_fetch_assoc($fetchMessagesResult)) {
        $message_id = $row['message_id'];
        $sender_id = $row['sender_id'];
        $recipient_id = $row['recipient_id'];
        $content = $row['content'];
        $created_at = $row['created_at'];

        // Determine if the message was sent by the user or received by the user
        $isSentByUser = ($sender_id == $user_id);

        // Fetch sender's username
        $senderQuery = "SELECT user_name FROM users WHERE user_id = $sender_id";
        $senderResult = mysqli_query($connect, $senderQuery);
        $senderUsername = ($senderResult && mysqli_num_rows($senderResult) > 0) ? mysqli_fetch_assoc($senderResult)['user_name'] : 'Unknown';

        // Display the message
        echo '<div class="message ' . ($isSentByUser ? 'sent' : 'received') . '">';
        echo '<p class="message-content">' . htmlspecialchars($content) . '</p>';
        echo '<p class="message-meta">' . ($isSentByUser ? 'You' : $senderUsername) . ' - ' . $created_at . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No messages yet.</p>';
}
?>
