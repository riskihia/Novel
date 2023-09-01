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
