<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location: index.php');
    }
    ob_end_flush();
	include "template/header.php"; // FUNCTIONS & SETTINGS INCLUDE todo rename
	
    $get_total_rows = 0;
    $results = $connect->query("SELECT COUNT(*) FROM posts");
    if($results){
        $get_total_rows = $results->fetch_row();
    }

    //break total records into pages
    $total_pages = ceil($get_total_rows[0]/$item_per_page);
?>

