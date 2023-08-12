<style>
.form_login, .content img {display: none;}

fieldset#register_form legend {
	color: #fffc;
	font-size: x-large;
}
fieldset#register_form {
    border: 1px solid #B0C7D6;
    border-radius: 5px;
    cursor: default;
    position: absolute;
	color: #fff;
	width: 256px;
    }
span.logo {
    /* background: linear-gradient(to top, #048dfd8d, #9907facc), url(https://picsum.photos/1280/853/?random=1) no-repeat  center; */
    background: linear-gradient(to top, #3902ff5e, #1596ff99), url(https://concise.design/chat_new/images/logo_new_w.png) no-repeat center;    /* background-image: url("https://concise.design/chat_new/images/logo_new_w.png"); */
    /*! background-size: auto; */
    /*! background-repeat: no-repeat; */ 
    /*! content: '/01f754'; */
    /*! position: initial; */
    font-family: 'Arial', sans-serif;
    font-size: 0px;
    /*! width: 90px; */*/
    /*
    z-index: 200;
    font-weight: bold;
    text-align: center;
    /* position: relative; */
    color: rgb(255, 255, 255);
    /*! display: inline; */
    height: 100vh;
}
</style>
<div  class="floating-form" id="floatingForm" id="div1">
<form class="form form_register floating-form" action="" method="post">
<h1>Account</h1>
    <fieldset id="register_form">
        <legend>Sign Up:</legend>
        <div class="form_padding">
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
                <input type="text" tabindex="9" name="f_name" id="f_name" placeholder="Enter your first name">
            </div>
            <div>
                <label for="l_name">Last Name:</label>
                <input type="text" tabindex="10" name="l_name" id="l_name" placeholder="Enter your last name">
            </div>
            <div>
                <label for="u_email">Email:</label>
                <input required="required" type="email" tabindex="11" name="u_email" id="u_email" placeholder="Enter your email address">
            </div>
			<div>
                <label for="u_phone">Phone Number:</label>
                <input type="phone" tabindex="11" name="u_phone" id="u_phone" placeholder="Enter your email address">
            </div>
			<div>
				<label for="u_country">Country:</label>
				<select class="form_select" tabindex="12" name="u_country" id="u_country">
					<!--option> - Country - </option-->
					<option value="AUS" <selected="selected">Australia</option>
					<!--option value="AUT">Austria</option--> 
				</select>
			</div>
            <div>
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" tabindex="15">
            </div>
            <div><br />
                <input type="submit" name="sign_up" value="Sign Up"  tabindex="16">
            </div>
        <br />
        <p><a href="index.php">Back to Sign In</a></p>
    </fieldset>
  </form>
</div>
<span class="logo full-screen" id="div1">CONCISE.DESIGN</span>
<!--script>
// Get the floating form element
const floatingForm = document.getElementById('floatingForm');

// Add event listeners to trigger rotation on focus and blur
const formInput = floatingForm.querySelector('input[type="text"]');
formInput.addEventListener('focus', () => {
  floatingForm.classList.add('focused');
});

formInput.addEventListener('blur', () => {
  floatingForm.classList.remove('focused');
});
</script-->
<?php
    include './functions/user_insert.php';
?>
<style>
/* Apply rotation when the form input is focused */
#floatingForm:focus-within {
  transform: rotate(0deg);
}

/* Apply rotation on hover for the floating form */
/*.floating-form:hover {
  transform: rotate(-20deg);
}*/
         body {
          font-family: Arial, sans-serif;
          display: flex;
          justify-content: center;
          min-height: 100vh;
		  background-color: #3fb0dc7d;
      }
	  /* Apply basic styling to full-screen divs */
.full-screen {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

/* Style for the first full-screen div */

/*#div1:hover, #div1:focus {} {
	transform: rotate(-20deg);
}*/

#div1 {
  background-color: none;
  padding: 0;
  transform: rotate(20deg);
  background: linear-gradient(to top, #3902ff5e, #1596ff99), url(https://concise.design/chat_new/images/logo_new_w.png) no-repeat center;
}

/* Style for the second full-screen div */
#div2 {
  background-color: lightgreen;
  z-index: -1;
  display:none;
	  }

/* Style for the floating form */
.floating-form {
  /*position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);*/
  background-color: #fff6;
background-color: #fff6;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
z-index: 1000;
display: inline-table;
height: 730px;
padding: 30px;
}


