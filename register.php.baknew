<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <link rel="stylesheet" href="css/register.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<?php
$fErr = $lErr = $phoneErr = $emailErr = $passErr = $cpassErr = "";
?>

<body>
  <div class="container">
    <div class="signup-box">
      <div class="logo">
        <a href="index.php">
          <div class="ltext">Lakb</div>
          <div class="dtext">AI</div>
        </a>
      </div>
      <h1>Create Account</h1>
      <form method="POST" action="./include/reg-form-handling.php">
        <input type="text" placeholder="First Name" name="fname" value="" required />
        <input type="text" placeholder="Last Name" name="lname" value="" required />
        <input type="tel" placeholder="Contact number" name="phone" value="" />
        <input type="email" placeholder="E-Mail" name="email" value="" required />
        <input type="password" placeholder="Password" name="pass" value="" required />
        <input type="password" placeholder="Confirm Password" name="cpass" value="" required />

        <select class="selectpicker" name="tags[]" multiple required>
          <option value="culture" name="culture">Culture & History</option>
          <option value="nature">Nature & Adventure</option>
          <option value="art">Art & Museums</option>
          <option value="culinary">Culinary & Nightlife</option>
          <option value="summer">Summer experience</option>
        </select>
        <button type="submit" name="submit">Register</button>
      </form>
    </div>
    <p class="para-2">
      Already have LakbAI account? <a href="login.php">Login Here</a>
      <!--Pakipalitan na lang po-->
    </p>
  </div>



  <?php

  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Fill in all fields</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "uname_tooshort") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Username should contain atleast 5 characters</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "invalid_email") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Invalid Email Address</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "pwd_tooshort") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Password should contain at least 8 characters</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "invalid_password") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Password should not contain symbols</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "pwd_notmatch") {
      echo ' <div class="alert show showAlert">
    <span class="fas fa-exclamation-circle"></span>
    <span class="msg">Password does not match</span>
    <div class="close-btn">
       <span class="fas fa-times"></span>
    </div></div>';
    } else if ($_GET["error"] == "username_taken") {
      echo ' <div class="alert show showAlert">
  <span class="fas fa-exclamation-circle"></span>
  <span class="msg">Username is already taken.</span>
  <div class="close-btn">
     <span class="fas fa-times"></span>
  </div></div>';
    } else if ($_GET["error"] == "email_taken") {
      echo ' <div class="alert show showAlert">
  <span class="fas fa-exclamation-circle"></span>
  <span class="msg">Email is already is use.</span>
  <div class="close-btn">
     <span class="fas fa-times"></span>
  </div></div>';
    }
  }
  ?>
</body>

</html>