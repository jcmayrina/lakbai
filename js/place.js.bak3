let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}

var getObj = JSON.parse(sessionStorage.getItem("obj"));

document.getElementById("location").innerHTML = getObj[0]["dest_name"];
document.getElementById("fact").innerHTML = getObj[0]["dest_desc"];
document.getElementById("address").innerHTML = getObj[0]["dest_add"];
document.getElementById("season").innerHTML = getObj[0]["dest_season"];
document.getElementById("price").innerHTML = getObj[0]["dest_stprice"];
var str = "/images/lakbai-places/" + getObj[0]["dest_image"];
document.getElementById("image").src = str;
document.getElementById("ifr").src =
  "https://maps.google.com/maps?q=" +
  getObj[0]["dest_lat"] +
  "," +
  getObj[0]["dest_long"] +
  "&output=embed";

window.history.pushState(
  "place",
  "Title",
  "./place.php?destID=" + getObj[0]["dest_id"]
);
if (!localStorage.getItem("reload")) {
  localStorage.setItem("reload", "true");
  location.reload();
} else {
  localStorage.removeItem("reload");
}

$("a[href='#bottom']").click(function () {
  $("html, body").animate({ scrollTop: $(document).height() }, "slow");
  document.getElementById("addReview").style.display = "block";
  return false;
});
