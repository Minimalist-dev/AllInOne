const boletin = document.querySelector("#n-boletin-envia");
const boletinResponde = document.querySelector("#n-boletin-responde");

boletin.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let correo = document.forms["boletin"]["correo"].value;
    let unirse = document.forms["boletin"]["unirse"].value;
    let datos = new FormData(boletin);
    
    datos.append('correo', correo);
    datos.append('unirse', unirse);
//    console.log(datos.get('correo'));
    fetch('sql/tienda/Boletines.php', {
        method: 'POST',
        body: datos
//        ,
//        headers: {
//            'Content-Type': 'text/plain'
//        }
    })
    .then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
    }).then(function(texto) {
        boletinResponde.innerHTML = texto;//console.log(texto);
    }).catch(function(error) {
        console.log(error);
    });
});


