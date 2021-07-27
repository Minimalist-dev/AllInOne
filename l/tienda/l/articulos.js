//
    //Evita el reenvio de información de los formularios al recargar
//
if (window.history.replaceState) { // verificamos disponibilidad
//    window.history.replaceState(null, null, window.location.href);
}
var datos;
var jsonObject;

fetch('s/tienda/Articulos.php').then(function (response) {
    return response.json();
}).then(function (response) {
    jsonObject = response;
    responder();
}).catch(function (err) {
    console.log('Fetch problem: ' + err.message);
});

function 
responder() {
    let output = "";
    
    for(let i in jsonObject) {
        output += `
<article>
    <img src="i_img/tienda/l/${jsonObject[i].imagen}" alt="" />
    <div class="n-articulo-contenedor">
        <h3 class="n-marca">${jsonObject[i].marca}</h3>
        <p class="n-nombre">${jsonObject[i].nombre}</p>
        <p class="n-detalles">
            <a href="i/tienda/detalles.php?id=${jsonObject[i].id}&marca=${jsonObject[i].marca}">
                Detalles <i class='fas fa-cart-plus'></i>
            </a>
        </p>
        <form action="" method="POST" name="articulo${jsonObject[i].id}" id="escoger-form${jsonObject[i].id}">
            <input type="hidden" name="id" value="${jsonObject[i].id}">
            <input type="hidden" name="marca" value="${jsonObject[i].marca}">
            <input type="hidden" name="nombre" value="${jsonObject[i].nombre}">
            <input type="hidden" name="color" value="${jsonObject[i].color}">
            <input type="hidden" name="talla" value="${jsonObject[i].talla}">
            <input type="hidden" name="descripcion" value="${jsonObject[i].descripcion}">
            <label for="mas" hidden="">
                <input type="number" name="mas" value="1">
            </label>
            <input type="hidden" name="cantidad" value="1">
            <input type="hidden" name="precio" value="${jsonObject[i].precio}">
            <button type="submit" name="escoger" id="n-escoger" value="Escoger" onclick="enviar(${jsonObject[i].id})">    
                    Escoger <i class="fa fa-shopping-cart"></i>
            </button>
        </form>
    </div> 
</article>
        `;
    }
    document.querySelector(".n-grid-area-4 > div").innerHTML = output;
}


function 
enviar(idUnico) {
    const escogerForm = document.querySelector("#escoger-form"+idUnico);
    const alertaGeneral = document.querySelector("#n-alerta-general");

    escogerForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let id              = document.forms["articulo" + idUnico]["id"].value;
        let marca           = document.forms["articulo" + idUnico]["marca"].value;
        let nombre          = document.forms["articulo" + idUnico]["nombre"].value;
        let color           = document.forms["articulo" + idUnico]["color"].value;
        let talla           = document.forms["articulo" + idUnico]["talla"].value;
        let descripcion     = document.forms["articulo" + idUnico]["descripcion"].value;
        let mas             = document.forms["articulo" + idUnico]["mas"].value;
        let cantidad        = document.forms["articulo" + idUnico]["cantidad"].value;
        let precio          = document.forms["articulo" + idUnico]["precio"].value;
        let escogerArticulo = document.forms["articulo" + idUnico]["escoger"].value;

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
}

