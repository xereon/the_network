<?php
ob_start();
include "template/header.php"; // FUNCTIONS & SETTINGS INCLUDE todo rename
include "db.php";

// Check if the user_id parameter exists in the URL
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $userId = $_GET['user_id'];
	
    // Check if the connection was successful
    if ($connect === false) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    // Prepare the SQL query to fetch user information
    $query = "SELECT * FROM users WHERE user_id = $userId";

    // Execute the query
    $result = mysqli_query($connect, $query);

    // Check if the query was executed successfully
    if ($result === false) {
        die('Error executing the query: ' . mysqli_error($connect));
    }

    // Check if a matching user was found
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Close the MySQL connection
        mysqli_close($connect);
    } else {
        $user = null; // User not found
    }
} else {
    $user = null; // Invalid user ID
}
ob_end_flush();
?>

<div class="page-wrap container profile profile-form">
    <?php if ($user): ?>
        <div class="profile profile-form">
            <div class="profile-avatar-wrap">
                <img src="images/profile/<?php echo $user['user_image']; ?>" id="profile-avatar" alt="Image for Profile">
            </div>
            <h2><?php echo $user['user_name']; ?></h2>
            <div class="data" id="location"><?php echo $user['user_country']; ?></div>
            <div class="data" id="phone"><?php echo $user['user_phone']; ?></div>
            <div class="data" id="email"><?php echo $user['user_email']; ?></div>
            <div id="about"><?php echo $user['about_me']; ?></div>
            <!-- Add more elements here as needed -->
        </div>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</div>		
<a href="home.php" class="back-to-home-button">Back to Home</a>
<style>
/* Style for the drag and drop area */
.drop-area {
    border: 2px dashed #ccc;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.drop-area.drag-over {
    background-color: #f0f0f0;
}

/* Style for the profile image */
#current-profile-image {
    cursor: pointer;
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #ccc;
    margin-top: 10px;
}
/* Style for the success message */
.success-message {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #42b983;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    margin-top: 20px;
    transition: opacity 0.5s ease, transform 0.5s ease;
    opacity: 1;
    transform: translateY(0);
}

.success-message.fade-out {
    opacity: 0;
    transform: translateY(20px);
}

/* Style for the SVG animation */
.svg-animation {
  width: 80px;
  height: 80px;
  margin-top: 10px;
}

/* Style for the profile image */
#current-profile-image {
    cursor: pointer;
}

/* Style for the upload avatar icon on hover */
#current-profile-image:hover {
    background: url('images/upload-icon.jpg') center/contain no-repeat;
    cursor: pointer;
}




/* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Set a background color and text color */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #555;
}

.profile-form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-group textarea {
    resize: vertical;
}

.form-group button {
    padding: 10px 20px;
    background-color: #42b983;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-group button:hover {
    background-color: #349e74;
}


.svg-animation {
    width: 80px;
    height: 80px;
    margin-top: 10px;
}

/* Additional styling for profile image */
.profile-image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.profile-image-container p {
    margin-top: 10px;
    color: #555;
}

#current-profile-image {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #ccc;
    margin-top: 10px;
    cursor: pointer;
}

#current-profile-image:hover {
    background: url('images/upload-icon.jpg') center/contain no-repeat;
    cursor: pointer;
}

.drop-area {
    border: 2px dashed #ccc;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.drop-area.drag-over {
    background-color: #f0f0f0;
}
/* Style for the hover effect camera icon */
.hover-icon {
    width: 20px;
    height: 20px;
    background: url('images/upload-icon.jpg') center/contain no-repeat;
top: -34px;
left: 280px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

/* Show the hover effect camera icon on label hover */
.drop-area:hover .hover-icon {
    opacity: 1;
}
.back-to-home-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #42b983;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.back-to-home-button:hover {
    background-color: #349e74;
}



/******************************  new drag and drop  *********************************/

* {
  box-sizing: border-box;
}

/* Make sure draggable area is whole page */
html, body {
  height: 100%;
}

body.droppable .profile-avatar-wrap {
  border: 5px dashed lightblue;
  z-index: 9999;
}

.page-wrap {
  width: auto;
  margin: 100px auto;
}

h1 {
  margin: 0 0 30px 0;
  border-bottom: 5px solid #ccc;
}
h3 {
  clear: both;
  margin: 100px 0 0 0;
}

.profile {
  width: 50%;
}
.profile-avatar-wrap {
  width: 33.33%;
  float: left;
  margin: 0 20px 5px 0;
  position: relative;
  pointer-events: none;
  border: 5px solid transparent;
}
.profile-avatar-wrap:after {
  /* Drag Prevention */
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.profile-avatar-wrap img {
  width: 100%;
  display: block;
}
#location {
  text-transform: uppercase;
  color: #999;
  letter-spacing: 1px;
  margin: 0 0 10px 0;
  font-size: 90%;
}

.data {
  color: #999;
  letter-spacing: 1px;
  margin: 0 0 10px 0;
  font-size: 90%;
}

#about {
  letter-spacing: 1.1px;
  margin: 0 0 10px 0;
  letter-spacing: -0.9px;
}

.profile-avatar-wrap {
  position: relative;
}
.profile-avatar-wrap:after {
  /* Drag Prevention */
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
