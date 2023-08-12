<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

include 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && isset($_POST['user_id']) && $_POST['user_id'] == $_SESSION['user_id']) {
        $image = $_FILES['image'];
		$file = $_FILES['image'];

    // Check the image format using getimagesize
    $imageInfo = getimagesize($file['tmp_name']);
    $imageType = $imageInfo[2];

    // Determine the appropriate image creation function based on image type
    if($imageType === IMAGETYPE_JPEG) {
        $srcImage = imagecreatefromjpeg($file['tmp_name']);
    } elseif($imageType === IMAGETYPE_PNG) {
        $srcImage = imagecreatefrompng($file['tmp_name']);
    } elseif($imageType === IMAGETYPE_GIF) {
        $srcImage = imagecreatefromgif($file['tmp_name']);
    } elseif($imageType === IMAGETYPE_BMP) {
        $srcImage = imagecreatefrombmp($file['tmp_name']); // Note: Requires an external library
    } else {
        // Handle unsupported image format
        die("Unsupported image format");
    }

        // Check for errors during upload
        if ($image['error'] === 0) {
            $targetDir = 'images/profile/'; // Set your target directory
            $targetFile = $targetDir . basename($image['name']);
            
			// Sanitize the filename to remove any potentially dangerous characters
			$targetFile = $targetDir . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '', basename($image['name']));

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

            // Clean up resources
            imagedestroy($srcImage);

            // Send a success response
            $response = ['success' => true];
            // Output the JSON response for debugging
            header('Content-Type: application/json');
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            // Error during upload
            $response = ['success' => false, 'message' => 'Upload error: ' . $image['error']];
            // Output the JSON response for debugging
            header('Content-Type: application/json');
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}
?>