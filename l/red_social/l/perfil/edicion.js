const editarNombre      = document.querySelector("#nombre");
const editarApellido    = document.querySelector("#apellido");
const editarCorreo      = document.querySelector("#correo");
const editarNumero      = document.querySelector("#numero");
const editarSexo        = document.querySelector("#sexo > .sexo");
const editarNacimiento  = document.querySelector("#nacimiento");
const editarPais        = document.querySelector("#pais > .pais");
const editarFecha       = document.querySelector("#fecha");


const formFotos     = document.querySelector("#fotos");
var   resFotos      = document.querySelector(".res-fotos");
const formDatos     = document.querySelector("#datos");
var   resDatos      = document.querySelector(".res-datos");
const formIntereses = document.querySelector("#interes");
var   resIntereses  = document.querySelector(".res-intereses");
const formCodigo    = document.querySelector("#codigo");
var   resCodigo     = document.querySelector(".res-codigo");
const formEliminar  = document.querySelector("#eliminar");
var   resEliminar   = document.querySelector(".res-eliminar");

var jsonObject;
/* Consulta
--------------------------------------------------------------------------------*/
function 
leer() {
    fetch("../../../s/red_social/l/Sesion.php", {
        method: "GET"
    }).then(function(response) {
        if(response.ok) { 
            return response.json(); 
        } else { 
            throw "Error con la respuesta."; 
        }
    }).then(function(json) {
        jsonObject = json;
        
        Datos.deEdicion();
    });
}

class Datos {
    static
    deEdicion() {
        editarNombre.value      = jsonObject[0].nombre;
        editarApellido.value    = jsonObject[0].apellido;
        editarCorreo.value      = jsonObject[0].correo;
        editarNumero.value      = jsonObject[0].numero;
        editarSexo.value        = jsonObject[0].sexo;
        editarSexo.innerHTML    = jsonObject[0].sexo;
        editarNacimiento.value  = jsonObject[0].nacimiento;
        editarPais.value        = jsonObject[0].pais;
        editarPais.innerHTML    = jsonObject[0].pais;
    }
}
/* paises 
--------------------------------------------------------------------------------*/
var paises = [
    "Afghanistan",
    "Albania",
    "Algeria",
    "Andorra",
    "Angola",
    "Anguilla",
    "Antigua & Barbuda",
    "Argentina",
    "Armenia",
    "Aruba",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bermuda",
    "Bhutan",
    "Bolivia",
    "Bosnia & Herzegovina",
    "Botswana",
    "Brazil",
    "British Virgin Islands",
    "Brunei",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Cape Verde",
    "Cayman Islands",
    "Central Arfrican Republic",
    "Chad",
    "Chile",
    "China",
    "Colombia",
    "Congo",
    "Cook Islands",
    "Costa Rica",
    "Cote D Ivoire",
    "Croatia",
    "Cuba",
    "Curacao",
    "Cyprus",
    "Czech Republic",
    "Denmark",
    "Djibouti",
    "Dominica",
    "Dominican Republic",
    "Ecuador",
    "Egypt",
    "El Salvador",
    "Equatorial Guinea",
    "Eritrea","Estonia",
    "Ethiopia",
    "Falkland Islands",
    "Faroe Islands",
    "Fiji",
    "Finland",
    "France",
    "French Polynesia",
    "French West Indies",
    "Gabon",
    "Gambia",
    "Georgia",
    "Germany",
    "Ghana",
    "Gibraltar",
    "Greece",
    "Greenland",
    "Grenada",
    "Guam",
    "Guatemala",
    "Guernsey",
    "Guinea",
    "Guinea Bissau",
    "Guyana",
    "Haiti",
    "Honduras",
    "Hong Kong",
    "Hungary",
    "Iceland",
    "India",
    "Indonesia",
    "Iran",
    "Iraq",
    "Ireland",
    "Isle of Man",
    "Israel",
    "Italy",
    "Jamaica",
    "Japan",
    "Jersey",
    "Jordan",
    "Kazakhstan",
    "Kenya",
    "Kiribati",
    "Kosovo",
    "Kuwait",
    "Kyrgyzstan",
    "Laos",
    "Latvia",
    "Lebanon",
    "Lesotho",
    "Liberia",
    "Libya",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Macau",
    "Macedonia",
    "Madagascar",
    "Malawi",
    "Malaysia",
    "Maldives",
    "Mali",
    "Malta",
    "Marshall Islands",
    "Mauritania",
    "Mauritius",
    "Mexico",
    "Micronesia",
    "Moldova",
    "Monaco",
    "Mongolia",
    "Montenegro",
    "Montserrat",
    "Morocco",
    "Mozambique",
    "Myanmar",
    "Namibia",
    "Nauro",
    "Nepal",
    "Netherlands",
    "Netherlands Antilles",
    "New Caledonia",
    "New Zealand",
    "Nicaragua",
    "Niger",
    "Nigeria",
    "North Korea",
    "Norway",
    "Oman",
    "Pakistan",
    "Palau",
    "Palestine",
    "Panama",
    "Papua New Guinea",
    "Paraguay",
    "Peru",
    "Philippines",
    "Poland",
    "Portugal",
    "Puerto Rico",
    "Qatar",
    "Reunion",
    "Romania",
    "Russia",
    "Rwanda",
    "Saint Pierre & Miquelon",
    "Samoa",
    "San Marino",
    "Sao Tome and Principe",
    "Saudi Arabia",
    "Senegal",
    "Serbia",
    "Seychelles",
    "Sierra Leone",
    "Singapore",
    "Slovakia",
    "Slovenia",
    "Solomon Islands",
    "Somalia",
    "South Africa",
    "South Korea",
    "South Sudan",
    "Spain",
    "Sri Lanka",
    "St Kitts & Nevis",
    "St Lucia",
    "St Vincent",
    "Sudan",
    "Suriname",
    "Swaziland",
    "Sweden",
    "Switzerland",
    "Syria",
    "Taiwan",
    "Tajikistan",
    "Tanzania",
    "Thailand",
    "Timor L'Este",
    "Togo",
    "Tonga",
    "Trinidad & Tobago",
    "Tunisia",
    "Turkey",
    "Turkmenistan",
    "Turks & Caicos",
    "Tuvalu",
    "Uganda",
    "Ukraine",
    "United Arab Emirates",
    "United Kingdom",
    "United States of America",
    "Uruguay",
    "Uzbekistan",
    "Vanuatu",
    "Vatican City",
    "Venezuela",
    "Vietnam",
    "Virgin Islands (US)",
    "Yemen",
    "Zambia",
    "Zimbabwe"
];

