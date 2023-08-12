<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "chat_new";

$connect = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

/*if ($connect) {
           echo "Connected";
}*/////////////////////////// code for testing database connection

/*************** DateTime- To -Time Function ****************/
function formatDate($date) {
    return date('g:i a', strtotime($date));
}
?>
