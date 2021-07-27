//
    //Evita el reenvio de información de los formularios al recargar
//
if (window.history.replaceState) { // verificamos disponibilidad
//    window.history.replaceState(null, null, window.location.href);
}

const articulosRespuesta = document.querySelector(".n-grid-area-4 > article");

//window.onload = function () {
    fetch('sql/tienda/Articulos.php').then(function (response) {
        return response.text();
    }).then(function (texto) {
        return articulosRespuesta.innerHTML = texto;
    }).catch(function (err) {
        console.log('Fetch problem: ' + err.message);
    });
//};

//fetch('sql/tienda/ArticulosDemo.php').then((res) => res.json()).then(response => {
////    console.log(response);
//    let output = "";
//    for(let i in response) {
////        output += ;
//        //output += "<ul>";
//        //  output += "<li>" + response[i].id + "</li>";
//        //output += "</ul>";
////        output += `<ul>
////            <li>${response[i].id}</li>
////            <li>${response[i].nombre}</li>    
////        </ul>`;
//        output += `
//<section>
//    <img src="multi/tienda/img/${response[i].imagen}" alt="" />
//    <div class="n-artculo-contenedor">
//        <h3 class="n-marca">${response[i].marca}</h3>
//        <p class="n-nombre">${response[i].nombre}</p>
//        <p class="n-detalles">
//            <a href="front/tienda/detalles.php?id=${response[i].id}&marca=${response[i].marca}">
//                Detalles <i class='fas fa-cart-plus'></i>
//            </a>
//        </p>
//        <!--form action="" method="POST" name="articulo" id="escoger-form"-->
//        <form method="POST">
//            <input type="hidden" name="id" value="${response[i].id}">
//            <input type="hidden" name="marca" value="${response[i].marca}">
//            <input type="hidden" name="nombre" value="${response[i].nombre}">
//            <input type="hidden" name="color" value="${response[i].color}">
//            <input type="hidden" name="talla" value="${response[i].talla}">
//            <input type="hidden" name="descripcion" value="${response[i].descripcion}">
//            <label for="mas" hidden="">
//                <input type="number" name="mas" id="mas" value="1">
//            </label>
//            <input type="hidden" name="cantidad" value="1">
//            <input type="hidden" name="precio" value="${response[i].precio}">
//            <button type="submit" id="n-escoger" name="escoger" value="Escoger">
//                Escoger <i class="fa fa-shopping-cart"></i>
//            </button>
//        </form>
//    </div> 
//</section>
//        `;
//    }
//    document.querySelector(".n-grid-area-4 > article").innerHTML = output;
//}).catch(function (err) {
//    console.log('Fetch problem: ' + err.message);
//});



