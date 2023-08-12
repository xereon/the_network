<?php include "template/header.php"; ?>
<?php include "includes/search_bar.php"; ?>
<?php include "includes/menu.php"; ?>

<div class="content">
    <div class="content_timeline">
        <div class="user_timeline">
            <!-- User details and navigation links here -->
        </div>
        <div class="messages">
            <h2>My Messages</h2>
            <?php
            // Assuming you have a user ID in the session
            $user_id = $_SESSION['user_id'];

            // Fetch private messages for the user
            $get_messages_query = "SELECT * FROM private_messages WHERE sender_id = ? OR recipient_id = ? ORDER BY created_at DESC";
            $stmt = $connect->prepare($get_messages_query);
            $stmt->bind_param("ii", $user_id, $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Loop through messages and display them
            while ($row = $result->fetch_assoc()) {
                $message_id = $row['message_id'];
                $sender_id = $row['sender_id'];
                $recipient_id = $row['recipient_id'];
                $content = $row['content'];
                $created_at = $row['created_at'];

                // Display the message
                echo "<div class='message'>";
                echo "<p>From: User ID $sender_id</p>";
                echo "<p>To: User ID $recipient_id</p>";
                echo "<p>Content: $content</p>";
                echo "<p>Sent at: $created_at</p>";
                echo "</div>";
            }

            // Close the prepared statement
            $stmt->close();
            ?>
        </div>
    </div>
</div>

<?php include ("includes/pagination.php"); ?>
<!-- Additional JavaScript or styling as needed -->
</body>
</html>
