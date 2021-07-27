var nav, main, article, footer, contacto;

nav             = document.querySelector("nav");
main            = document.querySelector("main");
article         = document.querySelector(".n-grid > n-grid-area-4 > div");
footer          = document.querySelector("footer");
contacto        = document.querySelector("a.n-contacto");

function
header(evt, ids) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("n-categoria-contenido");
    var l = tabcontent.length;
    for (i = 0; i < l; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("n-categoria");
    var l = tablinks.length;
    for (i = 0; i < l; i++) {
        tablinks[i].className = tablinks[i].className.replace(" n-categoria-activa", "");
    }

    document.getElementById(ids).style.display = "block";
    evt.currentTarget.className += " n-categoria-activa";
    
    nav.style.display = "none";
    main.style.display = "none";
    article.style.display = "none";
    footer.style.display = "none";
    contacto.style.visibility = "hidden";
//    document.querySelector("nav").style.display = "none";
//    document.querySelector("main").style.display = "none";
//    document.querySelector("article").style.display = "none";
//    document.querySelector("footer").style.display = "none";
//    document.querySelector("a.n-contacto").style.visibility = "hidden";
}

function 
header2(evt, ids) {
  var i, tabcontent, tablinks;
  
  tabcontent = document.getElementsByClassName("n-categoria-contenido");
  var l = tabcontent.length;
  for (i = 0; i < l; i++) {
    tabcontent[i].style.display = "none";
  }
  
  tablinks = document.getElementsByClassName("n-categoria");
  var l = tablinks.length;
  for (i = 0; i < l; i++) {
    tablinks[i].className = tablinks[i].className.replace(" n-categoria-activa", "");
  }
  
  document.getElementById(ids).style.display = "none";
  evt.currentTarget.className.replace(" n-categoria-activa", "");
  
  nav.style.display = "flex";
  main.style.display = "block";
  article.style.display = "flex";
  footer.style.display = "grid";
  contacto.style.visibility = "visible";
//  document.querySelector("nav").style.display = "flex";
//  document.querySelector("main").style.display = "block";
//  document.querySelector("article").style.display = "flex";
//  document.querySelector("footer.n-footer").style.display = "grid";
//  document.querySelector("a.n-contacto").style.visibility = "visible";
}

//const botones = document.querySelector(".n-categoria");
//const contenido = document.querySelector(".n-categoria-contenido");

//for (var a = 0; a < botones.length; a++) {
//    botones[a].addEventListener("click", function(evt) {
//        
//        var current = document.querySelector(".n-categoria-activa");
//        current[0].className = current[0].className.replace(" n-categoria-activa", "");
//        this.className += " n-categoria-activa";
//        
////botones[a].className = botones[a].className.replace(" n-categoria-activa", "");
//evt.currentTarget.className.replace(" n-categoria-activa", "");
//    });
//}