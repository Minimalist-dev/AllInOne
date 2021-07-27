var nombre      = document.querySelector(".nombre");
var apellido    = document.querySelector(".apellido");
var nacimiento  = document.querySelector(".nacimiento");
var correo      = document.querySelector(".correo");
var codigo      = document.querySelector(".codigo");
var numero      = document.querySelector(".numero");
var sexo        = document.querySelector(".sexo");
var estado      = document.querySelector(".estado");
var pais        = document.querySelector(".pais");
var ciudad      = document.querySelector(".ciudad");
var fecha       = document.querySelector(".fecha");
var foto        = document.querySelector("img.foto");
var portada     = document.querySelector("img.portada");

class Perfil {
    static
    yo() { 
        fetch('../../../s/red_social/l/Sesion.php', {
            method: 'GET'
        }).then(function (response) {
            if(response.ok) { return response.json(); } 
            else { console.log("..........................................."); }
        }).then(function (json) {//console.log("Directo: " + json[0].correo);
            nombre.innerHTML        = json[0].nombre + " " + json[0].apellido;
            nacimiento.innerHTML    = json[0].nacimiento;
        //    apellido.innerHTML  = json[0].apellido;
            correo.innerHTML        = json[0].correo;
        //    codigo.innerHTML    = json[0].codigo;
            numero.innerHTML        = json[0].numero;
            sexo.innerHTML          = json[0].sexo;
            estado.innerHTML        = json[0].estado;
            pais.innerHTML          = json[0].pais;
            ciudad.innerHTML        = json[0].ciudad;
        //    fecha.innerHTML         = json[0].fecha;
            foto.src                = '../../../i_img/red_social/i/' + json[0].foto;
            portada.src             = '../../../i_img/red_social/i/' + json[0].portada;
        }).catch(function (err) {
            console.log('Fetch problem: ' + err.message);
        });
    }
}
Perfil.yo();