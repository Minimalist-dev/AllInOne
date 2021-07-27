/*
 * Menu a firtral
 * */
//function myFunction() {
//  document.getElementById("myDropdown").classList.toggle("show");
//}
const buscar = document.querySelector("#n-buscar");

buscar.onkeyup = function() {
    let entrada, filtrar, boton;
    //entrada = document.getElementById("#n-buscar");
    filtrar = buscar.value.toUpperCase();
    seccion = document.querySelector(".n-nav-botones");
    boton = seccion.getElementsByTagName("button");
    
    var l = boton.length;
    for (i = 0; i < l; i++) {
        let valorDeTexto = boton[i].textContent || boton[i].innerText;
        
        if (valorDeTexto.toUpperCase().indexOf(filtrar) > -1) {
            boton[i].style.display = "";
        } else {
            boton[i].style.display = "none";
        }
    }
};
//
    //header
//
document.querySelector(".n-administrar").addEventListener('click', administrarNav);

function 
administrarNav() {
    document.querySelector("header").classList.toggle("n-header-nuevo");
    document.querySelector("button.n-administrar").classList.toggle("n-administrar-acitvo");
    document.querySelector("nav").classList.toggle("n-nav-nuevo");
    document.querySelector(".n-linea").classList.toggle("n-visibility");
    document.querySelector(".all-in-one-linea").classList.toggle("n-display-no");
    document.querySelector(".n-cerrar-alerta").classList.toggle("n-cerrar-alerta-nuevo");
}

const cerrar = document.querySelector("button.n-cerrar");

cerrar.onclick = function() {
    cerrar.classList.toggle("n-administrar-acitvo"); 
    document.querySelector(".n-cerrar-alerta").classList.toggle("n-display"); 
    
    if(cerrar.innerHTML === "Cerrar") {
        cerrar.innerHTML = "Cancelar";
    } else {
        cerrar.innerHTML = "Cerrar";
    }
};
//
    //nav
//
var navIndice = 1;
showSlides(navIndice);

function currentSlide(n) {
    showSlides(navIndice = n);
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("n-nav-contenido");
    var dots = document.getElementsByClassName("n-elegido");
  
    var l = slides.length;
    for (i = 0; i < l; i++) {
        slides[i].style.display = "none";
    }
    var l = dots.length;
    for (i = 0; i < l; i++) {
        dots[i].className = dots[i].className.replace(" n-boton-activo", "");
    }
    
    slides[navIndice-1].style.display = "block";
    dots[navIndice-1].className += " n-boton-activo";
}
//
    //Subir
//
var categorias = {
    "Masculino": {
        "Hombre": ["APC", "Acne Studios", "Tom Ford", "Prada", "Polo Ralph Lauren", "Nudie Jeans", "Levi’s", "Ksubi", "Hugo Boss", 
            "Gucci", "G-Star Raw", "Givenchy", "Fendi", "Dolce Gabbana", "DSquared2", "Diesel", "Calvin Klein", "Balenciaga", "AG Jeans"],
        "Chico": ["APC", "Acne Studios", "Tom Ford", "Prada", "Polo Ralph Lauren", "Nudie Jeans", "Levi’s", "Ksubi", "Hugo Boss", 
            "Gucci", "G-Star Raw", "Givenchy", "Fendi", "Dolce Gabbana", "DSquared2", "Diesel", "Calvin Klein", "Balenciaga", "AG Jeans"]  
    },
    "Femenido": {
        "Mujer": ["Levi's", "Lee", "Wrangler", "Topshop", "Paige", "Madewell", "Pepe Jeans", "Calvin Klein", "Zara", "RE/DONE", 
            "Dolce & Gabbana", "GUESS", "B SIDES", "Askk NY", "The Feel Studio Inc", "Reiko Jeans", "Neuw Denim", "One Teaspoon", 
            "J Brand Jeans"],
        "Chica": ["Levi's", "Lee", "Wrangler", "Topshop", "Paige", "Madewell", "Pepe Jeans", "Calvin Klein", "Zara", "RE/DONE", 
            "Dolce & Gabbana", "GUESS", "B SIDES", "Askk NY", "The Feel Studio Inc", "Reiko Jeans", "Neuw Denim", "One Teaspoon", 
            "J Brand Jeans"]                                                   
    }
};
var colores = {
    Azul: "Azul", Negro: "Negro", Blanco: "Blanco"
};

var tallas = {
    Small: "Pequeña", Mediana: "Mediana", Grande: "Grande"
};
window.onload = function() {
    var categoria       = document.querySelector("#categoria");
    var subCategoria    = document.querySelector("#subCategoria");
    var marca           = document.querySelector("#marca");
    var color           = document.querySelector("#color");
    var talla           = document.querySelector("#talla");
    
    for (var x in categorias) {
        categoria.options[categoria.options.length] = new Option(x, x);
    }
    
    categoria.onchange = function() {//display correct values
        for (var y in categorias[this.value]) {
            subCategoria.options[subCategoria.options.length] = new Option(y, y);
        }
    };
    
    subCategoria.onchange = function() {//display correct values
        var z = categorias[categoria.value][this.value];
        for (var i = 0; i < z.length; i++) {
            marca.options[marca.options.length] = new Option(z[i], z[i]);
        }
    };
    
    for (var c in colores) {
        color.options[color.options.length] = new Option(c, c);
    }
    
    for (var t in tallas) {
        talla.options[talla.options.length] = new Option(t, t);
    }
};
//
    //Subir: Alerta
//
const subirAlerta = document.querySelector("#subirArticulo");

subirAlerta.onclick = function() {
    var mostrar = document.getElementById("n-subir-responde");
    mostrar.className = "n-mostrar";
    setTimeout(function(){ mostrar.className = mostrar.className.replace("n-mostrar", ""); }, 6000);
};
