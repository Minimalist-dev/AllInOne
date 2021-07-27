var jsonObject, id, marca, nombre, precio, enviar; 

const crear         = document.querySelector("#crear");
const leerDatos     = document.querySelector("#n-leer");
const leerResponde  = document.querySelector("#n-respuesta");

id      = document.querySelector("#id");
fecha   = document.querySelector("#fecha");
marca   = document.querySelector("#marca");
nombre  = document.querySelector("#nombre");
precio  = document.querySelector("#precio");
enviar  = document.querySelector("#crud");
/*
    * CRUD
 */
function 
leer(busqueda) {
    fetch("../../s/sistema_json/IntercambioFront.php", {
        method: "POST",
        body: busqueda
    }).then(function(response) {
        if(response.ok) { return response.json(); } 
        else { throw "Error con la respuesta."; }
    }).then(function(json) {
        jsonObject = json;

        let salida = "";

        for(let i in jsonObject) {
            salida +=  `
                <tr>
                    <td>${jsonObject[i].ID}</td>
                    <td>${jsonObject[i].FECHA}</td>
                    <td>${jsonObject[i].FECHA}</td>
                    <td>${jsonObject[i].MARCA}</td>
                    <td>${jsonObject[i].NOMBRE}</td>
                    <td>${jsonObject[i].PRECIO}</td>
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
                        name="actualizar${jsonObject[i].ID}" id="actualizar${jsonObject[i].ID}">
                            <input type="hidden" name="id" value="${jsonObject[i].ID}">
                            <button type="submit" name="crud" value="Editar" onclick="editar(${jsonObject[i].ID})">
                                Editar
                            </button>
                        </form>
                    </td> 
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" 
                        name="borrar${jsonObject[i].ID}" id="borrar${jsonObject[i].ID}">
                            <input type="hidden" name="id" value="${jsonObject[i].ID}">
                            <button type="submit" name="crud" value="Borrar" onclick="borrar(${jsonObject[i].ID})">
                                Borrar
                            </button>
                        </form>
                    </td>  
                </tr>
            `;
        }
        
        leerDatos.innerHTML = salida;
    });
}

crear.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let id          = document.forms["crear"]["id"].value;
    let fecha       = document.forms["crear"]["fecha"].value;
    let marca       = document.forms["crear"]["marca"].value;
    let nombre      = document.forms["crear"]["nombre"].value;
    let precio      = document.forms["crear"]["precio"].value;
    let crearEnvio  = document.forms["crear"]["crud"].value;

    let datos       = new FormData(crear);
    
    datos.append('id', id);
    datos.append('fecha', fecha);
    datos.append('marca', marca);
    datos.append('nombre', nombre);
    datos.append('precio', precio);
    datos.append('crud', crearEnvio);

    fetch('../../s/sistema_json/IntercambioFront.php', {
        method: 'POST',
        body: datos
    }).then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error con la respuesta."; }
    }).then(function(texto) {
        enviar.value = "Crear";
        crear.reset();
        leer();
        leerResponde.innerHTML = "Creado con exito.";
    }).catch(function(error) {
        console.log(error);
    });
});
function 
editar(idU) {
    const formCRUD = document.querySelector("#actualizar" + idU);

    formCRUD.addEventListener('submit', function (e) {
        e.preventDefault();

        let idEntrante  = document.forms["actualizar" + idU]["id"].value;
        let editar      = document.forms["actualizar" + idU]["crud"].value;

        datos           = new FormData(formCRUD);

        datos.append('id', idEntrante);
        datos.append('crud', editar);

        fetch('../../s/sistema_json/Editar.php', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) { return response.json(); } 
            else { throw "Error con la respuesta."; }
        }).then(function (json) {
            id.value        = json.ID;
            fecha.value     = json.FECHA;
            marca.value     = json.MARCA;
            nombre.value    = json.NOMBRE;
            precio.value    = json.PRECIO;
            enviar.value    = "Actualizar";

            leerResponde.innerHTML = "Listo para actualizar";
        }).catch(function (error) {
            console.log(error);
        });
    });
}
function
borrar(idD) {
    const formCRUD = document.querySelector("#borrar" + idD);

    formCRUD.addEventListener('submit', function (e) {
        e.preventDefault();

        let id      = document.forms["borrar" + idD]["id"].value;
        let escoger = document.forms["borrar" + idD]["crud"].value;

        datos = new FormData(formCRUD);

        datos.append('id', id);
        datos.append('crud', escoger);

        fetch('../../s/sistema_json/IntercambioFront.php', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) { return response.text(); } 
            else { throw "Error con la respuesta."; }
        }).then(function (texto) {
            leer();
            leerResponde.innerHTML = "Se ha borrado correctamente";
        }).catch(function (error) {
            console.log(error);
        });
    });
}
leer();