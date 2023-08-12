<h2 align="middle" ">
        Welcome 
    <?php
    $emailorusername = $_SESSION['user_email'];
    $user = "SELECT * FROM users WHERE user_email='$emailorusername' OR user_name='$emailorusername'";
    $run_user = mysqli_query($connect, $user);
    $row_user = mysqli_fetch_array($run_user);

    $user_name = $row_user['user_name'];
    $user_email = $row_user['user_email'];

        if ($emailorusername == ''){
            header('Location: index.php');
        } else {
            // todo echo greating based on time of day

            echo $user_name;
        }
    ?>
    </h2>