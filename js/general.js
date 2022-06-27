//Generate Map
var map = L.map("map").setView([14.6, 120.98], 8);
var imgGrid = document.getElementById("images");

//Use of static Google Ma
L.tileLayer("http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}", {
  maxZoom: 20,
  subdomains: ["mt0", "mt1", "mt2", "mt3"],
}).addTo(map);

//End of Map Generator

//Pass id from clicked card from generalMap.php then search to query
function searchData(id) {
  fetch("search.php", {
    method: "POST",
    body: new URLSearchParams("dest_id=" + id),
  })
    .then((res) => res.json())
    .then((res) => zoomHere(res))
    .catch((e) => console.error("Error: " + e));
}

//Zoom the map to the place of clicked card
function zoomHere(data) {
  var thisIcon = L.icon({
    iconUrl: "images/marker.png",
    iconSize: [40, 40],
  });
  var thisPopup = L.popup({
    offset: [0, -7],
  }).setContent(
    '<h3 style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 200px; overflow: hidden; text-overflow: ellipsis;">Location: ' +
      data[0]["dest_name"] +
      '</h3><br><p style="display: text-alignment: justify; -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 200px; overflow: hidden; text-overflow: ellipsis;">' +
      data[0]["dest_desc"] +
      '</p><a href="place.php" target="_blank">View more details...</a>'
  );
  L.marker([data[0]["dest_lat"], data[0]["dest_long"]], { icon: thisIcon })
    .addTo(map)
    .bindPopup(thisPopup)
    .openPopup();
  map.flyTo([data[0]["dest_lat"], data[0]["dest_long"]], 14);
  window.scroll({
    top: 0,
    left: 0,
    behavior: "smooth",
  });

  openNewTab(data);
}

//Pass data to place.php to see further details
function openNewTab(data) {
  localStorage.setItem("obj", JSON.stringify(data));
}

function livesearch(id) {
  fetch("search.php", {
    method: "POST",
    body: new URLSearchParams("dest_id=" + id),
  })
    .then((res) => res.json())
    .then((res) => gotoplace(res))
    .catch((e) => console.error("Error: " + e));
}

function gotoplace(data) {
  localStorage.setItem("obj", JSON.stringify(data));
  window.open("place.php", "_self");
}
