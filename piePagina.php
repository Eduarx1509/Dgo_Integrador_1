<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
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
    </body>
</html>
