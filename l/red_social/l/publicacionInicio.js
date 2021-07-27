var jsonObject;
var jsonComentado;

fetch('../../s/red_social/l/PublicacionInicio.php').then(function (response) {
    return response.json();
}).then(function (json) {// console.log("Cero: " + json[0].comentario[0][0].comentario);
    jsonObject = json;

    Obtener.publicacion();
}).catch(function (err) {
    console.log('Fetch problem: ' + err.message);
});

class Obtener {
    static
    publicacion() {
        let salida = "";

        for (let i in jsonObject) {
            salida += "<article>";
            salida += "<section class='articulo-head'>";
                salida += "<section>";
                    salida += "<img src='../../i_img/red_social/i/"+jsonObject[i].foto + "'class='foto' alt='alt'/>";
                    salida += "<div>";
                        salida += "<span>" + jsonObject[i].fecha + ", Por </span>";
                        salida += "<h6 class='titulo'>" + jsonObject[i].nombre + "<span> " + jsonObject[i].de + " </span>" + jsonObject[i].autor + "</h6>";
                    salida += "</div>";
                salida += "</section>";  
                salida += "<section>";
                    salida += "<button><i class='fas fa-ellipsis-v'></i></button>";
                salida += "</section>";
            salida += "</section>";
            salida += "<hr>";
            salida += "<section class='articulo-body'>";
                salida += "<p>" + jsonObject[i].publicacion + "</p>";
                salida += "<img src='../../i_img/red_social/l/"+jsonObject[i].imagen + "'alt='' style='width: 100%;'/>";
            salida += "</section>";
            salida += "<hr>";
            salida += "<section class='articulo-footer'>";
            salida += "<section>";
                salida += "<form action='' method='POST' name='gusta-si"+jsonObject[i].id + "'id='gusta-si"+jsonObject[i].id + "'>";
                    salida += "<input type='text' value='" + jsonObject[i].id + "' hidden='' name='publicacion-si'>";
                    salida += "<button type='submit' name='gusta-si-boton' value='Si' onclick='gustaSI(" + jsonObject[i].id + ")'>";
                        salida += "<i id='gusta-si-icono' class='fas fa-star'></i>";
                    salida += "</button>";
                salida += "</form>";
            salida += "</section>";
            salida += "<section>";
                salida += "<span>" + jsonObject[i].gustaSi + "</span>";
            salida += "</section>";
            salida += "<section>";
                salida += "<form action='' method='POST' name='gusta-no" + jsonObject[i].id + "' id='gusta-no" + jsonObject[i].id + "'>";
                    salida += "<input type='text' value='" + jsonObject[i].id +"' hidden='' name='publicacion-no'>";
                    salida += "<button type='submit' name='gusta-no-boton' value='No' onclick='gustaNo(" + jsonObject[i].id + ")'>";
                        salida += "<i id='gusta-no-icono' class='fas fa-frog'></i>";
                    salida += "</button>";
                salida += "</form>";
            salida += "</section>";
            salida += "<section>";
                salida += "<span>" + jsonObject[i].gustaNo + "</span>"
            salida += "</section>";
            salida += "<section>";
                salida += "<button onclick='comentar(" + jsonObject[i].id + ")'>";
                    salida += "<i id='gusta-no-icono' class='fas fa-comments'></i>";
                salida += "</button>";
            salida += "</section>";
            salida += "<section>";
                salida += "<span>" + jsonObject[i].comentarios + "</span>";
            salida += "</section>";
            salida += "<section>";
                salida += "<form action='' method='POST' name='compartir" + jsonObject[i].id + "' id='compartir" + jsonObject[i].id + "'>";
                    salida += "<input type='text' hidden='' name='compartido' value='" + jsonObject[i].id + "'>";
                    salida += "<input type='text' hidden='' name='nombre' value='" + jsonObject[i].nombre + "'>";
                    salida += "<input type='text' hidden='' name='usuario' value='" + jsonObject[i].yo + "'>";
                    salida += "<input type='text' hidden='' name='articulo' value='" + jsonObject[i].publicacion + "'>"
                    salida += "<input type='text' hidden='' name='imagen' value='" + jsonObject[i].imagen + "'>";
                    salida += "<button type='submit' name='compartir-boton' value='No' onclick='compartir(" + jsonObject[i].id + ")'>";
                        salida += "<i id='compartir-icono' class='fas fa-share'></i>";
                    salida += "</button>";
                salida += "</form>";
            salida += "</section>";
            salida += "<section>";
                salida += "<span>" + jsonObject[i].compartida + "</span>";
            salida += "</section>";
            salida += "</section>";
            salida += "</article>";
salida += "<!-- Comentarios -->";
            salida += "<div id='comentarios-" + jsonObject[i].id + "' class='ocultar comentarios'>";
                salida += "<section id='comentado-" + jsonObject[i].id + "' class='comentado-" + jsonObject[i].id + "'>";
                    for (let ii in jsonObject[i].comentario) {

                        for (let iii in jsonObject[i].comentario[ii]) {

                            if(jsonObject[i].id == jsonObject[i].comentario[ii][iii].publicacion) { 
                                salida += "<div class='comentario'>";
                                    salida += "<img src='../../i_img/red_social/i/"+jsonObject[i].comentario[ii][iii].foto+"'"; 
                                    salida += "alt='Avatar' class='foto'>";
                                    salida += "<div>";
                                        salida += "<span>" + jsonObject[i].comentario[ii][iii].fecha + ", Por </span>";
                                        salida += "<h6 class='titulo'>" + jsonObject[i].comentario[ii][iii].nombre + "</h6>";
                                        salida += "<p>" + jsonObject[i].comentario[ii][iii].comentario + "</p>";
                                    salida += "</div>";
                                salida += "</div>";
                            }
                        }
                    }
                salida += "</section>";

                salida += "<form action='' method='POST' name='comentario" + jsonObject[i].id + "' id='comentario" + jsonObject[i].id + "'>";
                    salida += "<input type='text' hidden='' name='usuario' value='" + jsonObject[i].yo + "'>";
                    salida += "<input type='text' hidden='' name='publicacion' value='" + jsonObject[i].id + "'>";
                    salida += "<textarea name='comentario' placeholder='Comentar...' rows='2' maxlength='98'></textarea>";
                    salida += "<button type='submit' name='comentar' id='comentar' value='Comentar'"; 
                        salida += "onclick='comentado(" + jsonObject[i].id + ")'>";
                        salida += "<i id='comentar-icono' class='fa fa-comment'></i>";
                    salida += "</button>";
                salida += "</form>";
            salida += "</div>";
            salida += "<br>";
        }
        document.querySelector(".n-grid > .area-3 > div.publicacion").innerHTML = salida;
    }
}