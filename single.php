<?php
include "template/header.php"; // FUNCTIONS & SETTINGS INCLUDE todo rename
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Welcome User!</title>
    <link rel="stylesheet" href="styles/home.css" />
    <style type="text/css">
        .img_name_wrap {
            padding: 0  10px 0 0;
            margin: 0;
        }
        textarea:focus {
            background-color: white;
            margin: 0px;
            margin-bottom: 3px;
            border: 1px solid #b0c7d6;
            border-radius: 3px;
        }
        textarea:hover {
            background-color: #ffffff;
            margin: 0px;
            margin-bottom: 3px;
            border: 1px solid #b0c7d6;
            border-radius: 3px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
</head>
<header class="header">
    <h2 align="middle" ">
    Welcome
    <?php
    $emailorusername = $_SESSION['user_email'];
    $user = "SELECT * FROM users WHERE user_email='$emailorusername' OR user_name='$emailorusername'";
    $run_user = mysqli_query($connect,$user);
    $row_user = mysqli_fetch_array($run_user);

    $user_name = $row_user['user_name'];
    $user_email = $row_user['user_email'];

    if ($emailorusername == ''){
        header('Location: index.php');
    } else {
        // todo echo greating based on time of day

        echo $user_name;
    }
    ?>
    </h2>
    <ul class="menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="members.php">Members</a></li>
        &nbsp;
        <strong>Topics:</strong>
        <?php
        $get_topics = "SELECT * FROM topics";
        $run_topics =  mysqli_query($connect,$get_topics);

        while($row=mysqli_fetch_array($run_topics)){
            $topic_id = $row['topic_id'];
            $topic_title = $row['topic_title'];

            echo "<li><a href='home.php?topic=$topic_id'>$topic_title</a>&nbsp;</li>";
        }
        ?>

    </ul>
    <form method="get" action="results.php" class="search">
        <input type="text" name="user_query" placeholder="Search..."/>
        <input type="submit" name="search" value="Search">
    </form>
</header>

<div class="content">
    <div class="content_timeline">

    <div class="user_timeline">
        <div class="user_details">
            <?php
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email='$user' OR user_name='$user'";
            $run_user = mysqli_query($connect,$get_user);
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

                        <p><a href='my_messages.php'>Messages (2)</a></p>
                        <p><a href='my_posts.php'>My Posts (3)</a></p>
                        <p><a href='edit_profile.php'>Edit My Account</a></p>
                        <p><a href='logout.php'>Logout</a></p>
                        ";
            ?>
        </div>
    </div>
        <div class="posts">

            <h3>View post:</h3>
            <?php
                if(isset($_GET['post_id'])) {

                    $get_id = $_GET['post_id'];

                    $get_posts = "SELECT * FROM posts WHERE post_id='$get_id'";

                    $run_posts = mysqli_query($connect,$get_posts);

                    $row_posts=mysqli_fetch_array($run_posts);

                        $post_id = $row_posts['post_id'];
                        $user_id = $row_posts['user_id'];
                        $post_title = $row_posts['post_title'];
                        $post_content = $row_posts['post_content'];
                        $post_date = $row_posts['post_date'];               //todo fix user_id from being a zero 0 or 1

                        $user = "SELECT * FROM users WHERE user_id='$user_id' AND posts='yes'";

                        $run_user = mysqli_query($connect, $user);
        		$row_user = mysqli_fetch_array($run_user);

        	if ($row_user) {
            		$user_name = $row_user['user_name'];
            		$user_image = $row_user['user_image'];
		} else {
         	   echo "User not found.";
}

// Getting The User Session
                    $user_com = $_SESSION['user_email'];
                    $get_com = "SELECT * FROM users WHERE user_email='$user_com' OR user_name='$user_com'";
                    $run_com = mysqli_query($connect,$get_com);
                    $row_com = mysqli_fetch_array($run_com);

                    $user_com_id = $row_com['user_id'];
                    $user_com_name = $row_com['user_name'];

                        //output results from database
                        echo '<ul class="page_result">
                            <li id="item_'.$post_id.'">
                            <div class="img_name_wrap">
                            <img class="post_image" src="images/profile/'.$user_image.'" /></div>
                            <span class="post_date">'.$post_date.'</span>
                            <div class="user_name"><a href="user_profile.php?user_id='.$user_id.'">'.$user_name.'</a></div>
                            <div class="post_content_all">
                            <span class="post_title">'.$post_id.') '.$post_title.'</span>
                            <span class="page_message">'.$post_content.'</span>
                            </div></li>';

                        include("functions/comments.php");

							echo '</ul><div class="clear_float"></div>';
                            
							/*echo '<form action="" method="post">
                            <textarea autofocus name="comment" placeholder="write a reply...2"></textarea>
                            <input type="submit" name="reply" value="Post Reply">
                            </form>
                            </ul><div class="clear_float"></div>';*/

                        if(isset($_POST['reply'])) {

                            $comment_author = $user_com_name;

                            $comment = $_POST['comment'];

                            $insert = "INSERT INTO comments (post_id,user_id,comment,comment_author,date) VALUES ('$post_id','$user_id','$comment','$comment_author',NOW())";

                            $run = mysqli_query($connect,$insert);

                            echo "Your reply was added! :)";
                            } 
						}
?>

        </div>
    </div>
</div>







<!-- Add this script after your existing script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const getComments = function(postId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_comments.php?post_id=' + postId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const comments = JSON.parse(xhr.responseText);
                    updateCommentsUI(comments);
                } else {
                    console.log('Request failed with status:', xhr.status);
                }
            }
        }

        xhr.send();
    }

    const updateCommentsUI = function(comments) {
        const commentsContainer = document.getElementById('comments-container');
        commentsContainer.innerHTML = ''; // Clear existing comments

        comments.forEach(comment => {
            const commentDiv = document.createElement('div');
            commentDiv.className = 'comment';

            const commentAuthor = document.createElement('span');
            commentAuthor.className = 'comment-author';
            commentAuthor.textContent = comment.comment_author;

            const commentDate = document.createElement('span');
            commentDate.className = 'comment-date';
            commentDate.textContent = comment.date;

            const commentText = document.createElement('p');
            commentText.textContent = comment.comment;

            commentDiv.appendChild(commentAuthor);
            commentDiv.appendChild(commentDate);
            commentDiv.appendChild(commentText);

            commentsContainer.appendChild(commentDiv);
        });
    }

    const postId = <?php echo $_GET['post_id']; ?>;
    getComments(postId);

    // Periodically fetch comments every 1000ms (1 second)
    setInterval(function() {
        getComments(postId);
    }, 1000);
});
</script>
</body>
</html>
