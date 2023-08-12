<?php
$get_id = $_GET['post_id'];

$get_com = "SELECT * FROM comments WHERE post_id='$get_id' ORDER BY 1 ASC";

$run_com = mysqli_query($con,$get_com);

while($row=mysqli_fetch_array($run_com)) {

    $com = $row['comment'];
    $com_name = $row['comment_author'];
    $date = $row['date'];

    echo '<br>
    <div class="comments">
    <div style="
    border: 0px solid #B0C7D6;
    border-radius: 3px;
    background: #EFF7FE;
    padding: 5px;
    margin-bottom: 5px;
    font-size: 12px;
    list-style: none;" 
    margin: none;>
    '.$com_name.'
    <h6 style="text-align: right;">
    '.$date.'</h6><div>
    <!--i>Said on</i-->
    <p>'.$com.'</p>
    <br>
    </div>
    </div>
    ';
}
?>
