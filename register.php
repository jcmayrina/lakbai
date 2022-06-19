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
      <form method="get" action="">
        <input type="text" placeholder="First Name" name="fname" required />
        <input type="text" placeholder="Last Name" name="lname" required />
        <input type="tel" placeholder="Contact number" name="phone" />
        <input type="email" placeholder="E-Mail" name="email" required />
        <input type="password" placeholder="Password" name="pass" required />
        <input type="password" placeholder="Confirm Password" required />
        <select class="selectpicker" name="tags" multiple required>
          <option value="culture" name="culture">Culture & History</option>
          <option value="nature">Nature & Adventure</option>
          <option value="art">Art & Museums</option>
          <option value="culinary">Culinary & Nightlife</option>
          <option value="summer">Summer experience</option>
        </select>
        <button type="submit">Register</button>
      </form>
    </div>
    <p class="para-2">
      Already have LakbAI account? <a href="login.php">Login Here</a>
      <!--Pakipalitan na lang po-->
    </p>
  </div>
</body>

</html>