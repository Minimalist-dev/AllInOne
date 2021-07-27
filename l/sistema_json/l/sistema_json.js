var jsonObject, id, marca, nombre, precio, enviar, salida = ""; 
var buscar, cantidad, por, ordenar, inicioDePaginacion, entradaDePaginacion, maximo; 

const crear         = document.querySelector("#crear");
const leerDatos     = document.querySelector("#n-leer");
const leerResponde  = document.querySelector("#n-respuesta");

const anterior  = document.querySelector(".n-anterior");
const siguiente = document.querySelector(".n-siguiente");

id      = document.querySelector("#id");
fecha   = document.querySelector("#fecha");
marca   = document.querySelector("#marca");
nombre  = document.querySelector("#nombre");
precio  = document.querySelector("#precio");
enviar  = document.querySelector("#crear-envio");

buscar              = document.querySelector("#buscar");
cantidad            = document.querySelector("#cantidad");
por                 = document.querySelector("#por");
ordenar             = document.querySelector("#n-ordenar");
inicioDePaginacion  = document.querySelector("#paginacion");
entradaDePaginacion = document.querySelector("#inicio-de-paginacion");
/*
    *leer (creados, leer, actualizaciones, borrados) 
 */
function 
leer(busqueda) {
    fetch("s_json/sistema_json/sistema_JSON.json", {
        method: "POST",
        body: busqueda
    }).then(function(response) {
        if(response.ok) { return response.json(); } 
        else { throw "Error en la llamada"; }
    }).then(function(json) {
        jsonObject = json;
        
        lectura();
    });
}
function 
lectura() {
    salida = "";
    
    let jsonCantidad = jsonObject.slice(0, 4);
    
    for(let i in jsonCantidad) {
        const date      = new Date(jsonCantidad[i].FECHA);
        const opciones  = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
        
        salida += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${new Intl.DateTimeFormat('es-DO').format(date)}</td>
                <td>${new Intl.DateTimeFormat('es-DO', opciones).format(date)}</td>
                <td>${jsonCantidad[i].MARCA}</td>
                <td>${jsonCantidad[i].NOMBRE}</td>
                <td>${jsonCantidad[i].PRECIO}</td>
                <td>
                    <button type='submit' onclick=actualizar(${jsonCantidad[i].ID})>Editar</button>
                </td> 
                <td>
                    <button type='button' onclick=borrar(${jsonCantidad[i].ID})>Borrar</button>
                </td>  
            </tr>
        `;   
    }
   
    leerDatos.innerHTML = salida;

}
crear.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let id          = document.forms["crear"]["id"].value;
    let fecha       = document.forms["crear"]["fecha"].value;
    let marca       = document.forms["crear"]["marca"].value;
    let nombre      = document.forms["crear"]["nombre"].value;
    let precio      = document.forms["crear"]["precio"].value;
    let crearEnvio  = document.forms["crear"]["crear"].value;

    let datos           = new FormData(crear);
    
    datos.append('id', id);
    datos.append('fecha', fecha),
    datos.append('marca', marca);
    datos.append('nombre', nombre);
    datos.append('precio', precio);
    datos.append('crear', crearEnvio);

    fetch('s/sistema_json/Crear.php', {
        method: 'POST',
        body: datos
    }).then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error con la respuesta."; }
    }).then(function(texto) {//console.log(texto);
        enviar.value = "Crear";
        crear.reset();
        leer();
        leerResponde.innerHTML = texto;
    }).catch(function(error) {
        console.log(error);
    });
});
function 
actualizar(idU) {
    fetch("s/sistema_json/Actualizar.php", {
        method: "POST",
        body: idU
    }).then(function (response) {
        if(response.ok) { return response.json(); } 
        else { throw "Error con la respuesta."; }
    }).then(function (json) {
        id.value        = json.ID;
        fecha.value     = json.FECHA;
        marca.value     = json.MARCA;
        nombre.value    = json.NOMBRE;
        precio.value    = json.PRECIO;
        enviar.value    = "Actualizar";
        
        leerResponde.innerHTML = "Listo para actualizar";
    }).catch(function (err) {
        console.log('Fetch problem: ' + err.message);
    });
}
function 
borrar(borrarID) {
    fetch("s/sistema_json/Borrar.php", {
        method: "POST",
        body: borrarID
    }).then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error con la respuesta."; }
    }).then(function(texto) {
        leer();
        leerResponde.innerHTML = texto;
    });
}
leer();
/*
    *Complementos  
    *Busqueda 
 */
buscar.addEventListener("input", function(e) {
    e.preventDefault();
    
    var valor = document.querySelector("#buscar").value;
    
    salida = "";
    
    for(let i in jsonObject) {
        if(jsonObject[i].ID === valor) {
            salida += `
                <tr>
                    <td>${jsonObject[i].ID}</td>
                    <td>${jsonObject[i].FECHA}</td>
                    <td>${jsonObject[i].FECHA}</td>
                    <td>${jsonObject[i].MARCA}</td>
                    <td>${jsonObject[i].NOMBRE}</td>
                    <td>${jsonObject[i].PRECIO}</td>
                    <td>
                        <button type='submit' onclick=actualizar(${jsonObject[i].ID})>Editar</button>
                    </td> 
                    <td>
                        <button type='button' onclick=borrar(${jsonObject[i].ID})>Borrar</button>
                    </td>  
                </tr>
            `;   
            leerDatos.innerHTML= salida;
        } else if (valor === "") {
            lectura();
        }
    }
});
/*
    *Cantidad 
 */
cantidad.addEventListener('input', function() {
    let jsonCantidad = jsonObject.slice(0, cantidad.value);

    salida = "";
    
    for(let i in jsonCantidad) {
        const date      = new Date(jsonCantidad[i].FECHA);
        const opciones  = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
        
        salida += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${new Intl.DateTimeFormat('es-DO').format(date)}</td>
                <td>${new Intl.DateTimeFormat('es-DO', opciones).format(date)}</td>
                <td>${jsonCantidad[i].MARCA}</td>
                <td>${jsonCantidad[i].NOMBRE}</td>
                <td>${jsonCantidad[i].PRECIO}</td>
                <td>
                    <button type='submit' onclick=actualizar(${jsonCantidad[i].ID})>Editar</button>
                </td> 
                <td>
                    <button type='button' onclick=borrar(${jsonCantidad[i].ID})>Borrar</button>
                </td>  
            </tr>
        `;   
    }
   
    leerDatos.innerHTML = salida;
});
/*
    *Por
 */
