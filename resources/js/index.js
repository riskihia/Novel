let closeButtonNav = document.getElementById("closeButtonNav");
let openButtonNav = document.getElementById("openButtonNav");
let navMobile = document.getElementById("navMobile");

closeButtonNav.addEventListener("click", function () {
    navMobile.classList.toggle("hidden");
});
openButtonNav.addEventListener("click", function () {
    navMobile.classList.toggle("hidden");
});
