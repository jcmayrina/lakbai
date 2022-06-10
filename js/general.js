let coordinates = [
  ["Quiapo Church", 14.6, 120.98],
  ["TUP Manila", 14.59, 120.98],
  ["Luneta Park", 14.58, 120.98],
];

var map = L.map("map").setView([14.6, 120.98], 8);
var imgGrid = document.getElementById("images");

L.tileLayer(
  "https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=pb76Ez3I5j8ejSsz1FfZ",
  {
    attribution:
      '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
  }
).addTo(map);

for (var i = 0; i < 3; i++) {
  var img = new Image();
  img.src = "/lakbai-places/" + i + ".jpg";
  img.width = "200";
  img.height = "200";
  img.margin = "10dp";
  var myId = i;
  img.id = myId;
  img.onmouseclick = function () {
    map.setView([coordinates[this.id][1], coordinates[this.id][2]], 25);
  };
  imgGrid.appendChild(img);
}
