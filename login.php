<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Log In</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="container">
    <div class="signup-box">
      <div class="logo">
        <a href="index.php">
          <div class="ltext">Lakb</div>
          <div class="dtext">AI</div>
        </a>
      </div>
      <h1>Log In</h1>
      <form action="/include/login-form-handling.php" method="POST">
        <input type="email" placeholder="E-Mail" name="email" />
        <input type="password" placeholder="Password" name="pass" />
        <button type="submit" name="login-submit">Log in</button>
      </form>
    </div>
    <p class="para-2">
      Don't Have LakbAI account?
      <a class="login" href="register.php">Register Here</a>
    </p>
  </div>
</body>

</html>