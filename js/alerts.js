const alerts = document.querySelector(".alert");
const closeBtn = document.querySelector(".close-btn");
const submitBtn = document.querySelector(".submit");
const emailTxt = document.getElementById("email");
const unameTxt = document.getElementById("username");


if (alerts.classList.contains("show")) {
    setTimeout(function() {
        alerts.classList.remove("show");
        alerts.classList.add("hide");
    }, 3000);
}

closeBtn.onclick = () => {
    alerts.classList.remove("show");
    alerts.classList.add("hide");
}

