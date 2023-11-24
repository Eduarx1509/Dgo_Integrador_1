<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <?PHP
    session_start();
    ?>
    <header>
        <div class="logo-container">
            <img src="img/logopill.svg" alt="">
        </div>
        <div class="buscar">
            <input type="text" placeholder="Buscar...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
        </div>
        <nav>
            <ul>
                <li><a href="#" class="subrayado" onclick="redirigirAInicio()">Inicio</a></li>
                <li><a href="pagAgregarProductos.php?codigo_restaurante=<?= $_SESSION['nombre'] ?>" target="fran" class="subrayado">Agregar un producto</a></li>
                <li><a href="mailto:menarimachifranky@gmail.com" class="subrayado">Atención al Cliente</a>

                </li>

            </ul>
        </nav>

    </header>
    <script>
        function redirigirAInicio() {
            top.location.href = 'pag_Cliente.php';
        }
    </script>
</body>

</html>