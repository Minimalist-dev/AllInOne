/* Menu
--------------------------------------------------------------------------------*/
const enlace    = document.querySelectorAll(".enlace");
const contenido = document.querySelectorAll(".contenido");
const cerrar    = document.querySelectorAll(".cerrar");

var i;

class Menu {
    static
    abrir(evento, id) {
        let l = contenido.length;
        for (i = 0; i < l; i++) {
            contenido[i].style.display = "none";
            enlace[i].className = enlace[i].className.replace(" activo", "");
        }

        document.getElementById(id).style.display = "block";
        evento.currentTarget.className += " activo";
    }
    static 
    cerrar() { 
        let l = cerrar.length;
        for (i = 0; i < l; i++) {
            cerrar[i].parentElement.style.display = 'none';
            enlace[i].className = enlace[i].className.replace(" activo", "");
        }
    }
}

