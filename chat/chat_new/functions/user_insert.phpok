<?php
ob_start();
global $connect;

if(isset($_POST['sign_up'])) {
    $first_name = mysqli_real_escape_string($connect,$_POST['f_name']);
    $last_name = mysqli_real_escape_string($connect,$_POST['l_name']);
    $name = mysqli_real_escape_string($connect,$_POST['u_name']);
    $pass = mysqli_real_escape_string($connect,$_POST['u_pass']);
    $email = mysqli_real_escape_string($connect,$_POST['u_email']);
    $country = mysqli_real_escape_string($connect,$_POST['u_country']);
    if(empty($_POST['u_gender'])) {
        $gender = '';
    } else {
        $gender = mysqli_real_escape_string($connect,$_POST['u_gender']);
    }
    $dob_day = mysqli_real_escape_string($connect,$_POST['dob_day']);
    $dob_month = mysqli_real_escape_string($connect,$_POST['dob_month']);
    $dob_year = mysqli_real_escape_string($connect,$_POST['dob_year']);

    $date = date("Y-m-d");
    $status = "unverified";
    $posts = "No";

    $get_email = "SELECT * FROM users WHERE user_email='$email'";
    $run_email = mysqli_query($connect,$get_email);
    $check = mysqli_num_rows($run_email);

    if($check == 1) {

        echo "<h4 style='color: #ff3831; padding-left: 30px; float: left;'>Email already registered!</h4>";
        exit();
    }

    if(strlen($pass) <8) {

        echo "<h4 style='color: #ff3831;'>Password must be atleast 8 characters</h4>";
        exit();

    } else {
        $insert = "insert into users (first_name,last_name,user_name,user_pass,user_email,user_country,user_gender,dob_day,dob_month,dob_year,user_image,user_register_date,user_lastlogin,status,posts) values ('$first_name','$last_name','$name','$pass','$email','$country','$gender','$dob_day','$dob_month','$dob_year','default_user.jpg','$date','$date','$status','$posts')";

        $run_insert = mysqli_query($connect,$insert);

        ob_end_clean();

        if ($run_insert) {
            $_SESSION['user_email']=$email;
            echo header('Location: success.php','_self');
        }
    }
}
?>