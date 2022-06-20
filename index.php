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
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Home</title>
</head>

<body>
  <?php
  include("navbar.php");
  ?>
  <div class="guide-cont">
    <div class="guide-cont2">
      <div class="guide">
        <h1>Looking for a guide?</h1>
        <form action="" method="get">
          <input type="text" name="guidesearch" id="guidesearch" placeholder="Where's your next Adventure?" />
          <button type="submit" value="search">Search</button>
        </form>
      </div>
      <div class="numtours">
        <h3>Total number of destinations:</h3>
      </div>
    </div>
  </div>

  <div class="r-con">
    <div class="r-tit">
      <h1>Recommended Places</h1>
    </div>
    <div class="owl-carousel owl-theme">
      <div class="item">
        <div class="r-img">
          <img src="images/banner.jpg" alt="puerto_prinsesa" />
          <div class="r-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            cupiditate, dignissimos vero asperiores iure esse hic sit
            repellendus deserunt aliquam sunt, facere iusto ipsa impedit
            delectus consequuntur repudiandae quasi eaque!
          </div>
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/banner1.jpg" alt="puerto_prinsesa" />
          <div class="r-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            cupiditate, dignissimos vero asperiores iure esse hic sit
            repellendus deserunt aliquam sunt, facere iusto ipsa impedit
            delectus consequuntur repudiandae quasi eaque!
          </div>
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/banner2.jpg" alt="puerto_prinsesa" />
          <div class="r-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            cupiditate, dignissimos vero asperiores iure esse hic sit
            repellendus deserunt aliquam sunt, facere iusto ipsa impedit
            delectus consequuntur repudiandae quasi eaque!
          </div>
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/banner3.jpg" alt="puerto_prinsesa" />
          <div class="r-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            cupiditate, dignissimos vero asperiores iure esse hic sit
            repellendus deserunt aliquam sunt, facere iusto ipsa impedit
            delectus consequuntur repudiandae quasi eaque!
          </div>
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/banner4.jpg" alt="puerto_prinsesa" />
          <div class="r-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            cupiditate, dignissimos vero asperiores iure esse hic sit
            repellendus deserunt aliquam sunt, facere iusto ipsa impedit
            delectus consequuntur repudiandae quasi eaque!
          </div>
        </div>
      </div>
      <div class="item">
        <div class="r-img">
          <img src="images/banner5.jpg" alt="puerto_prinsesa" />
          <div class="r-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            cupiditate, dignissimos vero asperiores iure esse hic sit
            repellendus deserunt aliquam sunt, facere iusto ipsa impedit
            delectus consequuntur repudiandae quasi eaque!
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel();
  });

  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
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
      1920: {
        items: 6,
      },
    },
  });
</script>

</html>