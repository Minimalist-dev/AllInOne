/*
    * Comentarios  
 */
var jsonComentado

//fetch('../../sql/red-social/ComentariosInicio.php').then(function (response) {
//    return response.json();
//}).then(function (json) {console.log(json);
//    jsonComentado = json;
//
//    Comentarios.comentados();
//}).catch(function (err) {
//    console.log('Fetch problem: ' + err.message);
//});

class Comentarios {
    static
    comentar(id) {
        fetch('../../sql/red-social/ComentariosInicio.php').then(function (response) {
            return response.json();
        }).then(function (json) {
            console.log(json);
            jsonComentado = json;

            Comentarios.comentados();
        }).catch(function (err) {
            console.log('Fetch problem: ' + err.message);
        });
    }
    static
    comentados() {
        let salida = "";

        for (let i in jsonComentado) {
            console.log(jsonComentado);
//            console.log("id-" + jsonObject[i].id + "idU-" + jsonObject[i].idUsuario);
            salida += `
<!-- 
    Comentarios 
-->

<div class="comentario">
    <img src="../../front-multimedia/red-social/imagen/avatar3.png" alt="Avatar" style="width:100%;">
    <p>${jsonComentado[i].comentario}</p>
    <span class="time-right">${jsonComentado[i].fecha}</span>
</div>
            `;
        
//        document.querySelector("#comentado-"+jsonObject[i].id).innerHTML = salida;
        }
        document.querySelector("#comentado-36").innerHTML = salida;
        document.querySelector(".comentado-36").innerHTML = salida;
    }
}