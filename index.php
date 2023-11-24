<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<!--         <header>
        <div class="logo-container">
            <img src="img/logopill.svg" alt="">
        </div>
        <div class="buscar">
            <input type="text" placeholder="Buscar...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
        </div>
        <nav>
            <ul>
                <li><a href="#" class="subrayado">Inicio</a></li>
                <li><a href="#" class="subrayado">Restaurantes</a></li>
                <li><a href="#" class="subrayado">Promociones</a></li>
                <li><a href="#" class="subrayado" style="margin-right: 0;">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>-->
<!--    <div class="contenedor">
        <div class="slider-contenedor">
            <section class="contenido-slider">
                <img src="img/banner1.png" alt="">
            </section>
            <section class="contenido-slider">
                <img src="img/banner2.png" alt="">
            </section>
            <section class="contenido-slider">
                <img src="img/banner3.png" alt="">
            </section>
            <section class="contenido-slider">
                <img src="img/banner1.png" alt="">
            </section>
        </div>
    </div>-->
       <div class="contenido">
        <div class="menu">
            <p class="titulo-menu">Menú</p>
            <p class="subtitulo-menu">Categorías</p>
            <hr>
            <ul>
                <li><a href="#" class="subrayado">Todos</a></li>
                <li><a href="#" class="subrayado">Menú Diario</a></li>
                <li><a href="PlatoCarta.php" target="franky" class="subrayado">Platos a la Carta</a></li>
                <li><a href="#" class="subrayado">Bebidas</a></li>
                <li><a href="#" class="subrayado">Plato ejecutivo</a></li>
                
            </ul>
        </div>
        <div class="contenido-restaurante">
            <frame id="franky"></frame>
        </div>
           
        <div class="publicidad">
            <video width="100%" autoplay loop muted controls="false">
                <source src="img/publicidadutp1.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="slider">
        <div class="slide-track">
            <div class="slide">
                <img src="img/marcas.png" alt="">
            </div>
            <div class="slide">
                <img src="img/marcas.png" alt="">
            </div>
            <div class="slide">
                <img src="img/marcas.png" alt="">
            </div>
            <div class="slide">
                <img src="img/marcas.png" alt="">
            </div>
            <div class="slide">
                <img src="img/marcas.png" alt="">
            </div>
            <div class="slide">
                <img src="img/marcas.png" alt="">
            </div>
        </div>
    </div>
        <footer>
        <div class="espacio-footer">
            <div class="footer-contenido">
                <h2 class="footer-titulo">Contáctanos</h2>
                <a class="footer-subtitulo" href="">Chatea con nosotros</a><br>
                <a href="" class="footer-texto">Te atendemos las 24 horas</a><br>
                <a href="">Escríbenos</a><br>
                <a href="">Estamos para ayudarte</a><br>
                <a href="">Escríbenos</a><br>
                <a href="">Chatea con nosotros</a><br>
                <a href="">Te atendemos las 24 horas</a><br>
            </div>
            <div class="footer-contenido">
                <h2 class="footer-titulo">Secciones destacadas</h2>
                <a class="footer-subtitulo" href="">¿Cómo comprar en D'Go!?</a><br>
                <a href="" class="footer-texto">Despacho a domicilio</a><br>
                <a href="">Mis pedidos</a><br>
                <a href="">Super garantía</a><br>
            </div>
            <div class="footer-contenido">
                <h2 class="footer-titulo">Servicio al cliente</h2>
                <a class="footer-subtitulo" href="">Términos y Condiciones Generales</a><br>
                <a href="" class="footer-texto">Términos y Condiciones de Promociones</a><br>
                <a href="">Escríbenos</a><br>
                <a href="">Chatea con nosotros</a><br>
                <a href="">Te atendemos las 24 horas</a><br>
            </div>
            <div class="footer-contenido">
                <h2 class="footer-titulo">Sobre D'Go!</h2>
                <a class="footer-subtitulo" href="">Chatea con nosotros</a><br>
                <a href="" class="footer-texto">Te atendemos las 24 horas</a><br>
                <a href="">Escríbenos</a><br>
                <a href="">Chatea con nosotros</a><br>
                <a href="">Te atendemos las 24 horas</a><br>
            </div>
            <div class="footer-contenido">
                <h2 class="footer-titulo">¡Recibe nuestras ofertas y novedades!</h2>
                <a class="footer-subtitulo" href="">Chatea con nosotros</a><br>
                <a href="" class="footer-texto">Te atendemos las 24 horas</a><br>
                <a href="">Escríbenos</a><br>
                <a href="">Chatea con nosotros</a><br>
                <a href="">Te atendemos las 24 horas</a><br>
            </div>
        </div>

    </footer>
        <script>
        let slider = document.querySelector(".slider-contenedor")
        let sliderIndividual = document.querySelectorAll(".contenido-slider")
        let contador = 1;
        let width = sliderIndividual[0].clientWidth;
        let intervalo = 5000;
        window.addEventListener("resize", function () {
            width = sliderIndividual[0].clientWidth;
        })
        setInterval(function () {
            slides();
        }, intervalo);
        function slides() {
            slider.style.transform = "translate(" + (-width * contador) + "px)";
            slider.style.transition = "transform .5s";
            contador++;

            if (contador == sliderIndividual.length) {
                setTimeout(function () {
                    slider.style.transform = "translate(0px)";
                    slider.style.transition = "transform 0s";
                    contador = 1;
                }, 1500)
            }
        }
    </script>
<script>
    const menuItems = document.querySelectorAll(".subrayado");
    const restaurantes = document.querySelectorAll(".restaurante");
    menuItems.forEach((menuItem) => {
        menuItem.addEventListener("click", (event) => {
            event.preventDefault();
            const selectedClass = menuItem.textContent.toLowerCase();
            restaurantes.forEach((restaurante) => {
                restaurante.style.display = "none";
            });
            const selectedRestaurantes = document.querySelectorAll("." + selectedClass);
            selectedRestaurantes.forEach((restaurante) => {
                restaurante.style.display = "block";
            });
        });
    });
</script>
    </body>
</html>