/*---------------------------------------------------------------------------------------------*/
//var datos;
//
//fetch('sql/tienda/ArticulosDemo.php').then(function (response) {
//    return response.json();
//}).then(function (json) {
//    datos = json;
//    inicializar();
//}).catch(function (err) {
//    console.log('Fetch problem: ' + err.message);
//});
//function inicializar() {
//    var articulosRespuesta  = document.querySelector(".n-grid-area-4 > article");
//    
//    var finalGroup;
//
//    finalGroup = datos;
//    updateDisplay();
//
//    finalGroup = [];
//    
//    
//    
//    function
//    updateDisplay() {
////        while (articulosRespuesta.firstChild) {
////            articulosRespuesta.removeChild(articulosRespuesta.firstChild);
////        }
//        
//        for (var i = 0; i < finalGroup.length; i++) {
//            fetchBlob(finalGroup[i]);
//        }
//    }
//    function
//      fetchBlob(dato) {
//        var url = 'multi/tienda/img/' + dato.imagen;
//        fetch(url).then(function (response) {
//            return response.blob();
//        }).then(function (blob) {
//            var imagenURL = URL.createObjectURL(blob);
//            showProduct(imagenURL, dato);
//        });
//    }
//
//    function
//      showProduct(imagenURL, dato) {
//        var seccion = document.createElement('section');
//        var imagen = document.createElement('img');
//        var div = document.createElement('div');
//        var marca = document.createElement('h3');
//        var nombre = document.createElement('p');
//        var detalles = document.createElement('p');
//        var detallesLink = document.createElement('a');
//        var detallesIcono = document.createElement('i');
//        var formulario = document.createElement('form');
//        var entradaID = document.createElement('input');
//        var entradaMarca = document.createElement('input');
//        var entradaNombre = document.createElement('input');
//        var entradaColor = document.createElement('input');
//        var entradaTalla = document.createElement('input');
//        var entradaDescripcion = document.createElement('input');
//        var etiqueta = document.createElement('label');
//        var entradaMas = document.createElement('input');
//        var entradaCantidad = document.createElement('input');
//        var entradaPrecio = document.createElement('input');
//        var escoger = document.createElement('button');
//        var escogerIcono = document.createElement('i');
//// seccion.setAttribute('class', dato.type);
//// heading.textContent = dato.nombre.replace(dato.nombre.charAt(0), dato.nombre.charAt(0).toUpperCase());
//// para.textContent = '$' + dato.marca;
//// para.textContent = '$' + dato.price.toFixed(2);
//        imagen.src = imagenURL;
//        imagen.alt = dato.nombre;
//        div.setAttribute('class', 'n-articulo-contenedor');
//        marca.setAttribute('class', 'n-marca');
//        marca.textContent = dato.marca;
//        nombre.setAttribute('class', 'n-nombre');
//        nombre.textContent = dato.nombre;
//        detalles.setAttribute('class', 'n-detalles');
//        detallesLink.setAttribute('href', 'front/tienda/detalles.php?id=' + dato.id);
//        detallesLink.textContent = 'Detalles ';
//        detallesIcono.setAttribute('class', 'fas fa-cart-plus');
////        formulario.setAttribute('action', '');
//        formulario.setAttribute('method', 'POST');
//        formulario.setAttribute('name', 'articulo');
//        formulario.setAttribute('id', 'escoger-form');
//        entradaID.setAttribute('hidden', '');
//        entradaID.setAttribute('name', 'id');
//        entradaID.setAttribute('value', dato.id);
//        entradaMarca.setAttribute('hidden', '');
//        entradaMarca.setAttribute('name', 'marca');
//        entradaMarca.setAttribute('value', dato.marca);
//        entradaNombre.setAttribute('hidden', '');
//        entradaNombre.setAttribute('name', 'nombre');
//        entradaNombre.setAttribute('value', dato.nombre);
//        entradaColor.setAttribute('hidden', '');
//        entradaColor.setAttribute('name', 'color');
//        entradaColor.setAttribute('value', dato.color);
//        entradaTalla.setAttribute('hidden', '');
//        entradaTalla.setAttribute('name', 'talla');
//        entradaTalla.setAttribute('value', dato.talla);
//        entradaDescripcion.setAttribute('hidden', '');
//        entradaDescripcion.setAttribute('name', 'descripcion');
//        entradaDescripcion.setAttribute('value', dato.descripcion);
//        etiqueta.setAttribute('hidden', '');
//        etiqueta.setAttribute('for', 'mas');
//        entradaMas.setAttribute('id', 'mas');
//        entradaMas.setAttribute('type', 'number');
//        entradaMas.setAttribute('name', 'mas');
//        entradaMas.setAttribute('value', "1");
//        entradaCantidad.setAttribute('hidden', '');
//        entradaCantidad.setAttribute('name', 'cantidad');
//        entradaCantidad.setAttribute('value', "");
//        entradaPrecio.setAttribute('hidden', '');
//        entradaPrecio.setAttribute('name', 'precio');
//        entradaPrecio.setAttribute('value', dato.precio);
//        escoger.setAttribute('type', 'submit');
//        escoger.setAttribute('name', 'escoger');
//        escoger.setAttribute('id', 'n-escoger');
//        escoger.setAttribute('value', 'Escoger');
//        escoger.textContent = 'Escoger ';
//        escogerIcono.classList = 'fa fa-shopping-cart';
//
//        articulosRespuesta.appendChild(seccion);
//        seccion.appendChild(imagen);
//        seccion.appendChild(div);
//        div.appendChild(marca);
//        div.appendChild(nombre);
//        div.appendChild(detalles);
//        detalles.appendChild(detallesLink);
//        detallesLink.appendChild(detallesIcono);
//        div.appendChild(formulario);
//        formulario.appendChild(entradaID);
//        formulario.appendChild(entradaMarca);
//        formulario.appendChild(entradaNombre);
//        formulario.appendChild(entradaColor);
//        formulario.appendChild(entradaTalla);
//        formulario.appendChild(entradaDescripcion);
//        formulario.appendChild(etiqueta);
//        etiqueta.appendChild(entradaMas);
//        formulario.appendChild(entradaCantidad);
//        formulario.appendChild(entradaPrecio);
//        formulario.appendChild(escoger);
//        escoger.appendChild(escogerIcono);
//    }
//
//}
////var enviarEscogido      = document.querySelector("#n-escoger");
////enviarEscogido.onclick = enviar;
////    function enviar(e) {
////        e.preventDefault();
////        updateDisplay();
////        
////    } 
//const escogerForm = document.querySelector("#escoger-form");
//const escogerResponde = document.querySelector("#n-escoger-responde");
//
//escogerForm.addEventListener('submit', function(e) {
//    e.preventDefault();
//
//    fetch('http://localhost/AllInOne/index.php').then(function(response) {
////        if(response.ok) { 
//            return response.text(); 
//            updateDisplay();
////            inicializar();
////        } 
////        else { throw "Error en la llamada"; }
//    }).then(function(texto) {
//        escogerResponde.innerHTML = texto;
////        escoger.reset();
//    }).catch(function(error) {
//        console.log(error);
//    });
//});
  











