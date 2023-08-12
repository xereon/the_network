<?php
/**
 * Created by Ben Gilbey. Ⓒ All rights reserved.
 * Date: 18/01/2016
 * Time: 7:42 AM
 */
session_start();
include ("db.php");
ob_start();
 if(!isset($_SESSION['user_id'])){
        header('location: index.php');
    }
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en_AU" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Welcome!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/home.css" media="all" />
    <link rel="stylesheet" href="styles/style.css" media="all" />
	<link rel="stylesheet" href="styles/styles.css" media="all" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
    <script>
<script>
function generate(inputArray){

    var sunColor = inputArray['sun-color'];
    var radius = inputArray['radius'];
    var sky = inputArray['sky'];
    var beam = inputArray['beam-color'];
    var beamWidth = inputArray['beam-width'];
    var beamCount = inputArray['beam-count'];

    var rotation = 90/beamCount;

            var svg = "<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' xmlns:xlink='http://www.w3.org/1999/xlink'>\n" +
				  "    <radialGradient id='g' gradientUnits='userSpaceOnUse' cx='0' cy='0' r='" + radius + "%'>\n" +
				  "        <stop offset='0%' stop-opacity='0' stop-color='#" + sunColor + "' />\n" +
				  "        <stop offset='100%' stop-opacity='1'  stop-color='#" + sky + "' />\n" +
				  "    </radialGradient>\n" +
				  "    <radialGradient id='g2' gradientUnits='userSpaceOnUse' cx='0' cy='0' r='" + radius + "%'>\n" +
				  "        <stop offset='0%' stop-opacity='.1' stop-color='#" + sunColor + "' />\n" +
				  "        <stop offset='50%' stop-opacity='.5'  stop-color='#" + sky + "' />\n" +
				  "        <stop offset='100%' stop-opacity='.9'  stop-color='#" + sky + "' />\n" +
				  "    </radialGradient>\n" +
				  "    <rect x='0' y='0' width='100%' height='100%' fill='url(#g)' />\n" +
				  "    <rect x='0' y='0' width='100%' height='100%' fill='url(#g2)' />\n" +
				  "    <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' xmlns:xlink='http://www.w3.org/1999/xlink'>\n"
			    "    <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' xmlns:xlink='http://www.w3.org/1999/xlink'>\n" +
				"        <radialGradient id='g' gradientUnits='userSpaceOnUse' cx='0' cy='0' r='" + radius + "%'>\n" +
				"            <stop offset='0%' stop-opacity='0' stop-color='#" + sunColor + "' />\n" +
				"            <stop offset='100%' stop-opacity='1'  stop-color='#" + sky + "' />\n" +
				"        </radialGradient>\n" +
				"        <radialGradient id='g2' gradientUnits='userSpaceOnUse' cx='0' cy='0' r='" + radius + "%'>\n" +
				"            <stop offset='0%' stop-opacity='.1' stop-color='#" + sunColor + "' />\n" +
				"            <stop offset='50%' stop-opacity='.5'  stop-color='#" + sky + "' />\n" +
				"            <stop offset='100%' stop-opacity='.9'  stop-color='#" + sky + "' />\n" +
				"        </radialGradient>\n" +
				"        <rect x='0' y='0' width='100%' height='100%' fill='url(#g)' />\n" +
				"        <rect x='0' y='0' width='100%' height='100%' fill='url(#g2)' opacity='.5' />\n" +
				"        <svg x='50%' y='50%' width='100%' height='100%' viewBox='-50 -50 100 100'>\n
    // Add animation to the lines
    svg += "    <g>\n";
    for(var i = 0; i < beamCount; i++) {
        var x1 = Math.sin((rotation * i) * (Math.PI / 180));
        var y1 = -Math.cos((rotation * i) * (Math.PI / 180));
        var x2 = 2 * x1;
        var y2 = 2 * y1;

        svg += "        <line x1='" + x1 + "' y1='" + y1 + "' x2='" + x2 + "' y2='" + y2 + "'\n";
        svg += "              style='stroke:#" + beam + "; stroke-width:" + beamWidth + ";'/>\n";
    }
    svg += "    </g>\n";

    svg += "</svg>\n";

    return svg;
}
</script>
<div class="container"><!-- container start -->
	<header>
        <?php
        include "images/svg.php";
        include "includes/logo.php";
        ?>
    </header>
