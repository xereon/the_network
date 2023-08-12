<?php
    include "../template/chat_header.php"; // FUNCTIONS & SETTINGS INCLUDE todo rename
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Live Chat</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" media="all">
    <script>
        function ajax() {

            var req = new XMLHttpRequest();

            req.onreadystatechange = function() {

                if(req.readyState == 4 && req.status == 200) {

                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET','chat.php',true);
            req.send();
        }
        setInterval(function(){ajax()},1000);
    </script>
</head>
<body onload="ajax();">
<div class="container">
    <div class="chat_box">
        <div id="chat"></div>
        <div class="chat_input_wrap">
                <form method="post" action="">
                    <input required="required" type="text" name="name" placeholder="enter name" />
                    <textarea required="required" name="msg" placeholder="enter message"></textarea>
                    <div class="send_button">
                        <input type="submit" name="submit" value="Send" />
                    </div>
                </form>
        </div>
    </div>

    <?php

    global $connect;

            if(isset($_POST['submit'])){

                $name = $_POST['name'];
                $msg = $_POST['msg'];

                $query = "INSERT INTO chat (name,msg) VALUES ('$name','$msg')";

                $run_insert = mysqli_query($connect,$query);

                if($run_insert) {
                    echo "<embed type='audio/mp3' loop='false' src='sound.mp3' hidden='true' autoplay='true' />";
                }
            }
    ?>

</div>
</body>
</html>
