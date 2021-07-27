const menos     = document.querySelector(".n-menos");
const mas       = document.querySelector(".n-mas");
const precio    = document.querySelector("#precio").value;
const cantidad  = document.querySelector("#mas");

menos.onclick = function () {
    document.querySelector("#mas").stepDown();
    total();
};
mas.onclick = function () {
    document.querySelector("#mas").stepUp();
    total();
};
cantidad.oninput = function (t) {
    total();
};
function 
total() {
    var total = Number(precio) * Number(cantidad.value);
    document.querySelector("#n-total").value = Number(total).toFixed(2);
}

//const detallesRespuesta = document.querySelector(".n-grid-area-3 > main");
//
//fetch('../../sql/tienda/Detalles.php').then(function(response) {
//    return response.text();
//}).then(function(texto) {
//    detallesRespuesta.innerHTML = texto;
//}).catch(function(err) {
//    console.log('Fetch problem: ' + err.message);
//});

const escogerForm = document.querySelector("#detalles");
const alertaGeneral = document.querySelector("#n-alerta-general");

escogerForm.addEventListener('submit', function (e) {
    e.preventDefault();

    let id              = document.forms["detalles"]["id"].value;
    let marca           = document.forms["detalles"]["marca"].value;
    let nombre          = document.forms["detalles"]["nombre"].value;
    let color           = document.forms["detalles"]["color"].value;
    let talla           = document.forms["detalles"]["talla"].value;
    let descripcion     = document.forms["detalles"]["descripcion"].value;
    let mas             = document.forms["detalles"]["mas"].value;
    let cantidad        = document.forms["detalles"]["cantidad"].value;
    let precio          = document.forms["detalles"]["precio"].value;
    let escogerArticulo = document.forms["detalles"]["escoger"].value;

    datos = new FormData(escogerForm);

    datos.append('id', id);
    datos.append('marca', marca);
    datos.append('nombre', nombre);
    datos.append('color', color);
    datos.append('talla', talla);
    datos.append('descripcion', descripcion);
    datos.append('mas', mas);
    datos.append('cantidad', cantidad);
    datos.append('precio ', precio);
    datos.append('escoger', escogerArticulo);

    fetch('', {//fetch('sql/tienda/Carrito.php', {
        method: 'POST',
        body: datos
    }).then(function (response) {
        if (response.ok) {
            return response.text();
        } else {
            throw "Error en la llamada";
        }
    }).then(function (texto) {
        alertaGeneral.innerHTML = "El " + marca + " elegido se agrego al carrito.";
        alertaGeneral.className = "n-mostrar";

        setTimeout(function () {
            alertaGeneral.className = alertaGeneral.className.replace("n-mostrar", "");
        }, 4000);
    }).catch(function (error) {
        console.log(error);
    });

});
