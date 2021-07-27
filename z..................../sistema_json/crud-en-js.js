var matriz = [];

var id, marca, nombre, precio, enviar; 

const crear         = document.querySelector("#crear");
const leerDatos     = document.querySelector("#n-leer");
//const leerResponde  = document.querySelector("#n-respuesta");

id      = document.querySelector("#id");
fecha   = document.querySelector("#fecha");
marca   = document.querySelector("#marca");
nombre  = document.querySelector("#nombre");
precio  = document.querySelector("#precio");

function 
crearItem(ids, fechas, marcas, nombres, precios) {

     let item = {
        id      : ids,
        fecha   : fechas,
        marca   : marcas,
        nombre  : nombres, 
        precio  : precios
    };

    matriz.push(item);//console.log("----------" + item);
    return item;
};
crear.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let ids     = id.value;
    let fechas  = fecha.value;
    let marcas  = marca.value;
    let nombres = nombre.value;
    let precios = precio.value;

    crearItem(ids, fechas, marcas, nombres, precios);
    
    insertar();
    
    crear.reset();
}); 
function 
insertar() {

  localStorage.setItem('jsonEnJavaScript', JSON.stringify(matriz));

  leer();
};
function 
leer(datos) {
    let salida = "";
    
    matriz = JSON.parse(localStorage.getItem('jsonEnJavaScript'));
  
    if (matriz === null){
        matriz = [];
    } else {
        matriz.forEach(function(element) {
            console.log(element);
        
            salida +=  `
                <tr>
                    <td>${element.id}</td>
                    <td>${element.fecha}</td>
                    <td>${element.fecha}</td>
                    <td>${element.marca}</td>
                    <td>${element.nombre}</td>
                    <td>${element.precio}</td>
                    <td>
                        <button type='submit' onclick=actualizar(${element.id})>Editar</button>
                    </td> 
                    <td>
                        <button type='button' onclick=borrar(${element.id})>Borrar</button>
                    </td>  
                </tr>
            `;
        });
        leerDatos.innerHTML = salida;
    }
} 
function 
actualizar(actualizar) {
//    let indexArray;
//    
//    matriz.forEach(elemento => {
////        console.log("------------------" + index);
//        if(elemento.actualizar === actualizar){
//            
////            indexArray = index;
//            
//            console.log("xxxxxxxxxxx" + actualizar);
//        }
//    });   
//    
//    console.log(matriz.indexArray);
            
//            id.value        = json[0].id;
//            marca.value     = json[0].marca;
//            nombre.value    = json[0].nombre;
//            precio.value    = json[0].precio;
//            enviar.value    = "Actualizar"
}
function 
borrar(borrar) {
    let indexArray;
    
    matriz.forEach(function(elemento, index) {
        if(elemento.borrar === borrar){
            indexArray = index;
        }
    });

    matriz.splice(indexArray, 1);
    insertar();
}
leer();