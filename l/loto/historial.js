function 
buscarSorteo(buscar) {
    var xhttp;
    if (buscar.length === 0) { 
        document.querySelector("#mostrarHistorial").innerHTML = "";
//            return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.querySelector("#mostrarHistorial").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "php/historial.php?nSearch="+buscar, true);
    xhttp.send();   
}
