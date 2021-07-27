var buscar, cantidad, por, ordenar, inicioDePaginacion, entradaDePaginacion; 

const anterior  = document.querySelector(".n-anterior");
const siguiente = document.querySelector(".n-siguiente");

buscar              = document.querySelector("#buscar");
cantidad            = document.querySelector("#cantidad");
por                 = document.querySelector("#por");
ordenar             = document.querySelector("#ordenar");
inicioDePaginacion  = document.querySelector("#paginacion");
entradaDePaginacion = document.querySelector("#inicio-de-paginacion");
/*
    *Busqueda 
 */
buscar.addEventListener("input", function() {
    let valor           = document.forms["buscar"]["buscar"].value;
    let reOrdenarDato   = new FormData(buscar);
   
    reOrdenarDato.append('buscar', valor);
    
    if (reOrdenarDato === "") { leer(); } 
    else { leer(reOrdenarDato); }
});
/*
    *Re-leer
 */
cantidad.addEventListener('input', function() {
    let valor           = document.forms["cantidad"]["cantidad"].value;
    let reOrdenarDato   = new FormData(cantidad);
   
    reOrdenarDato.append('cantidad', valor);
    
    if (reOrdenarDato === "") { leer(); } 
    else { leer(reOrdenarDato); }

});
por.addEventListener('input', function() {
    let valor           = document.forms["por"]["por"].value;
    let reOrdenarDato   = new FormData(por);
   
    reOrdenarDato.append('por', valor);
    
    if (reOrdenarDato === "") { leer(); } 
    else { leer(reOrdenarDato); }

});
ordenar.addEventListener('input', function() {
    let valor           = document.forms["ordenar"]["ordenar"].value;
    let reOrdenarDato   = new FormData(ordenar);
   
    reOrdenarDato.append('ordenar', valor);
    
    if (reOrdenarDato === "") { leer(); } 
    else { leer(reOrdenarDato); }
});
/*
    *Paginación 
*/
var maximo;

fetch(
    "s/sistema_php/CantidadDeFilas.php"
).then(function (response) {
    if (response.ok) { return response.json(); } 
    else { throw "Error en la llamada"; }
}).then(function (json) {
    maximo = json;
});
anterior.onclick = function () {
    entradaDePaginacion.stepDown(4);
    inicionDePaginacion();
};
siguiente.onclick = function () {
    entradaDePaginacion.stepUp(4);
    inicionDePaginacion();
};
inicioDePaginacion.oninput = function () {
    inicionDePaginacion();
};
function 
inicionDePaginacion() {
    let valor           = document.forms["paginacion"]["inicio-de-paginacion"].value;
    let reOrdenarDato   = new FormData(inicioDePaginacion);
   
    reOrdenarDato.append('inicio-de-paginacion', valor);
    
    if (reOrdenarDato === "") { leer(); } 
    else { leer(reOrdenarDato); }
    
    entradaDePaginacion.value + 4 <= maximo ? anterior.style.visibility = 'hidden' : anterior.style.visibility = 'visible';
    entradaDePaginacion.value >= maximo - 4 ? siguiente.style.visibility = 'hidden' : siguiente.style.visibility = 'visible';
}