fieldset {
    border: 1px solid #B0C7D6;
    border-radius: 5px;
    cursor: default;
	display: sticky;
}

      .login-container {
          background-color: #fff;
          border-radius: 10px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          padding: 40px;
          width: 400px;
		  background-color: #3fb0dc7d;
      }

      h1 {
          display: flex;
          align-items: center;
          font-size: 32px;
          color: #333;
      }

      h1::before {
          content: "";
          display: inline-block;
          width: 50px;
          height: 50px;
          background-image: url("images/logo_new.png");
          background-size: cover;
          margin-right: 10px;
          border-radius: 50%;
      }

      form {
          margin: 30px;
		  height: 60vh;
      }

      /*label {
          display: block;
          font-size: 16px;
          color: #333;
          margin-bottom: 5px;
      }*/

      input[type="text"],
      input[type="password"] {
          width: auto;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          margin-bottom: 20px;
      }

      button {
          background-color: #007bff;
          color: #fff;
          border: none;
          border-radius: 5px;
          padding: 10px 20px;
          font-size: 16px;
          cursor: pointer;
          transition: background-color 0.3s;
      }

      button:hover {
          background-color: #0056b3;
      }

      p {
          margin-top: 20px;
          font-size: 14px;
      }

      a {
          color: #007bff;
          text-decoration: none;
          transition: color 0.3s;
      }

      a:hover {
          color: #0056b3;
      }
    
	
	/*Form Styling*/
	
	
.form {
    /* background-color: #297EBD55;  */        /*************** FORM BACKGROUND COLOUR *****************/
    z-index: 1000;
    /* background-color: #297EBD55; */
    /* position: relative; */
    margin: 0 auto;
}

.form_login {
    /* background-color: #297EBD; */
    width: 280px;
    position: relative;    
    z-index: 3000;
    float: none;
    margin: 0 auto;
    padding-top: 20px;
    /* top: 33vh; */
}

.form_login fieldset input {
    width:  167px;
    padding: 10px;
    color: midnightblue;
    background-color: #fffc;
}

.form_login input[type='submit'] {
    width: 188px;
    margin: 0px;
	color: #333;
	background-color: #fff6;
}

.form_login input {
    padding: 3px;
    color: #333;
	background-color: #fffc;
}

.form_login input:focus {
    color: #333;
	background-color: #fffc;
}

.form_register {
    width: 280px;
    /* position: relative; */
    /* top: -100px; */
}

.form_register input:focus {
    color: #333;
}

.form_register input {
    width: 250px;
    background-color: #fff6;
}

.form_select {
    width: 257px;
    background-color: #8fabff;
}

.form input[type='submit'] {
    width: auto;
    padding: 10px 20px 10px 20px;
}

.form input[type='radio'] {
    width: auto;
    margin: 3px;
    margin-left: 80px;
}

input[type="radio"] {
    margin-left: 10px;
}

/* input[type="submit"] {
    color: #1A75B9;
    font-weight: normal;
} */
                              /**********  Label Styles   **************/
label {
    cursor: default;
    font-weight: 700;
    padding: -10px;
}
input, select {
    margin: 0px;
    margin-bottom: 3px;
    border: 1px solid #b0c7d6;
    border-radius: 3px;
    /*border: 1;*/
    /* background-color: aliceblue; */
    background-color: #f8faff70;
}

input[type="radio"]:checked+label{
    font-weight: 900;
}

.clear_float {
    clear: both;
}

.wallpaper img {
    opacity: 0.3;
    z-index: -1;
    position: absolute;
}

.wallpaper {
    z-index: -100;
}
                                /**********  Label Styles   **************/

html {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

svg {
    float: left;
    width: 100%;
}

input[type="checkbox"] {
    appearance: none;
    width: 40px;
    height: 20px;
    background: #ccc;
    outline: none;
    border-radius: 20px;
    cursor: pointer;
    position: relative;
    transition: background 0.3s;
}

input[type="checkbox"]:checked {
    background: #4caf50;
}

input[type="checkbox"]::before {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background: #fff;
    border-radius: 20px;
    left: 0;
    transition: left 0.3s;
}

input[type="checkbox"]:checked::before {
    left: 20px;
}

/*****************************************************   @media style  ***********************************/

</style>