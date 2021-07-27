//var cerrarHeader = document.querySelector("#n-icono-mediano");
class Header {
    constructor() {
 
    }
    mediano() {
        var mediano = document.querySelector("#n-header-mediano");

        if (mediano.style.display === "none") { mediano.style.display = "block"; }
        else { mediano.style.display = "none"; }
    }
}
let ejecutarHeader = new Header();

//document.querySelector("#n-icono-mediano").addEventListener('click', ejecutarHeader.mediano());

//function 
//header() {
//    var x = document.querySelector("#n-header");
//    x.classList.toggle("responsive");
//}
//
//Ocultar la cabecera y el menu de headeregación
//
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;

    if (prevScrollpos > currentScrollPos) {
        document.querySelector("#n-header").style.top = "0em";
        document.querySelector("#n-header-mediano").style.top = "3em";
    } else {
        document.querySelector("#n-header").style.top = "-3em";
        document.querySelector("#n-header-mediano").style.top = "-3em";
    }

    prevScrollpos = currentScrollPos;
};
/*
    * header nav
 */
function headerNav() {
    document.querySelector("#n-header-nav").classList.toggle("n-display");
}

window.onclick = function (evento) {
    if (!evento.target.matches('.n-img-perfil-header')) {
        var contenedor = document.getElementsByClassName("n-header-nav-contenedor");
        var i;
        
        for (i = 0; i < contenedor.length; i++) {
            var abrirContenedor = contenedor[i];
            if (abrirContenedor.classList.contains('n-display')) {
                abrirContenedor.classList.remove('n-display');
            }
        }
    }
};