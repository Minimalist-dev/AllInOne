var jsonContactados, jsonObject, de;
/*john Doe 
--------------------------------------------------------------------------------*/
fetch('../../../s/red_social/l/Sesion.php', {
    method: 'GET'
}).then(function (response) {
    if(response.ok) { return response.json(); } 
    else { console.log("..........................................."); }
}).then(function (json) {
    de = json[0].id;
}).catch(function (err) {
    console.log('Fetch problem: ' + err.message);
});
/*Chat 
--------------------------------------------------------------------------------*/
class Conseguir {
    static
    chat() {
        let salida = "";

        for (let i in jsonObject) {
            if (jsonObject[i].de === de) {
                salida += "<div class='yo'>";
                    salida += "<img src='../../../i_img/red_social/i/" + jsonObject[i].foto + "' alt=''>";
                    salida += "<div>";
                        salida += "<span>" + jsonObject[i].fecha + "</span>";
                        salida += "<h6 class='titulo'>" + jsonObject[i].nombre + "</h6>";
                    salida += "</div>";
                    salida += "<p>" + jsonObject[i].mensaje + "</p>";
                salida += "</div>";
            } else {
                salida += "<div class='usuario'>";
                    salida += "<img src='../../../i_img/red_social/i/" + jsonObject[i].foto + "' alt=''>";
                    salida += "<div>";
                        salida += "<span>" + jsonObject[i].fecha + "</span>";
                        salida += "<h6 class='titulo'>" + jsonObject[i].nombre + "</h6>";
                    salida += "</div>";
                    salida += "<p>" + jsonObject[i].mensaje + "</p>";
                salida += "</div>";
            } 
        }
        document.querySelector(".chat").innerHTML = salida;
    }
}
class Chats {
    static
    mensajes(id) {
        const contactado = document.querySelector("#contactado-" + id);

        contactado.addEventListener('submit', function (e) {
            e.preventDefault();

            let chat = document.forms["contactado-" + id]["chat-contactado"].value;

            let datos = new FormData(contactado);

            datos.append('chat-contactado', chat);

            fetch('../../../s/red_social/l/Chats.php', {
                method: 'POST',
                body: datos
            }).then(function (response) {
                if (response.ok) { return response.json(); } 
                else { throw "Error de URL"; }
            }).then(function (json) {console.log("Chats.mensajes > " + json);
                jsonObject = json;
                Conseguir.chat();
                document.querySelector(".n-grid > .area-3").style.display = "block";
                document.querySelector("input#chat-con").value = id;
            }).catch(function (error) {
                console.log(error);
            });
        });
    }
}
/*Chat con 
--------------------------------------------------------------------------------*/
class ChatCon {
    static
    reMensaje() {
        const chatPara = document.querySelector("#chat-para");

        chatPara.addEventListener('submit', function (e) {
            e.preventDefault();

            let chatCon     = document.forms["chat-para"]["chat-con"].value;
            let reMensaje   = document.forms["chat-para"]["re-mensaje"].value;

            let datos = new FormData(chatPara);
            
            datos.append('chat-con', chatCon);
            datos.append('re-mensaje', reMensaje);

            fetch('../../../s/red_social/l/ChatCon.php', {
                method: 'POST',
                body: datos
            }).then(function (response) {
                if (response.ok) { return response.json(); } 
                else { throw "Error de URL"; }
            }).then(function (json) { console.log("con > " + chatCon + " Mas: " + json);
                jsonObject = json;
                Conseguir.chat();
                document.querySelector("input#chat-con").value = chatCon;
                chatPara.reset();
                ReGetChatCon.usuario();
            }).catch(function (error) {
                console.log(error);
            });
        });
    }
}
/*Chats en contacto 
--------------------------------------------------------------------------------*/
class ReGetChatCon {
    static
     usuario() {
        fetch('../../../s/red_social/l/Contactados.php', {
            method: 'GET'
        }).then(function (response) {
            if (response.ok) { return response.json(); } 
            else { throw "Error de URL"; }
        }).then(function (json) {
            jsonContactados = json;

            GetContactados.publicar();
        }).catch(function (err) {
            console.log('Ha ocurrido un error: ' + err.message);
        });
    }
}
ReGetChatCon.usuario();

class GetContactados {
    static
    publicar() {
        let salida = "";

        for (let i in jsonContactados) {
            salida += "<div>";
                salida += "<img src='../../../i_img/red_social/i/" + jsonContactados[i].foto + "'>";
                salida += "<span>" + jsonContactados[i].fecha + "</span>";
                salida += "<div class=''>";
                    salida += "<form action='' method='POST' name='contactado-"+jsonContactados[i].ok+"' id='contactado-"+jsonContactados[i].ok+"'>";
                        salida += "<input type='hidden' id='chat-contactado' name='chat-contactado' value='" + jsonContactados[i].ok + "'>";
                        salida += "<button class='titulo' type='submit' onclick='Chats.mensajes("+jsonContactados[i].ok+")'>"+jsonContactados[i].nombre+"</button>";
                    salida += "</form>";
//                    salida += "<h6>Subject: " + jsonContactados[i].nombre + "</h6>";
//                    salida += "<p>Chat con: " + jsonContactados[i].ok + "</p>";
                salida += "</div>";
            salida += "</div>";
        }
        document.querySelector("#contactados").innerHTML = salida;
    }
}