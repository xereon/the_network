<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

include 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && isset($_POST['user_id']) && $_POST['user_id'] == $_SESSION['user_id']) {
        $image = $_FILES['image'];

        // Check for errors during upload
        if ($image['error'] === 0) {
            $targetDir = 'images/profile/'; // Set your target directory
            $targetFile = $targetDir . basename($image['name']);
            
            // Resize the image to desired dimensions (e.g., 200x200)
            $desiredWidth = 250;
            $desiredHeight = 250;
            
            // Get the uploaded image's dimensions
            list($originalWidth, $originalHeight) = getimagesize($image['tmp_name']);

            // Create a new image with desired dimensions
            $resizedImage = imagecreatetruecolor($desiredWidth, $desiredHeight);

            // Load the uploaded image
            $sourceImage = imagecreatefromjpeg($image['tmp_name']);

            // Resize the image
            imagecopyresized($resizedImage, $sourceImage, 0, 0, 0, 0, $desiredWidth, $desiredHeight, $originalWidth, $originalHeight);

            // Save the resized image
            imagejpeg($resizedImage, $targetFile, 90);

            // Free up memory
            imagedestroy($resizedImage);
            imagedestroy($sourceImage);

            // Update the user's profile image in the database
            $updateImageQuery = "UPDATE users SET user_image = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($connect, $updateImageQuery);
            mysqli_stmt_bind_param($stmt, "si", basename($targetFile), $_SESSION['user_id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Send a success response
            $response = ['success' => true];
        } else {
            // Error during upload
            $response = ['success' => false, 'message' => 'Upload error: ' . $image['error']];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
