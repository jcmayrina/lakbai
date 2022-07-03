function searchCity() {
  var city = document.getElementById("searchBox").value;
  console.log(city);
  var tag = document.getElementById("searchSelect").value;
  console.log(tag);

  fetch("searchCity.php", {
    method: "POST",
    body: new URLSearchParams("dest_city=" + city + "&" + "dest_tags=" + tag),
  })
    .then((res) => res.json())
    .then((res) => resultCity(res))
    .catch((e) => console.error("Error: " + e));
}

function resultCity(data) {
  const ul = document.getElementById("plan-maincontd");

  ul.innerHTML = "";

  for (let i = 0; i < data.length; i++) {
    const li = document.createElement("li");
    li.id = data[i]["dest_id"];
    li.onclick = function () {
      livesearch(this.id);
    };

    const div = document.createElement("div");
    div.className = "plan-cont";
    div.onclick = 'location.href="place.php"';

    const div1 = document.createElement("div");
    div1.className = "plan-img";

    const div2 = document.createElement("div");
    div2.className = "plan-name";
    var text = document.createTextNode(data[i]["dest_name"]);
    div2.appendChild(text);

    const div3 = document.createElement("div");
    div3.className = "plan-desc";
    var text = document.createTextNode(data[i]["dest_desc"]);
    div3.appendChild(text);

    const img = document.createElement("img");
    var str = ".../images/lakbai-places/" + data[i]["dest_image"] + ".jpg"
    img.src = str;
    img.alt = data[i]["dest_name"];

    div1.appendChild(img);
    div.appendChild(div1);
    div.appendChild(div2);
    li.appendChild(div);
    li.appendChild(div3);
    ul.appendChild(li);
  }
}
