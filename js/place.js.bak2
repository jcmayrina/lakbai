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

var getObj = JSON.parse(localStorage.getItem("obj"));

console.log(getObj[0]);

document.getElementById("location").innerHTML = getObj[0]["dest_name"];
document.getElementById("fact").innerHTML = getObj[0]["dest_desc"];
document.getElementById("address").innerHTML = getObj[0]["dest_add"];
document.getElementById("season").innerHTML = getObj[0]["dest_season"];
document.getElementById("price").innerHTML = getObj[0]["dest_stprice"];
var img = (document.getElementById("image").src =
  "images/lakbai-places/" + getObj[0]["dest_image"]);
document.getElementById("ifr").src =
  "https://maps.google.com/maps?q=" +
  getObj[0]["dest_lat"] +
  "," +
  getObj[0]["dest_long"] +
  "&output=embed";
