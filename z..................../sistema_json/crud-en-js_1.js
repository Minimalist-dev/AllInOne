var matriz = [];

var id, marca, nombre, precio, enviar; 

const crear         = document.querySelector("#crear");
//const gestionar     = document.querySelector("#n-gestionar");
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

    matriz.push(item);console.log("----------" + item);
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
//    for(var i =0; i < localStorage.length; i++){
//  console.log(localStorage.getItem(localStorage.key(i)));
//}
    let salida = "";
    
    matriz = JSON.parse(localStorage.getItem('jsonEnJavaScript'));
//  console.log("Leyendo: " + matriz[0].id);
    if (matriz === null){
        matriz = [];
    } else {
        matriz.forEach(function(element) {
            console.log(element);
        
            salida +=  `
                <tr id='n-gestionar'>
                    <td>${element.id}</td>
                    <td>${element.fecha}</td>
                    <td>${element.fecha}</td>
                    <td>${element.marca}</td>
                    <td>${element.nombre}</td>
                    <td>${element.precio}</td>
                    <td >
                        <button type='submit' onclick=actualizar(${element.id})>Editar</button>
                    </td> 
                    <td>
                        <button class='n-borrar' onclick=borrar(${element.id})>Borrar</button>
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
        console.log(borrar.target.innerHTML);
        if(elemento.id === borrar){
            indexArray = index;
        }
    });
    
//    console.log(matriz);
//    delete matriz[indexArray];
//    matriz.splice(indexArray, 1);
    insertar();
}
leerDatos.addEventListener('click', (e) => {

  e.preventDefault();

  if(e.target.innerHTML === 'Borrar'){
    let texto = e.target.parentNode.parentNode.querySelector('button').innerHTML;
//    let texto = e.path[2].childNodes[1].innerHTML;
    console.log(e.target.classList[1]);
//    if(e.target.innerHTML === 'Borrar'){
    if(e.target.classList[1]=== 'n-borrar') {
      // Accción de eliminar
//      borrar(texto);
    }
//    }
    if(e.target.innerHTML === 'done'){
      // Accción de editar
      EditarDB(texto);
    }
  }

});
leer();