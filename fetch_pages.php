<?php
//include("config.inc.php"); //include config file
//sanitize post value
//$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
/*if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}*/
include "db.php";
global $connect;

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page=1;
}
$start_from = ($page-1) * $item_per_page;
//get current starting point of records
//$position = ($page_number * $item_per_page);

$get_posts = "SELECT p.*, u.user_name, u.user_image FROM posts p
              INNER JOIN users u ON p.user_id = u.user_id
              ORDER BY p.post_id DESC LIMIT $start_from, $item_per_page";
$run_posts = mysqli_query($connect, $get_posts);

while ($row_posts=mysqli_fetch_array($run_posts)) {

	$post_id = $row_posts['post_id'];
	$user_id = $row_posts['user_id'];
	$post_title = $row_posts['post_title'];
	$post_content = $row_posts['post_content'];
	$post_date = $row_posts['post_date'];               //todo fix user_id from being a zero 0 or 1

	$user = "SELECT * FROM users WHERE user_id='$user_id' AND posts='yes'";
	$run_user = mysqli_query($connect,$user);
	$row_user = mysqli_fetch_array($run_user);

	$user_name = $row_user['user_name'];
	$user_image = $row_user['user_image'];

//output results from database
echo '<ul class="page_result">';
    echo '<li id="item_' . $post_id . '">
        <div class="img_name_wrap">
            <img class="post_image" src="images/profile/' . $user_image . '" />
        </div>
        <span class="post_date">' . $post_date . '</span>
        <div class="user_name">
            <a href="user_profile.php?user_id=' . $user_id . '">' . $user_name . '</a>
        </div>
        <div class="post_content_all">
            <span class="post_title">' . $post_id . ') ' . $post_title . ' </span>
            <span class="page_message">' . $post_content . '</span>
        </div>
        <div class="clear_float">
            <a class="reply_button" href="single.php?post_id=' . $post_id . '">
                <button>View Replies or Reply</button>
            </a>
        </div>
    </li>';
    echo '</ul>';
}
?>