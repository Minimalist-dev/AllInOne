function 
nav() {
    var x = document.querySelector("#n-nav");
    x.classList.toggle("responsive");
}
function 
navMediano() {
    var x = document.querySelector("#n-nav-mediano");
    
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
//
//Ocultar la cabecera y el menu de navegación
//
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;

    if (prevScrollpos > currentScrollPos) {
        document.querySelector("#n-header").style.top = "0%";
        document.querySelector("#n-nav").style.top = "0%";
        document.querySelector("#n-nav-span").style.top = "5%";
        document.querySelector("#n-icono-mediano").style.top = "5%";
        document.querySelector("#n-nav-mediano").style.top = "10%";
        document.querySelector("#n-nav-minimo").style.top = "10%";
    } else {
        document.querySelector("#n-header").style.top = "-10%";
        document.querySelector("#n-nav").style.top = "-10%";
        document.querySelector("#n-nav-span").style.top = "-10%";
        document.querySelector("#n-icono-mediano").style.top = "-10%";
        document.querySelector("#n-nav-mediano").style.top = "-10%";
        document.querySelector("#n-nav-minimo").style.top = "-12%";
    }

    prevScrollpos = currentScrollPos;
};