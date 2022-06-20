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
  include("navbar.php");
  ?>

  <form class="left-container-form">
    <div class="main-container">
      <div class="left-container">
        <section>
          <h2>I am travelling to</h2>
          <input type="text" required>
        </section>
        <div class="left-container-select-cont">
          <div class="left-container-radio">
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
          </div>
          <div>
            <h3>Type of Holiday I am Looking for </h3>
            <br>
            <div class="left-container-select">
              <select required>
                <option value="" disabled selected>Select your option</option>
                <option value="culture">Culture & History</option>
                <option value="nature">Nature & Adventure</option>
                <option value="art">Art & Museums</option>
                <option value="private">Private Experiences</option>
                <option value="locals">Meet the Locals</option>
                <option value="Nightlife">Culinary & Nightlife</option>
              </select>
            </div>
          </div>
        </div>
        <div class="btn-submit"> <input type="submit" value="Submit"></div>
  </form>
  </div>

  <div class="right-container">
    <div>
      <h1>Vacation Plans:</h1>
      <ul>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
      </ul>
    </div>
  </div>
  </div>


</body>

</html>