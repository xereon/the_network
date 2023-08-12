<?php include "template/header.php";//var_dump($_SESSION); ?>
<?php include "includes/search_bar.php"; ?>
<?php include "includes/menu.php"; ?>
<div class="content">
    <div class="content_timeline">
	<div class="user_timeline">
        <div class="user_details">
            <?php
            if (isset($_SESSION['user_email'])) {
			$user_email = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email='$user_email' OR user_name='$user_email'";
            $run_user = mysqli_query($connect, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_country = $row['user_country'];
            $user_image = $row['user_image'];
            $register_date = $row['user_register_date'];
            $last_login = $row['user_lastlogin'];
            echo "
                <img src='images/profile/$user_image'/>
                <p><strong>Name: </strong>$user_name</p>
                <p><strong>Country: </strong>$user_country</p>
                <p><strong>Last Login: </strong>$last_login</p>
                <p><strong>Member Since: </strong>$register_date</p>
                <p><a href='chat/'>Messages (2)</a></p>
                <p><a href='my_posts.php'>My Posts (3)</a></p>
                <p><a href='edit_profile.php'>Edit My Account</a></p>
                <p><a href='logout.php'>Logout</a></p>
            ";
			}
            ?>
        </div>
		
    </div>
        <div class="posts">
            <form action="home.php?id=<?php echo $user_id;?>" method="post" id="f">
                <h2>
                    Whats on your mind?
                </h2>
                <input autofocus type="text" name="title" placeholder="Write a title" required="required" /><br />
                <textarea id="messageInput" name="content" placeholder="Write description..."></textarea><br />
                <select name="topic">
                    <option>Select Topic</option>
                    <?php
                    $get_topics = "SELECT * FROM topics";
                    $run_topics =  mysqli_query($connect,$get_topics);

                    while($row=mysqli_fetch_array($run_topics)){
                        $topic_id = $row['topic_id'];
                        $topic_title = $row['topic_title'];

                        echo "<option value='$topic_id'>$topic_title</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="sub" value="Post To Timeline"/>
            </form>
                <h3>Most recent posts:</h3>
            <?php
				// Insert post into the database
			if (isset($_POST['sub'])) {
				$title = mysqli_real_escape_string($connect, $_POST['title']);
				$content = mysqli_real_escape_string($connect, $_POST['content']);
				$topic = $_POST['topic'];

				$insert = "INSERT INTO posts (user_id, topic_id, post_title, post_content, post_date) VALUES ('$user_id', '$topic', '$title', '$content', NOW())";

				$run = mysqli_query($connect, $insert);

				if ($run) {
					echo "<h3>Posted to timeline. Looks Great!";

					$update = "UPDATE users SET posts='yes' WHERE user_id='$user_id'";
					$run_update = mysqli_query($connect, $update);
				}
			}//<!--       ***********   DISPLAY POSTS start    *************       -->
            ?>
            
            <div id="results">
                <?php
                    include "fetch_pages.php";
                ?>
            </div>
            <?php
                include ("includes/pagination.php");
            ?>
            <!--div id="button_wrap">
                <button class='load_more' id='load_more_button'>load More</button>
                <div class='animation_image' style='display:none;'><img src='ajax-loader.gif'> Loading...</div>
            </div     ***********   DISPLAY POSTS end    *************       -->
        </div>
    </div>
</div>
 <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include EmojiOneArea script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
    <!-- Your custom script for initializing EmojiOneArea -->
    <script>
        $(document).ready(function() {
            // Initialize EmojiOneArea with options and settings
            $("#messageInput").emojioneArea({
                pickerPosition: "bottom",
                tonesStyle: "bullet",
                autocomplete: true,
                search: false,
                pickerButton: true,
                filtersPosition: "bottom",
                shortcuts: false,
                inline: true
                // You can add more options and settings here
            });
        });
	</script>
</body>
</html>
