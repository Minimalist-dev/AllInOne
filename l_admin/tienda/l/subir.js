const subir = document.querySelector("#n-subir-envia");
const subirResponde = document.querySelector("#n-subir-responde");

subir.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let categoria       = document.forms["subir"]["categoria"].value;
    let subCategoria    = document.forms["subir"]["subCategoria"].value;
    let marca           = document.forms["subir"]["marca"].value;
    let nombre          = document.forms["subir"]["nombre"].value;
    let color           = document.forms["subir"]["color"].value;
    let talla           = document.forms["subir"]["talla"].value;
    let descripcion     = document.forms["subir"]["descripcion"].value;
    let costo           = document.forms["subir"]["costo"].value;
    let cantidad        = document.forms["subir"]["cantidad"].value;
    let imagen          = document.forms["subir"]["imagen"].value;
    let subirArticulo   = document.forms["subir"]["subirArticulo"].value;
    let datos           = new FormData(subir);
    
    datos.append('categoria', categoria);
    datos.append('subCategoria', subCategoria);
    datos.append('marca', marca);
    datos.append('nombre', nombre);
    datos.append('color', color);
    datos.append('talla', talla);
    datos.append('descripcion', descripcion);
    datos.append('costo', costo);
    datos.append('cantidad', cantidad);
    datos.append('imagen ', imagen);
    datos.append('subirArticulo', subirArticulo);

    fetch('../../sql-interior/tienda/Subir.php', {
        method: 'POST',
        body: datos
    })
    .then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
    }).then(function(texto) {
        subirResponde.innerHTML = texto;
        subir.reset();
    }).catch(function(error) {
        console.log(error);
    });
});


