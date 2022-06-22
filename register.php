<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://kit.fontawesome.com/8e42a01d1f.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <link rel="stylesheet" href="css/register.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<?php
$temp1 = $temp2 = $temp3 = $temp4 = "";
if (isset($_GET['fname'])) {
  $temp1 = $_GET['fname'];
}
if (isset($_GET['lname'])) {
  $temp2 = $_GET['lname'];
}
if (isset($_GET['phone'])) {
  $temp3 = $_GET['phone'];
}
if (isset($_GET['email'])) {
  $temp4 = $_GET['email'];
}
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
        <input type="text" placeholder="First Name" name="fname" value="<?php echo $temp1 ?>" />
        <input type="text" placeholder="Last Name" name="lname" value="<?php echo $temp2 ?>" />
        <input type="tel" placeholder="Contact number" name="phone" value="<?php echo $temp3 ?>" />
        <input type="email" placeholder="E-Mail" name="email" value="<?php echo $temp4 ?>" />
        <input type="password" placeholder="Password" name="pass" value="" />
        <input type="password" placeholder="Confirm Password" name="cpass" value="" />

        <select class="selectpicker" name="tags[]" multiple>
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
    if ($_GET["error"] == "emptyfname") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Fill in all fields</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "invalidfname") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Name should have no spaces and numbers</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "emptylname") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Fill in all fields</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "invalidlname") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Name should have no spaces and numbers</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "emptypass") {
      echo ' <div class="alert show showAlert">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg">Password is required!</span>
      <div class="close-btn">
         <span class="fas fa-times"></span>
      </div></div>';
    } else if ($_GET["error"] == "invalidpass") {
      echo ' <div class="alert show showAlert">
    <span class="fas fa-exclamation-circle"></span>
    <span class="msg">Password should be Minimum eight characters, at least one letter and one number</span>
    <div class="close-btn">
       <span class="fas fa-times"></span>
    </div></div>';
    } else if ($_GET["error"] == "emptycpass") {
      echo ' <div class="alert show showAlert">
  <span class="fas fa-exclamation-circle"></span>
  <span class="msg">Passwords are not match</span>
  <div class="close-btn">
     <span class="fas fa-times"></span>
  </div></div>';
    } else if ($_GET["error"] == "notmatch") {
      echo ' <div class="alert show showAlert">
  <span class="fas fa-exclamation-circle"></span>
  <span class="msg">Passwords are not match</span>
  <div class="close-btn">
     <span class="fas fa-times"></span>
  </div></div>';
    } else if ($_GET["error"] == "emailtaken") {
      echo ' <div class="alert show showAlert">
  <span class="fas fa-exclamation-circle"></span>
  <span class="msg">Email is already taken.</span>
  <div class="close-btn">
     <span class="fas fa-times"></span>
  </div></div>';
    }
  }
  ?>

  <script src="/js/alerts.js"></script>
</body>

</html>