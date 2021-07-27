const amigo         = document.querySelector("#amigo");
const amigoResponde = document.querySelector("#amigo-responde");

var jsonObject;

amigo.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let yo      = document.forms["amigo"]["yo"].value;
    let usuario = document.forms["amigo"]["usuario"].value;
    let amigos  = document.forms["amigo"]["amigos"].value;
    
    let datos   = new FormData(amigo);
    
    datos.append('yo', yo);
    datos.append('usuario', usuario);
    datos.append('amigos ', amigos);

    fetch('../../../s/red_social/s/Amigos.php', {
        method: 'POST',
        body: datos
    })
    .then(function(response) {
        if (response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
    }).then(function(texto) {
        amistad();
        amigoResponde.innerHTML = texto;
    }).catch(function(error) {
        console.log(error);
    });
});

var botonAmistad = document.querySelector("#amistad-icono");

function 
amistad() {
fetch('../../../s/red_social/l/Amigo.php', {
    method: 'GET'
}).then(function (response) {
    if(response.ok) { return response.json(); } 
    else { console.log("..........................................."); }
}).then(function (json) {
    if (json[0].amigos == 'Conocido') {
        botonAmistad.className =  'fas fa-user-check';
    } else if (json[0].amigos == 'Amigo') {
        botonAmistad.className =  'fas fa-user-friends';
    } else if (json[0].amigos == '') {
        botonAmistad.className = 'fas fa-user-alt';
    } 
}).catch(function (err) {
    console.log('Fetch problem: ' + err.message);
});
}
amistad();