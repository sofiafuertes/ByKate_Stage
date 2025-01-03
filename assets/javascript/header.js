// Get the current path from the URL
const currentPath = window.location.pathname.toLowerCase();

//Select all <a>
const navItems = document.querySelectorAll("a");

//Compare the href attribute with the current path
navItems.forEach((item) => {
    if (item && item.getAttribute("href").toLowerCase() === currentPath) {
        item.classList.add("activePage"); //Add the "activePage class to the <a>"
    }
});


//Toogle the burger menu and navbar

document.addEventListener("DOMContentLoaded", () => {
    const menuBurger = document.getElementById("hamburgerMenu");
    const navBar = document.getElementsByClassName("navbar")[0];

    menuBurger.addEventListener("click", () => {
        navBar.classList.toggle("active");
    });
});
