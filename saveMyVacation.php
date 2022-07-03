<?php
session_start();
require_once('database-viewer.php');

$db = new db();
$data = $db->viewDestinationData();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/saveMyVacation.css" />
  <link rel=”stylesheet” href=”https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css”rel=”nofollow” integrity=”sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I” crossorigin=”anonymous”>
  <title>Save My Vacation | LakbAI</title>
</head>

<body>
  <?php
  if (!isset($_SESSION['userLvl'])) {

    include("navbar.php");
  } else {
    if ($_SESSION['userLvl'] == 2) {
      include("navbar-user.php");
    } else {
      include("navbar.php");
    }
  }
  ?>

  <form class="left-container-form">
    <div class="main-container">
      <div class="left-container">
        <section>
          <h2>I am travelling to</h2>
          <input id="searchBox" name="place" list="place" type="text" oninput="searchCity()" required>
          <div class="place-options">
            <datalist id="place">
              <!-- <?php foreach ($data as $i) { ?>
                <option value="<?php echo (isset($i['dest_city']) ? htmlspecialchars($i['dest_city']) : ''); ?>"></option>
              <?php } ?> -->
          </div>
        </section>
        <div class="left-container-select-cont">
          <!-- <div class="left-container-radio">
            <h3>I prefer</h3>
            <br>
            <label class="container">Budget Friendly
              <input type="radio" name="radio" value="budget" required>
              <span class="checkmark"></span>
            </label>
            <label class="container">Outdoor
              <input type="radio" name="radio" value="outdoor" required>
              <span class="checkmark"></span>
            </label>
            <label class="container">For Family
              <input type="radio" name="radio" value="family" required>
              <span class="checkmark"></span>
            </label>
            <label class="container">Groups
              <input type="radio" name="radio" value="groups" required>
              <span class="checkmark"></span>
            </label>
            <label class="container">Tours
              <input type="radio" name="radio" value="tours" required>
              <span class="checkmark"></span>
            </label>
          </div> -->
          <div>
            <h3>Type of Holiday I am Looking for </h3>
            <br>
            <div class="left-container-select">
              <select id="searchSelect" onchange="searchCity()" required>
                <option value="" disabled selected>Select your option</option>
                <option value="culture">Culture & History</option>
                <option value="nature">Nature & Adventure</option>
                <option value="art">Art & Museums</option>
                <option value="culinary">Culinary & Nightlife</option>
                <option value="summer">Summer experience</option>
              </select>
            </div>
          </div>
        </div>
  </form>
  </div>

  <div class="right-container">
    <div>
      <h1>Vacation Plans:</h1>
      <ul id="plan-maincontd" class="plan-maincont">
      </ul>
    </div>
  </div>
  </div>

</body>
<script src="js/general.js"></script>
<script src="js/saveMyVacation.js"></script>

</html>