class Paises {
    static
    delPlaneta() {
        let pais = document.querySelector("#pais");
        
        var l = paises.length;
        for (var i = 0; i < l; i++) {
            pais.options[pais.options.length] = new Option(paises[i], paises[i]);
        }
    }
}
document.querySelector("#pais").addEventListener('click', Paises.delPlaneta());
/* Edición
--------------------------------------------------------------------------------*/
class Editar {
    static
    fotos() {
        let foto        = document.forms["fotos"]["foto"].files[0];
        let portada     = document.forms["fotos"]["portada"].files[0];
        let editarFotos = document.forms["fotos"]["editar-fotos"].value;

        let datos           = new FormData(formFotos);

        datos.append('foto', foto);
        datos.append('portada', portada);
        datos.append('editar-fotos', editarFotos);

        fetch('../../../s/red_social/l/EditarFotos.php', {
            method: 'POST',
            headers: {
                'Content-Disposition' : 'form-data'
            },
            body: datos
        }).then(function(response) {
            if(response.ok) { 
                return response.text(); 
            } else { 
                throw "Error de URL"; 
            }
        }).then(function(texto) {
            resFotos.innerHTML = texto;
            Perfil.yo();
        }).catch(function(error) {
            console.log(error);
        });
    }
    static
    intereses() {
        let intereses       = document.forms["interes"]["intereses"].value;
        let editarInteres   = document.forms["interes"]["editar-interes"].value;

        let datos           = new FormData(formIntereses);

        datos.append('intereses', intereses);
        datos.append('editar-interes', editarInteres);

        fetch('../../../s/red_social/l/EditarIntereses.php', {
            method: 'POST',
            body: datos
        }).then(function(response) {
            if(response.ok) { 
                return response.text(); 
            } else { 
                throw "Error de URL"; 
            }
        }).then(function(texto) {
            resIntereses.innerHTML = texto;
            Perfil.yo();
        }).catch(function(error) {
            console.log(error);
        });
    }
    static
    datos() {
        let nombre      = document.forms["datos"]["nombre"].value;
        let apellido    = document.forms["datos"]["apellido"].value;
        let correo      = document.forms["datos"]["correo"].value;
        let numero      = document.forms["datos"]["numero"].value;
        let sexo        = document.forms["datos"]["sexo"].value;
        let nacimiento  = document.forms["datos"]["nacimiento"].value;
        let pais        = document.forms["datos"]["pais"].value;
        let editarDatos = document.forms["datos"]["editar-datos"].value;

        let datos           = new FormData(formDatos);

        datos.append('nombre', nombre);
        datos.append('apellido', apellido);
        datos.append('correo', correo);
        datos.append('numero', numero);
        datos.append('sexo', sexo);
        datos.append('nacimiento', nacimiento);
        datos.append('pais', pais);
        datos.append('editar-datos', editarDatos);

        fetch('../../../s/red_social/l/EditarDatos.php', {
            method: 'POST',
            body: datos
        }).then(function(response) {
            if(response.ok) { 
                return response.text(); 
            } else { 
                throw "Error de URL"; 
            }
        }).then(function(texto) {
            resDatos.innerHTML = texto;
            leer();
            Perfil.yo();
        }).catch(function(error) {
            console.log(error);
        });
    }
    static
    codigo() {
        let nueva           = document.forms["codigo"]["nueva"].value;
        let repetir         = document.forms["codigo"]["repetir"].value;
        let editarCodigo    = document.forms["codigo"]["editar-codigo"].value;

        let datos           = new FormData(formCodigo);

        datos.append('nueva', nueva);
        datos.append('repetir', repetir);
        datos.append('editar-codigo', editarCodigo);

        fetch('../../../s/red_social/l/EditarCodigo.php', {
            method: 'POST',
            body: datos
        }).then(function(response) {
            if(response.ok) { 
                return response.text(); 
            } else { 
                throw "Error de URL"; 
            }
        }).then(function(texto) {
            formCodigo.reset();
            resCodigo.innerHTML = texto;
        }).catch(function(error) {
            console.log(error);
        });
    }
    static
    eliminar() {
        let correo          = document.forms["eliminar"]["correo"].value;
        let codigo          = document.forms["eliminar"]["codigo"].value;
        let editarEliminar  = document.forms["eliminar"]["editar-eliminar"].value;

        let datos           = new FormData(formEliminar);

        datos.append('correo', correo);
        datos.append('codigo', codigo);
        datos.append('editar-eliminar', editarEliminar);

        fetch('../../../s/red_social/l/EditarEliminar.php', {
            method: 'POST',
            body: datos
        }).then(function(response) {
            if(response.ok) { 
                return response.text(); 
            } else { 
                throw "Error de URL"; 
            }
        }).then(function(texto) {
            formEliminar.reset();
            resEliminar.innerHTML = texto;

            if (resEliminar.innerHTML.length === 7) {
                setTimeout(function(){ 
                    window.location = "http://localhost/AllInOne/s/CerrarSesion.php";
                }, 2000);
            }
        }).catch(function(error) {
            console.log(error);
        });
    }
}
formFotos.addEventListener('submit', function(e) {
    e.preventDefault();
    Editar.fotos(); 
});
formIntereses.addEventListener('submit', function(e) {
    e.preventDefault();
    Editar.intereses(); 
});
formDatos.addEventListener('submit', function(e) {
    e.preventDefault();
    Editar.datos(); 
});
formCodigo.addEventListener('submit', function(e) {
    e.preventDefault();
    Editar.codigo(); 
});
formEliminar.addEventListener('submit', function(e) {
    e.preventDefault();
    Editar.eliminar(); 
});

