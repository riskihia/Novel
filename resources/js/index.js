let closeButtonNav = document.getElementById("closeButtonNav");
let openButtonNav = document.getElementById("openButtonNav");
let navMobile = document.getElementById("navMobile");
let sidebarDrop = document.getElementById("sidebar-backdrop");

if (closeButtonNav && openButtonNav && sidebarDrop) {
    closeButtonNav.addEventListener("click", function () {
        navMobile.classList.toggle("hidden");
    });
    openButtonNav.addEventListener("click", function () {
        navMobile.classList.toggle("hidden");
    });
    sidebarDrop.addEventListener("click", () => {
        navMobile.classList.add("hidden");
    });
}

var buttonGenre = document.getElementById("button-genre");
var isiGenre = document.getElementById("isi-genre");

var buttonAuthor = document.getElementById("button-author");
var isiAuthor = document.getElementById("isi-author");

var buttonStatus = document.getElementById("button-status");
var isiStatus = document.getElementById("isi-status");

if (buttonAuthor && buttonGenre) {
    buttonAuthor.addEventListener("click", () => {
        isiAuthor.classList.remove("hidden");
        isiAuthor.classList.add("grid");
    });
    buttonGenre.addEventListener("click", () => {
        isiGenre.classList.remove("hidden");
        isiGenre.classList.add("grid");
    });
    buttonStatus.addEventListener("click", () => {
        isiStatus.classList.remove("hidden");
        isiStatus.classList.add("grid");
    });
}
