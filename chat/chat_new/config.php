<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "chat_new";
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$connect) {
die("Failed to connect to the database: " . mysqli_connect_error());
}
/*if ($connect) { // code for testing database connection
           echo "Connected";
}*/
//$item_per_page = 5;
?>