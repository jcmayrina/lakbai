<?php

session_start();
require_once('database-viewer.php');

$db = new DB();
$data = $db->viewData();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/generalMap.css" />
  <title>Destinations</title>
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
  <div id="map"></div>
  <div class="container">
    <div class="card-content" display: none">
      <?php foreach ($data as $i) : ?>
        <div id="<?php echo $i['dest_id']; ?>" class="card" onclick="searchData(this.id)">
          <div class="card-image"><img src="images/lakbai-places/<?php echo $i['dest_image']; ?>" alt="<?php echo $i['dest_name']; ?>" /></div>
          <div class="card-info">
            <h3><?php echo $i['dest_name']; ?></h3>
            <p>
              <?php echo $i['dest_desc']; ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="pagination">
        <!-- <li class="page-item previous-page disable">
            <a class="page-link" href="#">Prev</a>
          </li>
          <li class="page-item current-page active">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item dots"><a class="page-link" href="#">...</a></li>
          <li class="page-item current-page">
            <a class="page-link" href="#">5</a>
          </li>
          <li class="page-item current-page">
            <a class="page-link" href="#">6</a>
          </li>
          <li class="page-item dots"><a class="page-link" href="#">...</a></li>
          <li class="page-item current-page">
            <a class="page-link" href="#">10</a>
          </li>
          <li class="page-item next-page">
            <a class="page-link" href="#">Next</a>
          </li> -->
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  function getPageList(totalPages, page, maxLength) {
    function range(start, end) {
      return Array.from(Array(end - start + 1), (_, i) => i + start);
    }

    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
    var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

    if (totalPages <= maxLength) {
      return range(1, totalPages);
    }

    if (page <= maxLength - sideWidth - 1 - rightWidth) {
      return range(1, maxLength - sideWidth - 1).concat(
        0,
        range(totalPages - sideWidth + 1, totalPages)
      );
    }

    if (page >= totalPages - sideWidth - 1 - rightWidth) {
      return range(1, sideWidth).concat(
        0,
        range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
      );
    }

    return range(1, sideWidth).concat(
      0,
      range(page - leftWidth, page + rightWidth),
      0,
      range(totalPages - sideWidth + 1, totalPages)
    );
  }

  $(function() {
    var numberOfItems = $(".card-content .card").length;
    var limitPerPage = 8; //How many card items visible per a page
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    var paginationSize = 7; //How many page elements visible in the pagination
    var currentPage;

    function showPage(whichPage) {
      if (whichPage < 1 || whichPage > totalPages) return false;

      currentPage = whichPage;

      $(".card-content .card")
        .hide()
        .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
        .show();

      $(".pagination li").slice(1, -1).remove();

      getPageList(totalPages, currentPage, paginationSize).forEach((item) => {
        $("<li>")
          .addClass("page-item")
          .addClass(item ? "current-page" : "dots")
          .toggleClass("active", item === currentPage)
          .append(
            $("<a>")
            .addClass("page-link")
            .attr({
              href: "javascript:void(0)"
            })
            .text(item || "...")
          )
          .insertBefore(".next-page");
      });

      $(".previous-page").toggleClass("disable", currentPage === 1);
      $(".next-page").toggleClass("disable", currentPage === totalPages);
      return true;
    }

    $(".pagination").append(
      $("<li>")
      .addClass("page-item")
      .addClass("previous-page")
      .append(
        $("<a>")
        .addClass("page-link")
        .attr({
          href: "javascript:void(0)"
        })
        .text("Prev")
      ),
      $("<li>")
      .addClass("page-item")
      .addClass("next-page")
      .append(
        $("<a>")
        .addClass("page-link")
        .attr({
          href: "javascript:void(0)"
        })
        .text("Next")
      )
    );

    $(".card-content").show();
    showPage(1);

    $(document).on(
      "click",
      ".pagination li.current-page:not(.active)",
      function() {
        return showPage(+$(this).text());
      }
    );

    $(".next-page").on("click", function() {
      return showPage(currentPage + 1);
    });

    $(".previous-page").on("click", function() {
      return showPage(currentPage - 1);
    });
  });
</script>
<script src="js/general.js"></script>

</html>