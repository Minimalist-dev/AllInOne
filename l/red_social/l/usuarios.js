var jsonObject;

fetch('../../s/red_social/l/Usuarios.php', {
    method: 'GET'
}).then(function (response) {
    if(response.ok) { return response.json(); } 
    else { console.log("..........................................."); }
}).then(function (json) {
    jsonObject = json;
    
    Obtener.usuarios();
}).catch(function (err) {
    console.log('Fetch problem: ' + err.message);
});

class Obtener {
    static
    usuarios() {
        let salida = "";

        for (let i in jsonObject) {
            salida += `
            <section class="contenedor">
                <img src="../../i_img/red_social/i/${jsonObject[i].foto}" alt="">
                <form action="../../s/red_social/s/Redireccionar.php" method="POST">
                    <button type="submit" name="usuario" value="${jsonObject[i].id}">${jsonObject[i].nombre + " " + jsonObject[i].apellido}</button>
                </form>
                <p>John Doe saved us from a web disaster.</p>
            </section>
            `;
        }
        document.querySelector(".n-grid > .area-2 > article").innerHTML = salida;
    }
}