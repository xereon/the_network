<?php
    include "template/header.php";

    // Assuming you have the necessary database connection and user session
    // Fetch the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Fetch user information from the database based on the $user_id
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($connect, $query);

    if ($result === false) {
        die('Error executing the query: ' . mysqli_error($connect));
    }

    if (mysqli_num_rows($result) === 1) {
        $user_data = mysqli_fetch_assoc($result);
        $user_name = $user_data['user_name'];
		$user_avatar = $user_data['user_image']; // Assuming 'user_image' is the field for avatar URL
        // You can fetch other user information here as well
    } else {
        die('User not found.');
    }

    // Fetch posts created by the user
    $posts_query = "SELECT * FROM posts WHERE user_id = $user_id ORDER BY post_date DESC";
    $posts_result = mysqli_query($connect, $posts_query);

    if ($posts_result === false) {
        die('Error executing the query: ' . mysqli_error($connect));
    }

    $posts = mysqli_fetch_all($posts_result, MYSQLI_ASSOC);
	
	// Fetch private messages
    $messagesQuery = "SELECT private_messages.content, private_messages.created_at, users.user_name, users.user_image
                      FROM private_messages
                      JOIN users ON private_messages.sender_id = users.user_id
                      WHERE private_messages.recipient_id = $user_id
                      ORDER BY private_messages.created_at DESC";
    $messagesResult = mysqli_query($connect, $messagesQuery);

    if ($messagesResult === false) {
        die('Error fetching private messages: ' . mysqli_error($connect));
    }

    $messages = mysqli_fetch_all($messagesResult, MYSQLI_ASSOC);
	ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $user_name; ?>'s Posts</title>
    <link rel="stylesheet" href="styles/profile.css" />
</head>
<body>
    <div class="container">
        <h1><?php echo $user_name; ?>'s Posts</h1>
        <div class="posts">
            <?php foreach ($posts as $post) : ?>
                <div class="post">
					<div class="user-avatar">
                        <img src="images/profile/<?php echo $user_avatar; ?>" alt="Avatar">
                    </div>
                    <h2><?php echo $post['post_title']; ?></h2>
                    <p><?php echo $post['post_content']; ?></p>
                    <p>Posted on: <?php echo $post['post_date']; ?></p>
                    <form method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                        <button type="submit" name="delete_post">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

<?php
ob_start();
// Handle post deletion
if (isset($_POST['delete_post'])) {
    $post_id = $_POST['post_id'];

    $deleteQuery = "DELETE FROM posts WHERE post_id = $post_id AND user_id = $user_id";
    $deleteResult = mysqli_query($connect, $deleteQuery);

    if ($deleteResult) {
        // Post deleted successfully, you can show a success message or redirect back to the page
        header("Location: my_posts.php");
		ob_clean();
        exit();
    } else {
        echo "Error deleting post: " . mysqli_error($connect);
    }
}
?>
