var jsonObject, id, marca, nombre, precio, enviar; 
var buscar, cantidad, por, ordenar, inicioDePaginacion, entradaDePaginacion; 

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
ordenar             = document.querySelector("#n-ordenar");
//por     = document.querySelector("#n-por");
inicioDePaginacion  = document.querySelector("#paginacion");
entradaDePaginacion = document.querySelector("#inicio-de-paginacion");
/*
    *leer (creados, leer, actualizaciones, borrados) 
 */
function 
leer(busqueda) {
    fetch("show-json/sistema-JSON/sistema-JSON.json", {
        method: "POST",
        body: busqueda
    }).then(function(response) {
        if(response.ok) { return response.json(); } 
        else { throw "Error en la llamada"; }
    }).then(function(json) {
//       console.log(json[0]);
        jsonObject = json;
        
        lectura();
    });
}
function 
lectura() {
    let salida = "";

    for(let i in jsonObject) {
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
    }
      
    leerDatos.innerHTML= salida;
}
ordenar.onclick = function(e)  {
    let salida = "";
//    console.log(jsonObject[1].ID);
    
    jsonObject.reverse();
    
    for(let i in jsonObject) {
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
    }

    leerDatos.innerHTML= salida;
    
    ordenar.innerHTML === "Decendente" ? ordenar.innerHTML = "Acendente" : ordenar.innerHTML = "Decendente";
};
//por.onclick = function(e)  {
//    let salida = "";
//    
//    jsonObject.sort();
//    
//    for(let i in jsonObject) {
//        jsonObject[i].sort();
//        
//        salida += `
//            <tr>
//                <td>${jsonObject[i].ID}</td>
//                <td>${jsonObject[i].FECHA}</td>
//                <td>${jsonObject[i].FECHA}</td>
//                <td>${jsonObject[i].MARCA}</td>
//                <td>${jsonObject[i].NOMBRE}</td>
//                <td>${jsonObject[i].PRECIO}</td>
//                <td>
//                    <button type='submit' onclick=actualizar(${jsonObject[i].ID})>Editar</button>
//                </td> 
//                <td>
//                    <button type='button' onclick=borrar(${jsonObject[i].ID})>Borrar</button>
//                </td>  
//            </tr>
//        `;   
//    }
//
//    leerDatos.innerHTML= salida;
//    
//    por.innerHTML === "Por" ? por.innerHTML = "Por +" : por.innerHTML = "Por -";
//};
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

    fetch('sql/sistema-JSON/Crear.php', {
        method: 'POST',
        body: datos
    }).then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
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
    fetch("sql/sistema-JSON/Editar.php", {
        method: "POST",
        body: idU
    }).then(function (response) {
        if(response.ok) { return response.json(); } 
        else { throw "Error en la llamada"; }
    }).then(function (json) {
//        console.log(json);
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
    fetch("sql/sistema-JSON/Borrar.php", {
        method: "POST",
        body: borrarID
    }).then(function(response) {
        if(response.ok) { return response.text(); } 
        else { throw "Error en la llamada"; }
    }).then(function(texto) {
        leer();
        leerResponde.innerHTML = texto;
    });
}
leer();
/*
    *Busqueda 
 */
buscar.addEventListener("input", function(e) {
    e.preventDefault();
    
    let salida = "";
    var valor = document.querySelector("#buscar").value;
    
    for(let i in jsonObject) {
        console.log(jsonObject.length);
        
        if(jsonObject[i].ID == valor) {
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

//var pageNumber = 0; 
//var pageSize = 2; 
////var jsonObject =["Noticia 1","Noticia 2", "Noticia 3"];
//var salida = "";
//var pagination;
//var pageCont = Math.ceil(jsonObject.length / pageSize);
//
//function 
//paginate(array, page_size, page_number) {
//    return array.slice((page_number - 1) * page_size, page_number * page_size);
//}
//function 
//nextPage(){
//    pageNumber ++;
//    showNoticias(pagination)
//}
//function 
//previusPage(){
//    pageNumber --;
//    showNoticias(pagination)
//}
//function 
//showNoticias(pag) {
//    var pagination = paginate(jsonObject, pageSize, pageNumber);
//    salida = "";
////    console.log("nextPage",pagination)
//    pagination.forEach( function(element) {
//        salida += `
//            <tr>
//                <td>${element.ID}</td>
//                <td>${element.FECHA}</td>
//                <td>${element.FECHA}</td>
//                <td>${element.MARCA}</td>
//                <td>${element.NOMBRE}</td>
//                <td>${element.PRECIO}</td>
//                <td>
//                    <button type='submit' onclick=actualizar(${jsonObject.ID})>Editar</button>
//                </td> 
//                <td>
//                    <button type='button' onclick=borrar(${jsonObject.ID})>Borrar</button>
//                </td>  
//            </tr>
//        `;   
//      });
////        pageNumber > 0  ? anterior.style.display = "block" : anterior.style.display = "none";
////        pageNumber < pageCont ? siguiente.style.display = "block" : siguiente.style.display = "none";
////        
////    jsonObjectHtml+="</ul>"
////    jsonObjectHtml+= pageNumber >1  ? " <button onclick='previusPage()'>Anterior</button>":"";
////    jsonObjectHtml+= pageNumber < pageCont ?(" <button onclick='nextPage()'>Siguiente</button>"):"" ;
////    document.getElementById("jsonObject").innerHTML="";
////    document.getElementById("jsonObject").innerHTML=jsonObjectHtml;
//   
//    leerDatos.innerHTML = salida;
//}
//showNoticias();


var pageNumber2 = 0; 
//var pageSize2 = 2; 
//var jsonObject =["Noticia 1","Noticia 2", "Noticia 3"];
var salida2 = "";
//var pageCont2 = Math.ceil(jsonObject.length / pageSize2);

function 
paginate2(array, page_size, page_number) {
    return array.slice((page_number - 1) * page_size, page_number * page_size);
}
//function 
//showNoticias(pag) {
//function cantidad() {
cantidad.addEventListener('input', function() {
    let jsonCantidad = jsonObject.slice(0, cantidad.value);

    salida2 = "";
    
    for(let i in jsonCantidad) {
        console.log(jsonCantidad);
        salida2 += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${jsonCantidad[i].FECHA}</td>
                <td>${jsonCantidad[i].FECHA}</td>
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
   
    leerDatos.innerHTML = salida2;
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
function inicionDePaginacion() {
    let jsonCantidad = jsonObject.slice(entradaDePaginacion.value - 4, entradaDePaginacion.value);

    salida2 = "";
    
    for(let i in jsonCantidad) {
        console.log(jsonCantidad);
        salida2 += `
            <tr>
                <tr>
                <td>${jsonCantidad[i].ID}</td>
                <td>${jsonCantidad[i].FECHA}</td>
                <td>${jsonCantidad[i].FECHA}</td>
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
   
    leerDatos.innerHTML = salida2;
    
//    let valor           = document.forms["paginacion"]["inicio-de-paginacion"].value;
//    let reOrdenarDato   = new FormData(inicioDePaginacion);
//   
//    reOrdenarDato.append('inicio-de-paginacion', valor);
//    
//    if (reOrdenarDato === "") { leer(); } 
//    else { leer(reOrdenarDato); }
//    
//    entradaDePaginacion.value + 4 <= maximo ? anterior.style.visibility = 'hidden' : anterior.style.visibility = 'visible';
//    entradaDePaginacion.value >= maximo - 4 ? siguiente.style.visibility = 'hidden' : siguiente.style.visibility = 'visible';
}