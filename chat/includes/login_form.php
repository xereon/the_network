<form class="form_login" method="post" action="./login.php">
<h1>Messenger</h1>
    <fieldset>
        <legend>Sign In:</legend>
        <div>
            <label for="emailorusername"></label>
        </div>
        <input required="required" type="text" name="emailorusername" id="emailorusername" value="" placeholder="Username or Email" />

        <div>
            <label for="pass"></label>
            <input required="required" type="password" name="pass" id="pass" value="" placeholder="Password" />
        </div>
        <div>
            <input type="hidden" name="session_id" value="<?php echo session_id(); ?>">
            <input type="submit" name="login" value="Sign In">
        </div>
        <P>
            <!-- Link to the registration form page with the "action" parameter set to "register" -->
            <a href="?action=register">Click here to Sign Up</a>
        </P>
    </fieldset>
</form> 
<style>
h1.logo {
    /* background: linear-gradient(to top, #048dfd8d, #9907facc), url(https://picsum.photos/1280/853/?random=1) no-repeat  left; */
    background: linear-gradient(to top, #3902ff5e, #1596ff99), url(https://concise.design/chat_new/images/logo_new_w.png) no-repeat center;    /* background-image: url("https://concise.design/chat_new/images/logo_new_w.png"); */
    /*! background-size: auto; */
    /*! background-repeat: no-repeat; */ 
    /*! content: '/01f754'; */
    /*! position: initial; */
    font-family: 'Arial', sans-serif;
    font-size: 0px;
    /*! width: 90px; */
    line-height: 90px;
    z-index: 200;
    font-weight: bold;
    text-align: center;
    top: -67px;
    /* position: relative; */
    color: rgb(255, 255, 255);
    /*! display: inline; */
    top: 100px;
    height: 100vh;
}
fieldset {
    border: 1px solid #B0C7D6;
    border-radius: 5px;
    cursor: default;
    position: absolute;
    top: 33.3vh;
}
</style>