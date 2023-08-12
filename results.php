<?php include "template/header.php";
	//r_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
<style>
	/* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
    margin-top: 0;
    font-size: 24px;
    color: #333333;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.result {
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f7f7f7;
}

.result p {
    margin: 0;
}

.back-link {
    margin-top: 10px;
}

.back-link a {
    color: #555555;
    font-size: 14px;
}

.back-link a:hover {
    color: #333333;
}
</style>
</head>
<body>
   <div class="container">
        <h1>Search Results</h1>
        <?php
        // Check if the form was submitted
        if (isset($_GET['search'])) {
            // Get the search term from the form
            $searchTerm = $_GET['user_query'];
            
            // Store the search query in a session variable
            $_SESSION['user_query'] = $searchTerm;
            
            // Sanitize user input data
            $searchQuery = isset($_GET['user_query']) ? strip_tags($_GET['user_query']) : '';
            
            // Check if the connection was successful
            if ($connect === false) {
                die('Failed to connect to MySQL: ' . mysqli_connect_error());
            }

            // Prepare the SQL query
            $query = "SELECT * FROM users WHERE user_name LIKE '%$searchTerm%'";

            // Execute the query
            $result = mysqli_query($connect, $query);

            // Check if any results were found
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $profileId = $row['user_id'];
                    $profileUrl = 'profile.php?id=' . $profileId;
                    echo '<div class="result">';
                    echo '<p><a href="' . $profileUrl . '">' . $row['user_name'] . '</a></p>';
                    echo '<p>' . $row['user_name'] . ' <a href="add_friend.php?id=' . $profileId . '">Add Friend</a></p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No results found.</p>';
            }
        }
        ?>
        <div class="back-link">
            <a href="home.php">Back to search</a>
        </div>
    </div>
</body>
</html>