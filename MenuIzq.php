<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/menuprin.css" rel="stylesheet" type="text/css" />
    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="css/cssFranky.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<?php
include_once './Negocio.php';
$obj = new Negocio();
$vec = $obj->listaCategoria();
session_start();


?>

<body>
    <div class="contenido-lateral">
        <div class="navegacion-lateral">
            <h2 style="font-weight: 600; text-align: center;" class="subrayado">&nbsp;Bienvenidos<br>&nbsp; <?= $_SESSION['nombre'] ?></h2>
            <center>
                <a style="font-size: 20px; color: #000; text-decoration: none;" href="#" class="subrayado">&nbsp;<img style="border-radius: 9px; " src="<?= $_SESSION['foto_restaurante'] ?>" alt="" height="90px" width="90px" /></a><br>
            </center>
            <a style="font-size: 20px; color: #000; text-decoration: none" href="#" class="subrayado">&nbsp;En este apartado podrá &nbsp;visualizar sus productos y &nbsp;realizar la actualización de &nbsp;estos mismos. </a>

        </div>
        <br>
        <br>
        <br>


    </div>
    <div class="contenido-lateral">
                <div class="navegacion-lateral">
                <a href="facturas.php?cod_res=<?= $_SESSION['codigo_restaurante'] ?>" target="fran"><h2 style="font-weight: 600; text-align: center;" class="subrayado">&nbsp;PEDIDOS:</h2></a>
                </div>

    </div>
    
    <div class="contenido">
        <div class="menu">
            <p class="titulo-menu">Menú</p>
            <p class="subtitulo-menu">Categorías</p>
            <hr>
            <ul>
                <li><span style="font-size: 40px; color: #F90;">&nbsp;&nbsp;●</span><a href="pagMenuDiario.php?cod_res=<?= $_SESSION['codigo_restaurante'] ?>" target="fran" class="subrayado">Menú Diario</a></li>
                <li><span style="font-size: 40px; color: #D9D9D9;">&nbsp;&nbsp;●</span><a href="pagPlatoEjecutivo.php?cod_res=<?= $_SESSION['codigo_restaurante'] ?>" target="fran" class="subrayado">Plato Ejecutivo</a></li>
                <li><span style="font-size: 40px; color: #369;">&nbsp;&nbsp;●</span><a href="PlatoCarta.php?cod_res=<?= $_SESSION['codigo_restaurante'] ?>" target="fran" class="subrayado">Platos a la Carta</a></li>
                <li><span style="font-size: 40px; color: #389;">&nbsp;&nbsp;●</span><a href="pagBebidas.php?cod_res=<?= $_SESSION['codigo_restaurante'] ?>" target="fran" class="subrayado">Bebidas</a></li>

            </ul>
        </div>
    </div>
    <script>
        window.onload = function() {
            var enlaceMenuDiario = document.querySelector('a[href="pagMenuDiario.php?cod_res=<?= $_SESSION['codigo_restaurante'] ?>"]');
            if (enlaceMenuDiario) {
                enlaceMenuDiario.click();
            }
        };
    </script>
</body>

</html>