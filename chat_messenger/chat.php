<?php

include 'db.php';

global $connect;

$sql = "SELECT * FROM chat ORDER BY id DESC";

$run = mysqli_query($connect,$sql);

while($row = mysqli_fetch_array($run)) {

    $name = $row['name'];
    $msg = $row['msg'];
    $date = formatDate($row['date']);

    echo '
            <div class="chat_data">
                <span>'.$name.': </span>
                <span>'.$msg.'</span>
                <span>'.$date.'</span>
            </div>';
}
?>