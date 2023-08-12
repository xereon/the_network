<?php include "template/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Members</title>
    <link rel="stylesheet" href="styles/home.css" />
    <link rel="stylesheet" href="styles/members.css" /> <!-- New stylesheet for member page -->
<style>
/* members.css */

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
}

.members-list {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.member {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

.member img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.member a {
    text-decoration: none;
    color: #333;
}

.user-details {
    flex: 1;
    background-color: #f5f5f5;
    padding: 20px;
    border-left: 1px solid #ccc;
}

.user-profile {
    text-align: center;
}

.user-profile img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.back-link {
    margin-top: 20px;
}

.back-link a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

/* Responsive layout adjustments */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }

    .members-list {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
</head>
<body>
    <div class="container">
        <h1>Members</h1>

        <div class="members-list">
            <?php
            // Check if the connection was successful
            if ($connect === false) {
                die('Failed to connect to MySQL: ' . mysqli_connect_error());
            }

            // Prepare the SQL query to fetch members
            $query = "SELECT * FROM users";

            // Execute the query
            $result = mysqli_query($connect, $query);

            // Check if the query was executed successfully
            if ($result === false) {
                die('Error executing the query: ' . mysqli_error($connect));
            }

            // Check if any members were found
            if (mysqli_num_rows($result) > 0) {
                // Loop through the members and display their information
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="member">';
                    echo '<img src="images/profile/' . $row['user_image'] . '"/>';
                    echo '<p><a href="profile.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a></p>';
                    // Add more member information as needed
                    echo '</div>';
                }
            } else {
                echo '<p>No members found.</p>';
            }
            ?>
        </div>

        <div class="user-details">
            <?php
			if (isset($_SESSION['user_email'])) {
            // Display user details
            $user_email = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email='$user_email' OR user_name='$user_email'";
            $run_user = mysqli_query($connect, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_country = $row['user_country'];
            $user_image = $row['user_image'];
            $register_date = $row['user_register_date'];
            $last_login = $row['user_lastlogin'];

            echo "
                <div class='user-profile'>
                    <img src='images/profile/$user_image'/>
                    <p><strong>Name: </strong>$user_name</p>
                    <p><strong>Country: </strong>$user_country</p>
                    <p><strong>Last Login: </strong>$last_login</p>
                    <p><strong>Member Since: </strong>$register_date</p>
                    <p><a href='chat/'>Messages (2)</a></p>
                    <p><a href='my_posts.php'>My Posts (3)</a></p>
                    <p><a href='edit_profile.php'>Edit My Account</a></p>
                    <p><a href='logout.php'>Logout</a></p>
                </div>
            ";
			}
            ?>
        </div>

        <div class="back-link">
            <a href="home.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