por.addEventListener('input', function() {
    salida = "";

    if(por.value === "id") {
        jsonObject.sort(function(a, b) { return a.ID - b.ID; });
    } else if(por.value === "fecha") {
        jsonObject.sort(function (a, b) {
            var x = a.FECHA.toLowerCase();
            var y = b.FECHA.toLowerCase();
            
            if (x < y) { return -1; }
            if (x > y) { return 1; }
            
            return 0;
        });
    } else if (por.value === "marca") {
        jsonObject.sort(function (a, b) {
            var x = a.MARCA.toLowerCase();
            var y = b.MARCA.toLowerCase();
            
            if (x < y) { return -1; }
            if (x > y) { return 1; }
            
            return 0;
        });
    } else if (por.value === "nombre") {
        jsonObject.sort(function (a, b) {
            var x = a.NOMBRE.toLowerCase();
            var y = b.NOMBRE.toLowerCase();
            
            if (x < y) { return -1; }
            if (x > y) { return 1; }
            
            return 0;
        });
    } else if(por.value === "precio") {
        jsonObject.sort(function(a, b) { return a.PRECIO - b.PRECIO; });
    }

    salida = "";
    
    let jsonCantidad = jsonObject.slice(0, 4);
    
    for(let i in jsonCantidad) {
        const date      = new Date(jsonCantidad[i].FECHA);
        const opciones  = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
        
        salida += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${new Intl.DateTimeFormat('es-DO').format(date)}</td>
                <td>${new Intl.DateTimeFormat('es-DO', opciones).format(date)}</td>
                <td>${jsonCantidad[i].MARCA}</td>
                <td>${jsonCantidad[i].NOMBRE}</td>
                <td>${jsonCantidad[i].PRECIO}</td>
                <td>
                    <button type='submit' onclick=actualizar(${jsonCantidad[i].ID})>Editar</button>
                </td> 
                <td>
                    <button type='button' onclick=borrar(${jsonCantidad[i].ID})>Borrar</button>
                </td>  
            </tr>
        `;   
    }
   
    leerDatos.innerHTML = salida;
});
/*
    *Ordenar
 */
ordenar.onclick = function(e)  {
    salida = "";
    jsonObject.reverse();
    
    let jsonCantidad = jsonObject.slice(0, 4);
    
    for(let i in jsonCantidad) {
        const date      = new Date(jsonCantidad[i].FECHA);
        const opciones  = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
        
        salida += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${new Intl.DateTimeFormat('es-DO').format(date)}</td>
                <td>${new Intl.DateTimeFormat('es-DO', opciones).format(date)}</td>
                <td>${jsonCantidad[i].MARCA}</td>
                <td>${jsonCantidad[i].NOMBRE}</td>
                <td>${jsonCantidad[i].PRECIO}</td>
                <td>
                    <button type='submit' onclick=actualizar(${jsonCantidad[i].ID})>Editar</button>
                </td> 
                <td>
                    <button type='button' onclick=borrar(${jsonCantidad[i].ID})>Borrar</button>
                </td>  
            </tr>
        `;   
    }
   
    leerDatos.innerHTML = salida;
    
    ordenar.innerHTML === "Decendente" ? ordenar.innerHTML = "Acendente" : ordenar.innerHTML = "Decendente";
};
/*
    *Paginación
 */
fetch("s_json/sistema_json/sistema_JSON.json").then(function (response) {
    if (response.ok) { return response.json(); } 
    else { throw "Error en la llamada"; }
}).then(function (json) { 
    maximo = json.length; 
});

anterior.onclick = function () {
    entradaDePaginacion.stepDown(4);
    inicionDePaginacion();
};
siguiente.onclick = function () {
    entradaDePaginacion.stepUp(4);
    inicionDePaginacion();
};
inicioDePaginacion.oninput = function () {
    inicionDePaginacion();
};
function 
inicionDePaginacion() {
    let jsonCantidad = jsonObject.slice(entradaDePaginacion.value - 4, entradaDePaginacion.value);

    salida = "";
    
    for(let i in jsonCantidad) {
        const date      = new Date(jsonCantidad[i].FECHA);
        const opciones  = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
        
        salida += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${new Intl.DateTimeFormat('es-DO').format(date)}</td>
                <td>${new Intl.DateTimeFormat('es-DO', opciones).format(date)}</td>
                <td>${jsonCantidad[i].MARCA}</td>
                <td>${jsonCantidad[i].NOMBRE}</td>
                <td>${jsonCantidad[i].PRECIO}</td>
                <td>
                    <button type='submit' onclick=actualizar(${jsonCantidad[i].ID})>Editar</button>
                </td> 
                <td>
                    <button type='button' onclick=borrar(${jsonCantidad[i].ID})>Borrar</button>
                </td>  
            </tr>
        `;   
    }
   
    leerDatos.innerHTML = salida;
  
    entradaDePaginacion.value <= 4 ? anterior.style.visibility = 'hidden' : anterior.style.visibility = 'visible';
    entradaDePaginacion.value >= maximo ? siguiente.style.visibility = 'hidden' : siguiente.style.visibility = 'visible';
}