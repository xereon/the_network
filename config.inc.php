<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'chat_new';
$item_per_page = 5;

$con = mysqli_connect("localhost", "root", "", "chat_new") or die("Connection was not established");
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

?>
