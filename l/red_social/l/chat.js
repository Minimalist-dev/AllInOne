function 
openForm() {
    document.getElementById("myForm").style.display = "block";
}
function 
closeForm() {
    document.getElementById("myForm").style.display = "none";
}
class Chat {
    static
    mensaje() {
        const chat = document.querySelector("#chat");

        chat.addEventListener('submit', function (e) {
            e.preventDefault();
    //        let usuario = document.forms["chat"]["usuario"].value;
            let mensaje = document.forms["chat"]["mensaje"].value;

            let datos = new FormData(chat);
    //        datos.append('usuario', usuario);
            datos.append('mensaje', mensaje);

            fetch('../../../sql/red-social/Chat.php', {
                method: 'POST',
                body: datos
            }).then(function (response) {
                if (response.ok) {
                    return response.text();
                } else {
                    throw "Error en la llamada";
                }
            }).then(function (texto) {
                chat.reset();
                
                setTimeout(function(){
//                    document.querySelector("#chat-responde").innerHTML = texto;
                    document.forms["chat"]["mensaje"].value = texto;
                }, 500);
            }).catch(function (error) {
                console.log(error);
            });
        });
    }
}