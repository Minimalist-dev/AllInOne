var buscar, cantidad, ordenar, inicioDePaginacion, entradaDePaginacion, maximo; 

const anterior  = document.querySelector(".n-anterior");
const siguiente = document.querySelector(".n-siguiente");

buscar              = document.querySelector("#buscar");
cantidad            = document.querySelector("#cantidad");
ordenar             = document.querySelector("#n-ordenar");
inicioDePaginacion  = document.querySelector("#paginacion");
entradaDePaginacion = document.querySelector("#inicio-de-paginacion");

/*
    *Busqueda 
 */
buscar.addEventListener("input", function(e) {
    e.preventDefault();
    
    var valor = document.querySelector("#buscar").value;
    
    salida = "";
    
    
    for(let i in jsonObject) {
//        console.log(jsonObject.length);
        
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

cantidad.addEventListener('input', function() {
    let jsonCantidad = jsonObject.slice(0, cantidad.value);

    salida = "";
    
    for(let i in jsonCantidad) {//console.log(jsonCantidad);
        salida += `
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
   
    leerDatos.innerHTML = salida;
});
ordenar.onclick = function(e)  {
    salida = "";
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
fetch("show-json/sistema-JSON/sistema-JSON.json").then(function (response) {
    if (response.ok) { return response.json(); } 
    else { throw "Error en la llamada"; }
}).then(function (json) { maximo = json.length; });
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
    
    for(let i in jsonCantidad) {//console.log(jsonCantidad);
        salida += `
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
   
    leerDatos.innerHTML = salida;
  
    entradaDePaginacion.value <= 4 ? anterior.style.visibility = 'hidden' : anterior.style.visibility = 'visible';
    entradaDePaginacion.value >= maximo ? siguiente.style.visibility = 'hidden' : siguiente.style.visibility = 'visible';
}