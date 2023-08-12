<?php
/**
 * Created by Ben Charles Gilbey. Ⓒ All rights reserved.
 * Date: 18/01/2016
 * Time: 7:42 AM
 */
ob_start();
session_start();
if(!isset($_SESSION['user_email'])){
    header('location: index.php');
}
// $connect = mysqli_connect("127.0.0.1", "root", "password", "chat") or die("Connection was not established");
// include "functions/functions.php";
//include("db.php");

// $get_total_rows = 0;
// $results = $connect->query("SELECT COUNT(*) FROM posts");
// if($results){
//     $get_total_rows = $results->fetch_row();
// }

// //break total records into pages
// $total_pages = ceil($get_total_rows[0]/$item_per_page);

?>