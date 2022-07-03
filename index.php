<?php
session_start();
require_once('admin-db.php');

$data = new admin();
if (isset($_SESSION['userTag'])) {
  $extags = explode(",", $_SESSION['userTag']);
  $imtags = "'" . implode("', '", $extags) . "'";
  $tourdata = $data->viewTours($imtags);
} else {
  $tourdata = $data->viewToursGen();
}
$allTour = 0;

foreach ($tourdata as $i) {
  $allTour++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Home</title>
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
  <div class="overlay"></div>
  <div class="guide-cont">
    <video autoplay loop muted plays-inline class="backvid">
      <source src="images/beach.mp4" type="video/mp4">
    </video>
    <div class=" guide-cont2">
      <div class="guide">
        <h1 id="looking"></h1>
        <form action="" method="get">
          <input type="text" name="guidesearch" id="guidesearch" placeholder="Where's your next Adventure?" />
        </form>
        <div id="results"></div>
      </div>
      <div class="numtours">
        <h3>Total number of destinations: <p class="num" data-val="<?php echo $allTour; ?>"><?php echo $allTour; ?></p>
        </h3>
      </div>
    </div>
  </div>

  <div class="r-con">
    <div class="r-tit">
      <h1>Recommended Places</h1>
    </div>
    <div class="owl-carousel owl-theme">
      <?php
      foreach ($tourdata as $i) :
      ?>
        <div class="item" id="<?php echo $i['dest_id']; ?>" onclick="livesearch(this.id)">
          <div class="r-img">
            <img src="<?php echo 'images/lakbai-places/' . $i['dest_image']; ?>" alt="puerto_prinsesa" />
            <div class="r-desc">
              <h5><?php echo $i['dest_name']; ?></h5>
              <?php echo $i['dest_desc']; ?>
            </div>
          </div>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel();
    $('#guidesearch').on('input', function() {
      var name = $(this).val();
      $('#results').css('display', $(this).val() !== '' ? 'block' : 'none')
      $.post('index-ajax.php', {
        name: name
      }, function(data) {
        $('div#results').html(data);
      });
    });
    let valueDisplays = document.querySelectorAll(".num");
    let interval = 1000;

    valueDisplays.forEach((valueDisplay) => {
      let startValue = 0;
      let endValue = parseInt(valueDisplay.getAttribute("data-val"));
      let duration = Math.floor(interval / endValue);
      let counter = setInterval(function() {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
          clearInterval(counter);
        }
      }, duration);
    });
    var typed = new Typed('#looking', {
      strings: ['Looking for a guide?', 'Explore Now!', 'It\'s more fun in the Philippines!'],
      typeSpeed: 50,
      backSpeed: 50,
      backDelay: 5000,
      repeatDelay: 2000,
      loop: true,
    });
  });
  window.addEventListener('click', function(e) {
    if (!document.getElementById('guidesearch').contains(e.target)) {
      $('#results').css('display', 'none');
    }
  });
  $(".owl-carousel").owlCarousel({
    loop: false,
    margin: 5,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
      1920: {
        items: 6,
      },
    },
  });
</script>
<script src="js/general.js"></script>

</html>