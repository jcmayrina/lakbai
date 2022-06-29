<?php
session_start();
require_once('admin-db.php');

$data = new admin();
$reviewdata = $data->viewReviews();;
$tourdata = $data->viewTours();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/place.css" />
  <title>Place</title>
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

  <div class="info-bar">
    <div class="name">
      <h1 id="location"></h1>
    </div>
    <div class="info">
      <div class="info-item">
        <i class="fa-solid fa-location-dot"></i>
        <p id="address"></p>
        <i class="fa-solid fa-cloud-sun"></i>
        <p id="season"></p>
        <p>&nbsp;Season</p>
        <i class="fa-solid fa-peso-sign"></i>
        <p id="price"></p>
        <p>&nbsp;pesos per person</p>
      </div>
    </div>
  </div>
  <div class="images-map">
    <div class="place-image">
      <!-- Slideshow container -->
      <div class="slideshow-container">
        <div class="mySlides">
          <img src="" id="image" style="width: 100%" />
        </div>
      </div>
    </div>
    <div class="map">
      <iframe id="ifr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <div class="place-info">
    <p id="fact" class="fact">
    </p>
  </div>

  <div class="review-cont">
    <div class="review-tit">
      <h1>Reviews</h1>
    </div>
    <div class="review-carousel owl-theme">
      <?php
      foreach ($reviewdata as $i) {
      ?>
        <div class="item">
          <div class="review-img">
            <h4><i class='bx bxs-quote-alt-left'></i> <?php echo $i["user_fname"]; ?> <i class='bx bxs-quote-alt-right'></i></h4>
            <div class="r-desc">
              <?php echo $i["review_star"]; ?><br />
              <?php echo $i["review_comment"]; ?>
            </div>
          </div>
        </div>
      <?php
      };
      ?>
    </div>
  </div>

  <div class="r-con-place">
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $(document).ready(function() {
      $(".owl-carousel").owlCarousel();

    });

    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 5,
        },
      },
    });

    $(document).ready(function() {
      $(".review-carousel").owlCarousel();
    });

    $(".review-carousel").owlCarousel({
      loop: false,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 5,
        },
      },
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8e42a01d1f.js" crossorigin="anonymous"></script>
  <script src="js/place.js"></script>
  <script src="js/general.js"></script>
  <script src="js/saveMyVacation.js"></script>
</body>

</html>