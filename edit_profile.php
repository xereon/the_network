<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "template/header.php";
include "db.php"; // Include your database connection
// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];
    // Get the user ID from the session
    $userId = $_SESSION['user_id'];
}

// Check if the user is authorized to edit
if ($loggedInUserId !== $userId) {
    // Redirect with an unauthorized status code
    header("HTTP/1.1 401 Unauthorized");
    exit();
}

// Retrieve the user's current profile information from the database
$user = null; // Initialize the user variable

// Implement a function to get user data by ID
function getUserById($userId, $connect) {
    $query = "SELECT * FROM users WHERE user_id = $userId";
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($result);
}

// Fetch user data by ID
$user = getUserById($userId, $connect);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve the form data
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $country = mysqli_real_escape_string($connect, $_POST['country']);
    $about = mysqli_real_escape_string($connect, $_POST['about']); // Assuming there's a textarea for about

    // Update the user's profile information in the database
    $updateQuery = "UPDATE users SET user_name = '$name', user_email = '$email', user_country = '$country', about_me = '$about', user_phone = '$phone' WHERE user_id = $userId";
    $updateResult = mysqli_query($connect, $updateQuery);

    // Check if the update was successful
    if ($updateResult) {
	// Check if the update was successful
    $_SESSION['profile_update_success'] = true;
        // Redirect to the profile page with a success message
        header("Location: edit_profile.php?message=success");
		ob_clean();
        exit();
    } else {
        // Display an error message
        $error = "Failed to update profile. Please try again.";
    }
}

// Fetch user data by ID
$user = getUserById($userId, $connect);
?>

<!DOCTYPE html>
<html lang="en_AU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropArea = document.getElementById('drop-area');
        const currentProfileImage = document.getElementById('current-profile-image');

        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('drag-over');
            console.log("Drag over event");
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('drag-over');
            console.log("Drag leave event");
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.classList.remove('drag-over');
            console.log("Drop event");

            const file = event.dataTransfer.files[0];
            console.log("Dropped file:", file);
            handleImageUpload(file);
        });

        // Function to handle image upload
        function handleImageUpload(file) {
            console.log("Handling image upload...");
            const formData = new FormData();
            formData.append('image', file);
            formData.append('user_id', <?php echo $_SESSION['user_id']; ?>);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_profile_image.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText); // Output the response text for debugging
                        const response = JSON.parse(xhr.responseText);
                        console.log("Server response:", response);
                        if (response.success) {
                            const newProfileImagePath = 'images/profile/' + file.name;

                            // Clear the current src attribute and then reassign it
                            currentProfileImage.src = ''; // Clear src
                            currentProfileImage.src = newProfileImagePath; // Reassign src

                            console.log("Image upload successful.");
                        } else {
                            console.log("Image upload failed:", response.message);
                        }
                    } else {
                        console.log('Request failed with status:', xhr.status);
                    }
                }
            }

            xhr.send(formData);
        }
    });
</script>
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>

        <?php if (isset($_GET['message']) && $_GET['message'] === 'success') : ?>
            <div class="success-message" id="success-message">
                <p>Your profile changes have been saved!</p>
                <div class="svg-animation">
                    <!-- SVG animation code here -->
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (!empty($user)): ?>
             <form method="POST" action="edit_profile.php" class="profile-form">
                <div class="profile-image-container">
					<label for="image-input" id="drop-area" class="drop-area">
						<img id="current-profile-image" src="images/profile/<?php echo $user['user_image']; ?>?t=<?php echo time(); ?>" alt="Current Image">
						<input type="file" id="image-input" class="image-input"	accept="image/*" style="display: none;">
						<div class="hover-icon"></div>
					</label>
					<p>Click the image to change your profile picture</p>
				</div>

                <!-- Form fields -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $user['user_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $user['user_email']; ?>" required>
                </div>
				<div class="form-group">
					<label for="phone">Phone Number:</label>
					<input type="tel" id="phone" name="phone" value="<?php echo $user['user_phone']; ?>">
				</div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" value="<?php echo $user['user_country']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="about">About Me:</label>
                    <textarea id="about" name="about"><?php echo $user['about_me']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Save Changes</button>
                </div>
            </form>
        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?>
		<a href="home.php" class="back-to-home-button">Back to Home</a>
    </div>
<script> //Drag-and-Drop Image Upload
document.addEventListener("DOMContentLoaded", function() {
    // Get references to the image and file input elements
    const profileImage = document.getElementById("current-profile-image");
    const imageInput = document.getElementById("image-input");

    // Add a click event listener to the profile image
    profileImage.addEventListener("click", function() {
        console.log("Profile image clicked");
        // Trigger a click on the file input element
        imageInput.click();
    });

    // JavaScript for drag and drop functionality
    const dropArea = document.getElementById('drop-area');
    const currentProfileImage = document.getElementById('current-profile-image');

    dropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropArea.classList.add('drag-over');
        console.log("Drag over event");
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('drag-over');
        console.log("Drag leave event");
    });

    dropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        dropArea.classList.remove('drag-over');
        console.log("Drop event");

        const file = event.dataTransfer.files[0];
        console.log("Dropped file:", file);
        handleImageUpload(file);
    });

   // Function to handle image upload
function handleImageUpload(file) {
    console.log("Handling image upload...");
    const formData = new FormData();
    formData.append('image', file);
    formData.append('user_id', <?php echo $_SESSION['user_id']; ?>);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_profile_image.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Output the response text for debugging
                const response = JSON.parse(xhr.responseText);
                console.log("Server response:", response);
                if (response.success) {
                    const newProfileImagePath = 'images/profile/' + file.name;

                    // Clear the current src attribute and then reassign it
                    currentProfileImage.src = ''; // Clear src
                    currentProfileImage.src = newProfileImagePath; + '?' + new Date().getTime(); // Reassign src

                    console.log("Image upload successful. Redirecting...");
                    window.location.href = 'edit_profile.php';
                } else {
                    console.log("Image upload failed:", response.message);
                }
            } else {
                console.log('Request failed with status:', xhr.status);
            }
        }
    }

    xhr.send(formData);
}


    // Function to redirect after a certain time
    function redirectToEditProfile() {
        console.log("Redirecting to edit profile page...");
        window.location.href = 'edit_profile.php';
    }
}); // Closing brace for DOMContentLoaded event listener
</script>
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

    <!-- Add your script tags here -->
</body>
</html>