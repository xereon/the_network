<?php
ob_start();
session_start();
include "db.php";
if(!isset($_SESSION['user_email'])){
    header('location: ../index.php');
}
//$connect = mysqli_connect("127.0.0.1", "root", "", "chat_new") or die("Connection was not established");
//include "functions/functions.php";
//include("../config.inc.php");

/*$get_total_rows = 0;
$results = $mysqli->query("SELECT COUNT(*) FROM posts");
if($results){
    $get_total_rows = $results->fetch_row();
}*/

//break total records into pages
//$total_pages = ceil($get_total_rows[0]/$item_per_page);

?>
