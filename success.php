<?php
ob_start();
include 'includes/logo.php';
include 'db.php';
// Wait for 3 seconds before redirecting
sleep(3);

// Redirect to home.php
header('Location: home.php');
ob_end_clean();
exit();
?>
<style>
h1.logo {
  content: "/01f754";
  font-size: 100px;
  z-index: 200;
  text-align: center;
}
h1, h2 {
  cursor: default;
}
</style>
<div>
<h1 class="logo"></h1>
<h2  style='text-align: center; color: #1e8ffe'>Success!</h2>
<p  style='text-align: center; color: #1E8FFE'>redirecting...</p>
</div>