var indice = 0;
var autoDetener;

auto();
function auto() {
    var i;
    const diapositivas = document.querySelectorAll(".n-diapositivas");
    const puntos = document.querySelectorAll(".n-punto");
    const actuales = document.querySelectorAll(".n-actual");
    
    var l = diapositivas.length;
    for (i = 0; i < l; i++) {
        diapositivas[i].style.display = "none";  
    }
    var l = puntos.length;
    for (i = 0; i < l; i++) {
        puntos[i].className = puntos[i].className.replace(" n-activo", "");
    }
    var l = actuales.length;
    for (i = 0; i < l; i++) {
        actuales[i].className = actuales[i].className.replace(" n-activo", "");
    }
    
    indice++;
    if (indice > diapositivas.length) {
        indice = 1;
    }    

    diapositivas[indice-1].style.display = "block";  
    puntos[indice-1].className += " n-activo";
    actuales[indice-1].className += " n-activo";
    
    autoDetener = setTimeout(auto, 4000);
    
    const pause = document.querySelector(".n-grid-area-3");

    pause.onmouseover = function() {
        clearTimeout(autoDetener);
    };

    pause.onmouseout = function() {
        autoDetener = setTimeout(auto, 4000);
    };
}
function 
mas(n) {
    auto(indice += n -1);
    clearTimeout(autoDetener);
}
function 
actual(n) {
    auto(indice = n -1);
    clearTimeout(autoDetener);
}
//var indice = 0;
//var autoDetener;
//class Diapositiva {
//    static
//    auto() {
//        var i;
//        const diapositivas = document.querySelectorAll(".n-diapositivas");
//        const puntos = document.querySelectorAll(".n-punto");
//        const actuales = document.querySelectorAll(".n-actual");
//
//        for (i = 0; i < diapositivas.length; i++) {
//            diapositivas[i].style.display = "none";  
//        }
//        for (i = 0; i < puntos.length; i++) {
//            puntos[i].className = puntos[i].className.replace(" n-activo", "");
//        }
//        for (i = 0; i < actuales.length; i++) {
//            actuales[i].className = actuales[i].className.replace(" n-activo", "");
//        }
//
//        indice++;
//        if (indice > diapositivas.length) {
//            indice = 1;
//        }    
//
//        diapositivas[indice-1].style.display = "block";  
//        puntos[indice-1].className += " n-activo";
//        actuales[indice-1].className += " n-activo";
//
//        autoDetener = setTimeout(Diapositiva.auto, 11000);
//        
//        const pause = document.querySelector(".n-grid-area-3");
//        
//        pause.onmouseover = function() {
//            clearTimeout(autoDetener);
//        };
//
//        pause.onmouseout = function() {
//            autoDetener = setTimeout(Diapositiva.auto, 11000);
//        };
//    }
//    static
//    mas(n) {
//        auto(indice += n -1);
//        clearTimeout(autoDetener);
//    }
//}
//Diapositiva.auto();
//Diapositiva.mas();
