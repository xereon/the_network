<?php
include "template/header.php";

// Assuming you have the necessary database connection and user session
// Fetch the user ID from the URL parameter
$user_id = $_GET['id'];

// Fetch user information from the database based on the $user_id
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($connect, $query);

if ($result === false) {
    die('Error executing the query: ' . mysqli_error($connect));
}

if (mysqli_num_rows($result) === 1) {
    $user_data = mysqli_fetch_assoc($result);
    $user_name = $user_data['user_name'];
    $user_country = $user_data['user_country'];
    $user_image = $user_data['user_image'];
} else {
    die('User not found.');
}

// Check if the user is already a friend
// Here, you need to implement the logic to check if the logged-in user is a friend of the profile user
$isFriend = false; // Set this based on your database query

// Handling adding friend
if (isset($_POST['add_friend'])) {
    $friendshipQuery = "SELECT * FROM friendships WHERE user_id = {$_SESSION['user_id']} AND friend_id = $user_id";
    $friendshipResult = mysqli_query($connect, $friendshipQuery);
    
    if (mysqli_num_rows($friendshipResult) === 0) {
        $insertFriendshipQuery = "INSERT INTO friendships (user_id, friend_id) VALUES ('{$_SESSION['user_id']}', '$user_id')";
        $insertFriendshipResult = mysqli_query($connect, $insertFriendshipQuery);
        
        if ($insertFriendshipResult) {
            $isFriend = true; // Set to true since the users are now friends
        } else {
            echo "Error adding friend: " . mysqli_error($connect);
        }
    } else {
        echo "You are already friends with $user_name.";
    }
}

// Check if the form was submitted to send a private message
$messageSent = false;
if (isset($_POST['message'])) {
    $message = mysqli_real_escape_string($connect, $_POST['message']);
    if (!empty($message)) {
        $sender_id = $_SESSION['user_id'];
        $receiver_id = $user_id; // Assuming $user_id is defined earlier in your code

        $insertMessageQuery = "INSERT INTO private_messages (sender_id, recipient_id, content) VALUES ('$sender_id', '$receiver_id', '$message')";
        $insertMessageResult = mysqli_query($connect, $insertMessageQuery);

        if ($insertMessageResult) {
            $messageSent = true;
        } else {
            echo json_encode(array("success" => false, "message" => "Error sending the message. Please try again later."));
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $user_name; ?>'s Profile</title>
    <link rel="stylesheet" href="styles/profile.css" />
</head>
<body>
    <div class="container">
        <div class="profile-details">
            <div class="user-profile">
                <img src="images/profile/<?php echo $user_image; ?>" alt="Profile Image" />
                <h2><?php echo $user_name; ?></h2>
                <p><?php echo $user_country; ?></p>
            </div>
            <div class="actions">
                <?php if ($user_id !== $_SESSION['user_id']) : ?>
                    <?php if ($isFriend) : ?>
                        <p>You are now friends with <?php echo $user_name; ?></p>
                    <?php else : ?>
                        <form method="post">
                            <button type="submit" name="add_friend">Add Friend</button>
                        </form>
                    <?php endif; ?>
                    <form method="post">
                        <textarea name="message" placeholder="Write a private message"></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageForm = document.querySelector('form[action="profile.php?id=<?php echo $user_id; ?>"]');
        const messageNotification = document.querySelector('.message-notification');

        messageForm.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(messageForm);
            const response = await fetch(messageForm.getAttribute('action'), {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            showMessageNotification(result.success, result.message);
        });

        function showMessageNotification(success, message) {
            messageNotification.textContent = message;
            messageNotification.classList.add(success ? 'success' : 'error');
            messageNotification.style.display = 'block';

            setTimeout(function() {
                messageNotification.style.opacity = '0';
                setTimeout(function() {
                    messageNotification.style.display = 'none';
                    messageNotification.style.opacity = '1';
                    messageNotification.classList.remove('success', 'error');
                }, 300);
            }, 3000);
        }
    });
</script>
</html>
