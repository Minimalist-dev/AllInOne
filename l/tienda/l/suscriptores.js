const suscriptor            = document.querySelector("#n-suscriptor-envia");
const suscriptorResponde    = document.querySelector("#n-suscriptor-responde");

suscriptor.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let correo = document.forms["suscriptor"]["correo"].value;
    let suscribir = document.forms["suscriptor"]["suscribir"].value;
    let datos = new FormData(suscriptor);
    
    datos.append('correo', correo);
    datos.append('suscribir', suscribir);

    fetch('sql/tienda/Suscriptores.php', {
        method: 'POST',
        body: datos
    })
    .then(function(response) {
        if (response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
    }).then(function(texto) {
        suscriptorResponde.innerHTML = texto;
    }).catch(function(error) {
        console.log(error);
    });
});


