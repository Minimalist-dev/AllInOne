//var datos;
//const escogerForm = document.querySelectorAll(".escoger-form");
//const formUno = document.querySelector("#escoger-form");
//const escogerResponde = document.querySelector("#n-escoger-responde");
//
////console.log("Fuera del bucle y el evento " + scogerForm.length);
////const botones = document.querySelector(".n-categoria");
////const contenido = document.querySelector(".n-categoria-contenido");
//for (var a = 0; a < escogerForm.length; a++) {
//    console.log("Dentro de bucle: " + escogerForm[a].length);
//    
//    escogerForm[a].addEventListener('submit', function(e) {
//        e.preventDefault();
//        console.log("Dentro del evento submit: ");
//
//        let id              = document.forms["articulo"]["id"].value;
//        let marca           = document.forms["articulo"]["marca"].value;
////        let marca           = document.querySelectorAll("#marca");
//        let nombre          = document.forms["articulo"]["nombre"].value;
//        let color           = document.forms["articulo"]["color"].value;
//        let talla           = document.forms["articulo"]["talla"].value;
//        let descripcion     = document.forms["articulo"]["descripcion"].value;
//        let mas             = document.forms["articulo"]["mas"].value;
//        let cantidad        = document.forms["articulo"]["cantidad"].value;
//        let precio          = document.forms["articulo"]["precio"].value;
//        let escogerArticulo = document.forms["articulo"]["n-escoger"].value;
////         let escogerArticulo = document.querySelectorAll("#n-escoger");
//        
////        for (var c = 0; c < marca.length; c++) {
////            console.log("input marca: " + marca[0].value);
////        }
////        for (var d = 0; d < escogerArticulo.length; d++) {
////            console.log("input boton: " + escogerArticulo[0].value);
////        }
//        
////        datos           = new FormData(escogerForm[a]);
//        datos           = new FormData(formUno);
//        
//        datos.append('id', id);
//        datos.append('marca', marca[0].value);
//        datos.append('nombre', nombre);
//        datos.append('color', color);
//        datos.append('talla', talla);
//        datos.append('descripcion', descripcion);
//        datos.append('mas', mas);
//        datos.append('cantidad', cantidad);
//        datos.append('precio ', precio);
//        datos.append('escoger', escogerArticulo[0].value);
//        
////        for(var valores of datos.entries()) {
////           console.log(valores[0] + " : " + valores[1] + " : " + valores.concat()); 
////        }
//        console.log("Datos: " + datos.get('marca'));
// 
//        fetch('sql/tienda/Carrito.php', {
////        fetch('', {
//            method: 'POST',
////            method: 'GET',
//            headers: { 'Content-Type':'application/x-www-form-urlencoded' },
//            mode: 'same-origin',
//            body: 'marca=bar&nombre=1'
////              JSON.stringify({ marca: 'John', nombre: 'Doe' })
//     
//
//        })
//        .then(function(response) {
//            if(response.ok) { 
//                 console.log("Responde Ok...: " );
//                return response.text();
//             
//          } else { 
//              throw "Error en la llamada"; 
//          }
//        }).then(function(texto) {
//            escogerResponde.innerHTML = texto;
//            console.log( " : " + texto );
//        }).catch(function(error) {
//            console.log(error);
//        });
//    });
//}
//
//
////    fetch('sql/tienda/Carrito.php', {
////        method: 'POST',
////        body: datos
////    })
////    .then(function(response) {
////        if(response.ok) { 
////            return response.text();
////            enviar();
////      } else { 
////          throw "Error en la llamada"; 
////      }
////    }).then(function(texto) {
////        escogerResponde.innerHTML = texto;
//////        escoger.reset();
////    }).catch(function(error) {
////        console.log(error);
////    });