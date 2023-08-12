<ul class="menu">
    <li><a href="home.php">Home</a></li>
    <li><a href="members.php">Members</a></li>
    <li><a href="/social_network/chat/index.php">Chat</a></li>
    <li><strong>Topics:</strong></li>
<?php
    $get_topics = "SELECT * FROM topics";
    $run_topics =  mysqli_query($connect, $get_topics);

    while ($row = mysqli_fetch_array($run_topics)) {
        $topic_id = $row['topic_id'];
        $topic_title = $row['topic_title'];

        echo "<li><a href='home.php?topic=$topic_id'>$topic_title</a>&nbsp;</li>";
    }
?>
</ul>