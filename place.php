<?php
session_start();
require_once('admin-db.php');

$data = new admin();
$reviewdata = $data->viewReviews();;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
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
      <h1>Puerto Princesa Underground River</h1>
    </div>
    <div class="info">
      <div class="info-item">
        <i class="fa-solid fa-location-dot"></i>
        <p>Puerto Princesa, Palawan</p>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-road"></i>
        <p>Distance from your location:346.12km</p>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-cloud-sun"></i>
        <p>Best Season: Fall</p>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-peso-sign"></i>
        <p>Starting Price: 1,500 pesos per person</p>
      </div>
    </div>
  </div>
  <div class="images-map">
    <div class="place-image">
      <!-- Slideshow container -->
      <div class="slideshow-container">
        <div class="mySlides">
          <img src="images/puerto_prinsesa.jpg" style="width: 100%" />
        </div>
      </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2502.797056898842!2d118.92345008002643!3d10.20028105526433!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb02fda05e478bbd1!2sThe%20Guardian%20Tree%20of%20the%20Puerto%20Princesa%20Underground%20River%20UNESCO%20World%20Heritage%20Site!5e1!3m2!1sen!2sph!4v1654784633408!5m2!1sen!2sph" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <div class="place-info">
    <p class="fact">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
      delectus unde dolores alias consequuntur nobis nihil cum repellat
      debitis ducimus accusantium qui praesentium aut architecto aliquam,
      tempora ipsam, ut iure? Ipsa nobis necessitatibus odio earum maiores
      mollitia quo, odit esse ut aspernatur atque quia quasi temporibus
      recusandae illo corporis perspiciatis error doloremque voluptas soluta
      nisi laboriosam. Iste dicta itaque vero. Animi, perferendis et illum
      voluptates totam nihil debitis, repellendus impedit unde labore officia
      exercitationem blanditiis eos. Veritatis consequatur dolores tenetur
      sint officia quae voluptatibus error laboriosam eius obcaecati, ducimus
      perspiciatis. Tempore omnis vitae qui voluptates, repudiandae soluta
      facilis deleniti id aliquam alias debitis similique corporis excepturi
      harum beatae nesciunt. Aperiam placeat officiis beatae provident modi
      nisi soluta veniam blanditiis maxime? Dolores odio quae at autem est
      beatae! Debitis, eos eum laborum eaque accusantium quo. Deleniti
      voluptas tenetur, nam repellat ex placeat consectetur excepturi, ea
      dicta suscipit provident quo! Quidem, odit?
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

  <div class="r-con">
    <div class="r-tit">
      <h1>Recommended places</h1>
    </div>
    <div class="owl-carousel owl-theme">
      <div class="item">
        <div class="r-img">
          <img src="images/puerto_prinsesa.jpg" alt="puerto_prinsesa" />
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/puerto_prinsesa.jpg" alt="puerto_prinsesa" />
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/puerto_prinsesa.jpg" alt="puerto_prinsesa" />
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/puerto_prinsesa.jpg" alt="puerto_prinsesa" />
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/puerto_prinsesa.jpg" alt="puerto_prinsesa" />
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/puerto_prinsesa.jpg" alt="puerto_prinsesa" />
        </div>
      </div>
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
</body>

</html>