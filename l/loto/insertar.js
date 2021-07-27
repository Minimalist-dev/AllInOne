class Confirmar {
    registroDeSorteo() {
        var button = document.querySelector('button');

        button.onclick = function() {
            var nIntruciones = confirm("¿Desea registrar estos datos?"); 	
            return nIntruciones;
        };
    }
}

let confirmarObject = new Confirmar();
confirmarObject.registroDeSorteo();