leer();
/* intereses 
--------------------------------------------------------------------------------*/
var intereses = [
    "Acampar",
    "Actuación",
    "Ajedrez",
    "Arte",
    "Artes marciales",
    "Astronomía",
    "Baile", 
    "Blogging",
    "Break dance",
    "Canto",
    "Cicilismo",
    "Cine",
    "Cocina",
    "Coleccionismo",
    "Comedia",
    "Correr",
    "Decoración",
    "Deportes",
    "Deportes extremos",
    "Desarrollo de apps moviles",
    "Desarrollo de software",
    "Desarrollo web",
    "Dibujar",
    "Diseño gráfico",
    "Diseño web",
    "Escalar",
    "Escritura",
    "Fiesta",
    "Fitness",
    "Fotografía",
    "Fútbol",
    "Historia",
    "Idiomas",
    "Ilustración",
    "Jardinería",
    "Juegos",
    "Juegos de mesa",
    "Lectura", 
    "Maquillaje",
    "Meditar",
    "Música", 
    "Natación",
    "Naturaleza",
    "Ópera",
    "Pintura", 
    "Programación",
    "Programación de apps moviles",
    "Programación de software",
    "Programación web",
    "Realizar manualidades",
    "Senderismo",
    "Skateboarding",
    "Tecnología",
    "Tenis,",
    "Viajar", 
    "vida nocturna",
    "Videojuegos",
    "Voluntariado",
    "Yoga"
];

class Intereses {
    static
    delUsuario() {
        let interes = document.querySelector("#intereses");
        
        var l = intereses.length;
        for (var i = 0; i < l; i++) {
            interes.options[interes.options.length] = new Option(intereses[i], intereses[i]);
        }
    }
}
document.querySelector("#intereses").addEventListener('click', Intereses.delUsuario());
