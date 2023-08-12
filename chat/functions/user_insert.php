<?php
ob_start();
global $connect;

if (isset($_POST['sign_up'])) {
    $first_name = mysqli_real_escape_string($connect, $_POST['f_name']);
    $last_name = mysqli_real_escape_string($connect, $_POST['l_name']);
    $name = mysqli_real_escape_string($connect, $_POST['u_name']);
    $pass = mysqli_real_escape_string($connect, $_POST['u_pass']);
    // Password hashing
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($connect, $_POST['u_email']);
    $country = mysqli_real_escape_string($connect, $_POST['u_country']);
    $user_dob = mysqli_real_escape_string($connect, $_POST['user_dob']); // Corrected here

    $user_dob = date("Y-m-d");

    $date = date("Y-m-d");
    $status = "unverified";
    $posts = "No";

    $get_email = "SELECT * FROM users WHERE user_email='$email'";
    $run_email = mysqli_query($connect, $get_email);
    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "<h4 style='color: #ff3831; padding-left: 30px; float: left;'>Email already registered!</h4>";
        exit();
    }

    if (strlen($pass) < 8) {
        echo "<h4 style='color: #ff3831;'>Password must be at least 8 characters</h4>";
        exit();
    } else {
          // Insert the user data into the database
    $insert = "INSERT INTO users (first_name, last_name, user_name, user_pass, user_email, user_country, user_dob, user_image, user_register_date, user_lastlogin, status, posts) VALUES ('$first_name', '$last_name', '$name', '$hashed_password', '$email', '$country', '$user_dob', 'default_user.jpg', '$date', '$date', '$status', '$posts')";
    $run_insert = mysqli_query($connect, $insert);

    ob_end_clean();

    if ($run_insert) {
        $_SESSION['user_email'] = $email;
        header('Location: success.php', true, 303); // Use 303 status code for redirection
        exit();
        }
    }
}
?>
