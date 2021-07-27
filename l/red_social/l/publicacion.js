var jsonObject;

class Publicacion {
    static
    yo() {
        fetch('../../s/red_social/l/Publicacion.php').then(function (response) {
            return response.json();
        }).then(function (json) {
            jsonObject = json;

            Obtener.publicacion();
        }).catch(function (err) {
            console.log('Fetch problem: ' + err.message);
        });
    }
}
Publicacion.yo();
class Obtener {
    static
    publicacion() {
        let salida = "";

        for (let i in jsonObject) {
            salida += `
            <article>
                <section class="articulo-head">
                    <section>
                        <img src="../../i_img//red_social/i/${jsonObject[i].foto}" class="foto" alt="alt"/>
                        <div>
                            <span class="">${jsonObject[i].fecha}, Por</span>
                            <h6 class='titulo'>${jsonObject[i].nombre}</h6>
                        </div>
                    </section>  
                    <section>
                        <button><i class='fas fa-ellipsis-v'></i></button>
                    </section>
                </section>
                <hr>
                <section class="articulo-body">
                    <p>${jsonObject[i].publicacion}</p>
                    <img src="../../i_img//red_social/l/${jsonObject[i].imagen}" alt="" style="width: 100%;"/>
                </section>
                <hr>
                <section class="articulo-footer">
                    <section>
                        <button><i class='fas fa-star'></i></button>
                    </section>
                    <section>
                        <span>${jsonObject[i].gustaSi}</span>
                    </section>
                    <section>
                        <button><i class='fas fa-frog'></i></button>
                    </section>
                    <section>
                        <span>${jsonObject[i].gustaNo}</span>
                    </section>
                    <section>
                        <button><i class='fas fa-comments'></i></button>
                    </section>
                    <section>
                        <span>${jsonObject[i].comentarios}</span>
                    </section>
                    <section>
                        <button><i class='fas fa-share'></i></button>
                    </section>
                    <section>
                        <span>${jsonObject[i].compartida}</span>
                    </section>
                </section>
            </article>
            `;
        }
        document.querySelector(".n-grid > .area-3 > div.publicacion").innerHTML = salida;
    }
}