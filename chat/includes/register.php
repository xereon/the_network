<style>
    .form_login, .content img {display: none;}
    .form_register {position: absolute; top: 24.5vh; margin: 0 auto; display: inline; right: -15%; left: -15.5%;}
    fieldset#register_form {
    border: 1px solid #B0C7D6;
    border-radius: 5px;
    cursor: default;
    position: absolute;
    top: 0vh;
    }
</style>
<form class="form form_register form_padding" action="" method="post">
    <fieldset id="register_form">
        <legend>Sign Up:</legend>
        <div class="form form_register_a form_padding">
            <div>
                <label for="u_name">Username:</label>
                <input required="required" type="text" tabindex="6" name="u_name" id="u_name" placeholder="Enter your username">
            </div>
            <div>
                <label for="u_pass">Password:</label>
                <input required="required" type="password" class="password" tabindex="7" name="u_pass" id="u_pass" placeholder="Enter your password">
                <!-- Password strength indicator here -->
            </div>
            <div>
                <label for="u_confirm_pass">Confirm Password:</label>
                <input required="required" type="password" class="password" tabindex="8" name="u_confirm_pass" id="u_confirm_pass" placeholder="Confirm your password">
            </div>
            <div>
                <label for="f_name">First Name:</label>
                <input required="required" type="text" tabindex="9" name="f_name" id="f_name" placeholder="Enter your first name">
            </div>
            <div>
                <label for="l_name">Last Name:</label>
                <input required="required" type="text" tabindex="10" name="l_name" id="l_name" placeholder="Enter your last name">
            </div>
            <div>
                <label for="u_email">Email:</label>
                <input required="required" type="email" tabindex="11" name="u_email" id="u_email" placeholder="Enter your email address">
            </div>
        </div> <!-- form_register_a END -->
        <div class="form form_register_b form_padding">
        <div>
            <label for="u_country">Country:</label>
            <select required="required" class="form_select" tabindex="12" name="u_country" id="u_country">
                <!--option> - Country - </option-->
                <option value="AUS" <selected="selected">Australia</option>
                <!--option value="AUT">Austria</option--> 
            </select>
        </div>
            <div>
                <label for="dob">Date of Birth:</label>
                <input required="required" type="date" name="dob" id="dob" tabindex="15">
            </div>
            <div><br />
                <input type="submit" name="sign_up" value="Sign Up"  tabindex="16">
            </div>
        </div><!-- form_register_b END -->
        <br />
        <p><a href="index.php">Back to Sign In</a></p>
    </fieldset>
</form>
<?php
    include './functions/user_insert.php';
?>