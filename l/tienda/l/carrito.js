const escogerForm   = document.querySelector("#devolver-todo");
var alertaGeneral   = document.querySelector("#n-alerta-general");

escogerForm.addEventListener('submit', function (e) {
    e.preventDefault();

    let id              = document.forms["devolver-todo"]["id"].value;
    let escogerArticulo = document.forms["devolver-todo"]["escoger"].value;

    datos = new FormData(escogerForm);

    datos.append('id', id);
    datos.append('escoger', escogerArticulo);

    fetch('', {
        method: 'POST',
        body: datos
    }).then(function (response) {
        if (response.ok) {
            return response.text();
        } else {
            throw "Error en la llamada";
        }
    }).then(function (texto) {
        alertaGeneral.innerHTML = "Acaba de devolver todo lo elegido.";
        alertaGeneral.className = "n-mostrar";

        setTimeout(function() {
            alertaGeneral.className = alertaGeneral.className.replace("n-mostrar", "");
        }, 4000);
        setTimeout(function() { 
            location.reload();
        }, 4100); 
    }).catch(function (error) {
        console.log(error);
    });

});
  
function
eliminar(idUnico) {
    const escogerForm = document.querySelector("#devolver" + idUnico);

    escogerForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let id = document.forms["devolver" + idUnico]["id"].value;
        let escogerArticulo = document.forms["devolver" + idUnico]["escoger"].value;

        datos = new FormData(escogerForm);

        datos.append('id', id);
        datos.append('escoger', escogerArticulo);

        fetch('', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada";
            }
        }).then(function (texto) {
            alertaGeneral.innerHTML = "Acaba de devolver uno escogido.";
            alertaGeneral.className = "n-mostrar";

            setTimeout(function () {
                alertaGeneral.className = alertaGeneral.className.replace("n-mostrar", "");
            }, 4000);
            setTimeout(function () {
                location.reload();
            }, 4100);
        }).catch(function (error) {
            console.log(error);
        });
    });
}
function
actualizar(idUnico) {
    const escogerForm   = document.querySelector("#cambiar" + idUnico);

    escogerForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let id = document.forms["cambiar" + idUnico]["id"].value;
        let escogerArticulo = document.forms["cambiar" + idUnico]["escoger"].value;

        datos = new FormData(escogerForm);

        datos.append('id', id);
        datos.append('escoger', escogerArticulo);

        fetch('', {
            method: 'POST',
            body: datos
        }).then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada";
            }
        }).then(function (texto) {
            alertaGeneral.innerHTML = "Acaba de actualizar uno escogido.";
            alertaGeneral.className = "n-mostrar";

            setTimeout(function () {
                alertaGeneral.className = alertaGeneral.className.replace("n-mostrar", "");
            }, 4000);
            setTimeout(function () {
                location.href = 'detalles.php?id=' + id;
            }, 4100);
        }).catch(function (error) {
            console.log(error);
        });
    });
}
