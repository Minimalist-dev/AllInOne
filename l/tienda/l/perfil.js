const perfil = document.querySelector("#n-perfil-envia");
const perfilResponde = document.querySelector("#n-perfil-responde");

perfil.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let correo = document.forms["perfil"]["correo"].value;
    let suscriptor = document.forms["perfil"]["suscriptor"].value;
    let datos = new FormData(perfil);
    
    datos.append('correo', correo);
    datos.append('suscriptor', suscriptor);

    fetch('../../s/tienda/Perfil.php', {
        method: 'POST',
        body: datos
    })
    .then(function(response) {
        if (response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
    }).then(function(texto) {
        perfilResponde.innerHTML = texto;//console.log(texto);
    }).catch(function(error) {
        console.log(error);
    });
});
