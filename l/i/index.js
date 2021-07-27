var slideIndex = 0;
var detener;

showSlides();

function 
showSlides() {
    var i;
    
    const slides = document.getElementsByClassName("formas");
    const iconos = document.getElementsByClassName("icono");
    
    l = slides.length;
    for (i = 0; i < l; i++) {
        slides[i].style.display = "none";
        iconos[i].style.display = "none";
    }

    slideIndex++;
    
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    slides[slideIndex - 1].style.display = "block";
    iconos[slideIndex - 1].style.display = "block";
    
    detener = setTimeout(showSlides, 4000);
}
//
    // Aside
//
const pregunta  = document.querySelector(".n-grid > .area-4 > aside > p.pregunta");
const respuesta = document.querySelector(".n-grid > .area-4 > aside > p.respuesta");
const into      = [
    'Y', 
    ' ', 
    't', 'u', 
    ' ', 
    'q', 'u', 'e', 
    ' ', 
    'q', 'u', 'i', 'e', 'r', 'e', 's',
    ' ',
    'h', 'a', 'c', 'e', 'r'
];

into.forEach(function (arreglo, indice) {
    var filtrar = document.createElement('span');
    
    filtrar.innerHTML = arreglo;
    
    pregunta.appendChild(filtrar);
});

function 
random(number) {
    return Math.floor(Math.random() * number);
}
function 
color() {
    let retorno = 'rgb(' + random(255) + ',' + random(255) + ',' + random(255) + ')';
    return retorno;
}
function 
sombra() {
    let retorno = random(0) + 'px ' + random(0) + 'px ' + random(100) + 'px ' + 'rgb(' + random(255) + ',' + random(255) + ',' + random(255) + '), ' + random(0) + 'px ' + random(0) + 'px ' + random(40) + 'px '  + 'rgb(' + random(255) + ',' + random(255) + ',' + random(255) + '),' + random(0) + 'px ' + random(0) + 'px ' + random(80)  + 'px ' + 'rgb(' + random(255) + ',' + random(255) + ',' + random(255) + ')';
    return retorno;
}

var filtros     = document.querySelectorAll(".n-grid > .area-4 > aside > p.pregunta > span");

for (var i = 0; i < filtros.length; i++) {
    filtros[i].onclick = function (evento) {
        evento.target.style.color = color();
        evento.target.style.textShadow = sombra();
        evento.target.style.opacity = '1'; 
        
        responder();
    };
}
function
responder() {
    respuesta.style.color = "white";
    respuesta.style.textShadow = sombra();
    
    if (respuesta.innerHTML === "Web")              { respuesta.innerHTML = 'Web page'; } 
    else if(respuesta.innerHTML === 'Web page')     { respuesta.innerHTML = "Website";  } 
    else if(respuesta.innerHTML === 'Website')      { respuesta.innerHTML = 'App Web';  } 
    else if(respuesta.innerHTML === 'App Web')      { respuesta.innerHTML = 'App Móvil';} 
    else if(respuesta.innerHTML === 'App Móvil')    { respuesta.innerHTML = "Software"; } 
    else if(respuesta.innerHTML === 'Software')     { respuesta.innerHTML = 'Tell me';  } 
    else                                            { respuesta.innerHTML = 'Web page'; }
};
