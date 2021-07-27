var jsonObject, comentados;
/*
    * GustaSi 
 */
class RePublicar {
    static
    datos() {
        fetch('../../s/red_social/l/PublicacionInicio_1.php').then(function (response) {
            return response.json();
        }).then(function (json) {
            jsonObject = json;
    
            Obtener.publicacion();
        }).catch(function (err) {
            console.log('Fetch problem: ' + err.message);
        });
    }
}
/*
    * GustaSi 
 */
function 
gustaSI(id) {
    const gustaSi = document.querySelector("#gusta-si"+id);
    
    gustaSi.addEventListener('submit', function (e) {
        e.preventDefault();

        let publicacionSi   = document.forms["gusta-si"+id]["publicacion-si"].value;
        let gustaSiBoton    = document.forms["gusta-si"+id]["gusta-si-boton"].value;

        let datos = new FormData(gustaSi);

        datos.append('publicacion-si', publicacionSi);
        datos.append('gusta-si-boton', gustaSiBoton);

        fetch('../../s/red_social/s/GustaSi.php', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada";
            }
        }).then(function (texto) {
//            Obtener.publicacion();
            RePublicar.datos();
            console.log(publicacionSi + "" + texto);
        }).catch(function (error) {
            console.log(error);
        });
    });
}
/*
    * GustaNo 
 */
function 
gustaNo(id) {
    const gustaNo = document.querySelector("#gusta-no"+id);
    
    gustaNo.addEventListener('submit', function (e) {
        e.preventDefault();

        let publicacionNo = document.forms["gusta-no"+id]["publicacion-no"].value;
        let gustaNoBoton  = document.forms["gusta-no"+id]["gusta-no-boton"].value;
        
        let datos = new FormData(gustaNo);

        datos.append('publicacion-no', publicacionNo);
        datos.append('gusta-no-boton', gustaNoBoton);
        
        fetch('../../s/red_social/s/GustaNo.php', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada";
            }
        }).then(function (texto) {
//            Obtener.publicacion();
            RePublicar.datos();
            console.log(publicacionNo + "" + texto);
        }).catch(function (error) {
            console.log(error);
        });
    });
}
/*
    * Comentar
 */
function 
comentar(id) {
    comentados = document.getElementById("comentarios-"+id);

    if (comentados.className.indexOf("mostrar") == -1) { comentados.className += " mostrar"; } 
    else { comentados.className = comentados.className.replace("mostrar", ""); }
}
function 
comentado(id) {
    const form = document.querySelector("#comentario"+id);
    
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let usuario         = document.forms["comentario"+id]["usuario"].value;
        let publicacion     = document.forms["comentario"+id]["publicacion"].value;
        let comentario      = document.forms["comentario"+id]["comentario"].value;
        let comentar        = document.forms["comentario"+id]["comentar"].value;
        
        let datos = new FormData(form);

        datos.append('usuario', usuario);
        datos.append('publicacion', publicacion);
        datos.append('comentario', comentario);
        datos.append('comentar', comentar);
        
        fetch('../../s/red_social/s/Comentar.php', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada";
            }
        }).then(function (texto) {
//            Obtener.publicacion();
            RePublicar.datos();
//            setTimeout(function(){ 
//                RePublicar.datos(); 
//            }, 100);
            setTimeout(function(){ 
                comentados = document.getElementById("comentarios-"+publicacion);
                
                if (comentados.className.indexOf("mostrar") == -1) { comentados.className += " mostrar"; } 
                else { comentados.className = comentados.className.replace("mostrar", ""); }
            }, 100);
        }).catch(function (error) {
            console.log(error);
        });
    });
}
//function 
//comentados(id) {
//    const comentados = document.querySelector("#comentados" + id);
//  
//    comentados.addEventListener('submit', function (e) {
//        e.preventDefault();
//        
//        let publicacion = document.forms["comentados" + id]["publicacion"].value;
//        let comentar = document.forms["comentados" + id]["comentar"].value;
//    
//        let datos = new FormData(comentados);
//    
//        datos.append('publicacion', publicacion);
//        datos.append('comentar', comentar);
//    
//        fetch('../../sql/red-social/ComentariosInicio.php', {
//            method: 'POST',
//            body: datos
//        }).then(function (response) {
//            if (response.ok) {
//                return response.json();
//            } else {
//                throw "Error en la llamada";
//            }
//        }).then(function (texto) {
////            Obtener.publicacion();
////            RePublicar.datos();
//
//            jsonComentado = json;
//    
//            let salida = "";
//        
//            for (let i in jsonComentado) {
//                console.log(jsonComentado);
////            console.log("id-" + jsonObject[i].id + "idU-" + jsonObject[i].idUsuario);
//    salida += `
//                <!-- 
//                    Comentarios 
//                -->
//
//                <div class="comentario">
//                    <img src="../../front-multimedia/red-social/imagen/avatar3.png" alt="Avatar" style="width:100%;">
//                    <p>${jsonComentado[i].comentario}</p>
//                    <span class="time-right">${jsonComentado[i].fecha}</span>
//                </div>
//                            `;
//    //        document.querySelector("#comentado-"+jsonObject[i].id).innerHTML = salida;
//            }
//  document.querySelector("#comentado-"+publicacion).innerHTML = salida;
//
//        }).catch(function (error) {
//            console.log(error);
//        });
//    });
//}
/*
    * Compartir
 */
function 
compartir(id) {
    const compartir = document.querySelector("#compartir"+id);
    
    compartir.addEventListener('submit', function (e) {
        e.preventDefault();

        let compartido      = document.forms["compartir"+id]["compartido"].value;
        let nombre          = document.forms["compartir"+id]["nombre"].value;
        let usuario         = document.forms["compartir"+id]["usuario"].value;
        let articulo        = document.forms["compartir"+id]["articulo"].value;
        let imagen          = document.forms["compartir"+id]["imagen"].value;
        let compartirBoton  = document.forms["compartir"+id]["compartir-boton"].value;
        
        let datos = new FormData(compartir);

        datos.append('compartido', compartido);
        datos.append('nombre', nombre);
        datos.append('usuario', usuario);
        datos.append('articulo', articulo);
        datos.append('imagen', imagen);
        datos.append('compartir-boton', compartirBoton);
        
        fetch('../../s/red_social/s/Compartir.php', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada";
            }
        }).then(function (texto) {
            Obtener.publicacion();
            RePublicar.datos();
            console.log(compartido + " " + usuario + " " + texto);
        }).catch(function (error) {
            console.log(error);
        });
    });
}