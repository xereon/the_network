<?php
include "db.php"; // Include your database connection

if (isset($_GET['post_id'])) {
    $post_id = mysqli_real_escape_string($connect, $_GET['post_id']);

    $get_comments = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY date ASC";
    $run_comments = mysqli_query($connect, $get_comments);

    $comments = array();

    while ($row = mysqli_fetch_assoc($run_comments)) {
        $comments[] = $row;
    }

    // Return comments as JSON
    echo json_encode($comments);
} else {
    echo json_encode(array()); // Return an empty array if post_id is not provided
}
?>
