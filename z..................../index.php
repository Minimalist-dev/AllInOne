<html>
<head>
    <title>Neury</title>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv="last-modified" content="Thu, 18 Nov 2020 19:11:42 GMT">
    <link rel="stylesheet" href="i_css/index.css">
    <!--JavaScript-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        @import url("http://localhost/AllInOne/front-css/root.css");
        *, *:before, *:after { 
            box-sizing: border-box;     
        }
        body { margin: 0; }
        h1 > a  {
            position: fixed;
            top: 0;
            z-index: 1;
            color: var(--n-color-dos);
            background-color: var(--n-color-dos);
            font-family: var(--n-fuente-tres);
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            width: auto;
            padding: 0.20em 1em 0.20em 1em;
            border-radius: 0.40em;
            text-shadow: var(--n-sombra-de-texto);
            letter-spacing: -0.145em;
        }
        h1 > a:hover { color: var(--n-color-tres); }
        h2 {
            color: var(--n-color-dos);
            font-family: var(--n-fuente);
            text-align: center;
            margin-top: 3em;
        }
        h3 {
            color: var(--n-color-dos-uno);
            font-family: var(--n-fuente-dos);
            text-align: center;
        }
        /*
            Desarrollador
        */
        section.n-desarrollador {
            text-align: center;
            padding: 0em 0em 3em 0em;
        }
        section.n-desarrollador > p {
            color: var(--n-color-dos);
            font-family: var(--n-fuente-dos);
            font-size: 0.90em;
            font-weight: bold;
        }
        section.n-desarrollador > p > strong {
            color: var(--n-color);
            font-family: var(--n-fuente-tres);
            text-shadow: var(--n-sombra-de-texto-dos);
        }
        section.n-desarrollador > hr {
            text-align: center;
            width: 70%;
            margin-top: -1.10em;
            margin-bottom: -0.02em;
        }
        section.n-desarrollador > a {
            color: var(--n-color-dos);
            font-size: 1em;
        }
        /*
            Desarrollos
        */
        section.n-desarrollos {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
            position: absolute;
            width: 100%;
            padding: 0em 0em 4em 0em;
        }
        section.n-desarrollos > article { width: 18em; }
        section.n-desarrollos > article > h4 > a {
            color: var(--n-color-dos);
            font-family: var(--n-fuente);
            font-size: 0.75em;
            text-decoration: none;
        }
        section.n-desarrollos > article > h4 > a:hover {
            color: white;
            font-family: var(--n-fuente-tres);
            text-shadow: var(--n-sombra-de-texto-dos);
        }
        section.n-desarrollos > article > p {
            color: var(--n-color-dos);
            font-family: var(--n-fuente-dos);
            font-size: 0.75em;
            margin: -1.20em 0em 0em 0em;
        }
    </style>
</head>
<body>
    <main>
        <P>¡Hola!</p>
        <h1>Neury</h1>
        <h2>Full Stack Developer</h2> 
        <P>neury.eleasar@gmail.com</p>
    </main>
    <h1><a href="#">AllInOne</a></h1>
    <h2>Portafolio</h2>
    <article>
        <section class="n-desarrollador">
            <p>Desarrollado por <strong>Neury Eleasar Aguasvivas Lorenzo</strong> con:</p>
            <hr>
            <a href="https://www.w3.org/TR/html5/" title="HTML5" target="_blank"><i class="fab">&#xf13b;</i></a>
            <a href="https://www.w3.org/TR/css-2017/" title="CSS3" target="_blank"><i class='fab'>&#xf38b;</i></a>
            <a href="https://developer.mozilla.org/es/" title="JavaScipt" target="_blank"><i class='fab'>&#xf3b9;</i></a>
            <a href="http://php.net/" title="PHP" target="_blank"><i class='fab'>&#xf457;</i></a>
            <a href="https://www.mysql.com/" title="MySQL" target="_blank"><i class='fas'>&#xf1c0;</i></a>
            <a href="https://netbeans.org/" title="NetBeans" target="_blank"><i class='fas'>&#xf1b2;</i></a>
            <a href="https://www.apachefriends.org/es/index.html" title="XAMPP" target="_blank"><i class='fas'>&#xf233;</i></a>
            
            <h3>neury.eleasar@gmail.com</h3>
        </section>
        <section class="n-desarrollos">
            <article>
                <h4><a href="http://localhost/AllInOne/loto.php">Loto</a></h4>
                <p>04/07/2020 - 13/09/2020: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="http://localhost/AllInOne/tienda.php">Tienda</a></h4>
                <p>14/09/2020 - 29/11/2020: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="http://localhost/AllInOne/plantillas_de_codigo.php">Plantillas de código</a></h4>
                <p>01/12/2020 - 01/12/2020: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="sistema_PHP.php">Sistema PHP</a></h4>
                <p>01/12/2020 - 06/12/2020: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="sistema_JSON.php">Sistema JSON</a></h4>
                <p>09/12/2020 - 16/12/2020: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="red_social.php">Red Social</a></h4>
                <p>19/12/2020 - 22/04/2021: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
        </section>
    </article>
</body>
</html>