var xhr = new XMLHttpRequest();
xhr.open("POST", "/index-ajax.php");
xhr.onload = function () {
  var jsvar = this.response;
  console.log(jsvar); //String
  jsvar = JSON.parse(jsvar); //String to Array
  console.log(jsvar); //Array
};
xhr.send();
var coordinates = [
  [
    "Quiapo Church",
    14.599268045057114,
    120.9838699975653,
    false,
    "church",
    "The Minor Basilica of the Black Nazarene, known canonically as the Parish of Saint John the Baptist and also known as Quiapo Church, is a prominent basilica in the district of Quiapo in the city of Manila, Philippines.",
  ],
  [
    "TUP Manila",
    14.587264183099995,
    120.98478498234007,
    false,
    "univ",
    "The Technological University of the Philippines, commonly known as TUP, is a coeducational state university in the Philippines. It was established in 1901 by the Philippine Commission. TUP has its main campus in Manila and satellite campuses in Taguig, Cavite, Visayas, Batangas, and Quezon.",
  ],
  [
    "Luneta Park",
    14.58288340350024,
    120.97867796913701,
    false,
    "this",
    "Rizal Park, also known as Luneta Park or simply Luneta, is a historic urban park located in Ermita, Manila, Philippines. It is considered one of the largest urban parks in Asia, covering an area of 58 hectares.",
  ],
  [
    "Intramuros",
    14.591838893780583,
    120.97176216913707,
    false,
    "this",
    "Old-world Intramuros is home to Spanish-era landmarks like Fort Santiago, with a large stone gate and a shrine to national hero José Rizal. The ornate Manila Cathedral houses bronze carvings and stained glass windows, while the San Agustin Church museum has religious artwork and statues. Spanish colonial furniture and art fill Casa Manila museum, and horse-drawn carriages (kalesa) ply the area’s cobblestone streets.",
  ],
  [
    "Manila City Hall",
    14.589731730291778,
    120.98162192680967,
    false,
    "this",
    "The Manila City Hall is the official seat of government of the City of Manila, located in the historic center of Ermita, Manila. It is where the Mayor of Manila holds office and the chambers of the Manila City Council is located.",
  ],
  [
    "Tutuban Center Mall",
    14.60945085660675,
    120.9728649556461,
    false,
    "this",
    "Tutuban Center is a shopping complex and public transit hub in Manila, the Philippines that opened in 1993. It encompasses five retail buildings and a parking building in and around Manila's central train station located in the shopping precinct of Divisoria in Tondo district.",
  ],
  [
    "National Museum of Anthropology",
    14.585909217148162,
    120.98117712680953,
    false,
    "museum",
    "The National Museum of Anthropology, formerly known as the Museum of the Filipino People, is a component museum of the National Museum of the Philippines which houses Ethnological and Archaeological exhibitions.",
  ],
  [
    "Manila Ocean Park",
    14.579438907237066,
    120.97258525564578,
    false,
    "waterpark",
    "The Manila Ocean Park is a oceanarium in Manila, Philippines. It is owned by China Oceanis Philippines Inc., a subsidiary of China Oceanis Inc., a Singaporean-registered firm. It is located behind the Quirino Grandstand at Rizal Park.",
  ],
  [
    "Manila Zoo",
    14.565358638466506,
    120.98849479797317,
    false,
    "zoo",
    "The Manila Zoo, formally known as the Manila Zoological and Botanical Garden, is a 5.5-hectare zoo located in Malate, Manila, Philippines that opened on July 25, 1959.",
  ],
  [
    "Okada Hotel Manila",
    14.515145504034665,
    120.98104641331788,
    false,
    "hotel",
    "Okada Manila is known for its picturesque views of Manila Bay. You can enjoy it from the comfort of your very own suite or at the property's outdoor space, The Garden! This lush, relaxing environment is vast and ideal for leisurely strolls while catching the famous Manila Bay sunset.",
  ],
  [
    "Jones Bridge",
    14.595853607956244,
    120.97736509988172,
    false,
    "bridge",
    "The William A. Jones Memorial Bridge, commonly known as the Jones Bridge, is an arched girder bridge that spans the Pasig River in the City of Manila, Philippines",
  ],
  [
    "Binondo Arch",
    14.596806208391506,
    120.97679378934995,
    false,
    "this",
    "The arch is intended, among other things, as an extension of goodwill to China. It was built during a dispute over the South China Sea between China and the Philippines, brought by the latter to the Permanent Court of Arbitration.",
  ],
  [
    "SM Manila Mall",
    14.590028247124549,
    120.98295519797344,
    false,
    "this",
    "SM City Manila is the first SM Supermall in the city of Manila. It is located within the corners of Natividad Almeda-Lopez (formerly called Concepcion), A. Villegas (formerly called Arroceros) and San Marcelino Streets in Ermita, Manila just beside the Manila City Hall.",
  ],
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

function zoomHere(i) {
  var thisIcon = L.icon({
    iconUrl: "/images/icon_markers/" + coordinates[parseInt(i)][4] + ".png",
    iconSize: [40, 40],
  });
  var thisPopup = L.popup({
    offset: [0, -7],
  }).setContent(
    "<h3>Location: " +
      coordinates[parseInt(i)][0] +
      '</h3><br><p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 200px; overflow: hidden; text-overflow: ellipsis;">' +
      coordinates[parseInt(i)][5] +
      '</p><a href="" onclick="openNewTab(' +
      i +
      ')">View more details...</a>'
  );
  var marker = L.marker(
    [coordinates[parseInt(i)][1], coordinates[parseInt(i)][2]],
    { icon: thisIcon }
  );
  marker.addTo(map).bindPopup(thisPopup).openPopup();
  map.flyTo([coordinates[parseInt(i)][1], coordinates[parseInt(i)][2]], 17);
  window.scroll({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
}

function openNewTab(i) {
  var theArray = coordinates[i];
  sessionStorage.setItem("thisArray", JSON.stringify(theArray));
  window.open("place.php", "_blank");
}
