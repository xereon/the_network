<?php
    include "template/header.php";
    //include("functions/functions.php");
    if(isset($_POST['login'])) {
        $emailorusername = mysqli_real_escape_string($connect, $_POST['emailorusername']);
        $pass = mysqli_real_escape_string($connect, $_POST['pass']);
        /*if ($connect) {
            echo "Connected";
        }*/
        if ($emailorusername == '') {
            //echo $emailorusername = 'NULL';
        }
        $get_user = "SELECT * FROM users WHERE user_email='$emailorusername' OR user_name='$emailorusername' AND user_pass='$pass'";
        $run_user = mysqli_query($connect, $get_user);
        $check = mysqli_num_rows($run_user);

        if($check==1){
            ($_SESSION['user_email']=$emailorusername) || ($_SESSION['user_name']=$emailorusername);
            echo header('Location: home.php','_self');
        } else {
            echo "<h2 style='text-align: center; color: #ff3831'>Login details incorrect!</h2>";
        }
    }
?>
