var jsonObject;

fetch('../../../s/red_social/l/PublicacionDeUsuario.php').then(function (response) {
    return response.json();
}).then(function (json) {
//    console.log(json.vacio);
    
//    if(json[0]) {
//        document.querySelector(".n-grid > .area-3 > section.publicacion").innerHTML = "No tienes publicaciones.";
//    } else {
        jsonObject = json;
//    }
    Obtener.publicacion();
}).catch(function (err) {
    console.log('Fetch problem: ' + err.message);
});

class Obtener {
    static
    publicacion() {
        let salida = "";

        for (let i in jsonObject) {
            salida += `
            <article>
                <section class="articulo-head">
                    <section>
                        <img src="../../../i_img/red_social/i/${jsonObject[i].foto}" class="foto" alt="alt"/>
                        <span class="">${jsonObject[i].fecha}, Por</span>
                        <h2>${jsonObject[i].nombre}</h2>
                    </section>  
                    <section>
                        <button><i class='fas fa-ellipsis-v'></i></button>
                    </section>
                </section>
                <hr>
                <section class="articulo-body">
                    <p>${jsonObject[i].publicacion}</p>
                    <img src="../../../i_img/red_social/l/${jsonObject[i].imagen}" alt="" style="width: 100%;"/>
                </section>
                <hr>
                <section class="articulo-footer">
                    <section><button><i class='fas fa-star'></i></button></section><section><span class="">100</span></section>
                            <section><button><i class='fas fa-frog'></i></button></section><section><span class="">100</span></section>
                    <section><button><i class='fas fa-comments'></i></button></section><section><span class="">100</span></section>
                    <section><button><i class='fas fa-share'></i></button></section><section><span class="">100</span></section>
                </section>
            </article>
            `;
        }
        document.querySelector(".n-grid > .area-3 > section.publicacion").innerHTML = salida;
    }
}