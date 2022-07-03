var map = L.map("map").setView([14.6, 120.98], 8);
var imgGrid = document.getElementById("images");

L.tileLayer(
  "https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=pb76Ez3I5j8ejSsz1FfZ",
  {
    attribution:
      '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
  }
).addTo(map);

function searchData(id) {
  fetch('search.php', {
    method: 'POST',
    body: new URLSearchParams('dest_id=' + id)
  })
    .then(res => res.json())
    .then(res => zoomHere(res))
    .catch(e => console.error('Error: ' + e))
}

function zoomHere(data) {
  var thisIcon = L.icon({
    iconUrl: "/images/icon_markers/" + data[0]['dest_name'] + ".png",
    iconSize: [40, 40],
  });
  var thisPopup = L.popup({
    offset: [0, -7],
  }).setContent(
    '<h3 style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 200px; overflow: hidden; text-overflow: ellipsis;">Location: ' +
      data[0]['dest_name'] +
      '</h3><br><p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 200px; overflow: hidden; text-overflow: ellipsis;">' +
      data[0]['dest_desc'] +
      '</p><a href="place.php">View more details...</a>'
  );
  var marker = L.marker(
    [data[0]['dest_lat'], data[0]['dest_long']],
    { icon: thisIcon }
  );
  marker.addTo(map).bindPopup(thisPopup).openPopup();
  map.flyTo([data[0]['dest_lat'], data[0]['dest_long']], 17);
  window.scroll({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
}

function openNewTab(data) {
  var theArray = data;
  sessionStorage.setItem("thisArray", JSON.stringify(theArray));
  window.open("place.php", "_blank");
}
