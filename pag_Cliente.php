<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdrestaurantes";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$sql = "SELECT * FROM restaurantes";
$result = $conn->query($sql);
$result2 = $conn->query($sql);


?>
<?php

session_start();

    $correo = $_SESSION['usuario'];


include('./Conexion.php');
$obj = new Conexion();
$consulta_info = $obj->conecta()->query("SELECT id_cliente, nombre, apellido FROM cliente where correo = '$correo'");
while ($data = $consulta_info->fetch_assoc()) {
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $id_cliente = $data['id_cliente'];
    $_SESSION['ID'] = $id_cliente;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/menuprin.css">
    <title>D'Go!</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <header class="header">

        <div class="logo-container">
            <img src="img/logopill.svg" alt="">
        </div>
        <div class="buscar">
            <input type="text" placeholder="Buscar...">
            <button onclick="realizarBusqueda()" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
        </div>
        <div class="container">
            <nav class="menus">
                <ul>

                    <li><a class="subrayado" href="#">Restaurantes <i class="icon-abajo2"></i></a>
                        <ul class="submenus">
                            <?php
                            if ($result2->num_rows > 0) {

                                while ($row = $result2->fetch_assoc()) {
                                    $cod = $row['codigo_restaurante'];

                            ?>

                                    <a href='detalle_Restaurantes.php?codigo=<?= $cod ?>'>

                                <?php

                                    echo '<li class="subrayado">' . $row['nombre'] . '</li>';
                                    echo '</a>';
                                }
                            } else {
                                echo "No se encontraron restaurantes en la base de datos.";
                            }
                                ?>

                        </ul>
                    </li>

                    <li><a class="subrayado" href="#">Atención al cliente<i class="icon-abajo2"></i></a>
                        <ul class="submenus">
                            <li><a class="subrayado" href="mailto:menarimachifranky@gmail.com">
                                    <i class="fa-solid fa-envelope" style="color: red; font-size:25px; margin:auto; text-align: center ;"> </i>&nbsp;&nbsp;Correo
                                </a></li>
                            <li><a class="subrayado" href="https://api.whatsapp.com/send/?phone=51937056899&text=%C2%A1Hola%21%20Quisiera%20solicitar%20informaci%C3%B3n&type=phone_number&app_absent=0">
                                    <i class="fa-brands fa-square-whatsapp" style="color: #0dab49; font-size:25px; margin:auto; text-align: center ;"></i>&nbsp;&nbsp;Whatsapp
                                </a></li>
                        </ul>
                    </li>
                    <li><a class="subrayado" href="#"><i class="fa-solid fa-bars" style="color: #ff0040; font-size: 40px; margin:auto; text-align: center"></i><i class="icon-abajo2"></i></a>
                        <ul class="submenus">
                            <li><a class="subrayado" href="pag_Cliente.php"><i class="fa-solid fa-house" style="color: #f00505;"></i>&nbsp;&nbsp;Inicio</a></li>

                            <li><a class="subrayado" href="Sesion_usuario.php"><i class="fa-solid fa-user" style="color: #ed0c0c;"></i>&nbsp;&nbsp;Usuario</a></li>
                            <li><a class="subrayado" href="Sesion_usuario.php"><i class="fa-solid fa-right-to-bracket" style="color: #ff0000;"></i>&nbsp;&nbsp;Iniciar Sesión</a></li>
                            <li><a class="subrayado" href="eliminar_Sesion.php"><i class="fa-solid fa-circle-left" style="color: #fc1d1d;"></i>&nbsp;&nbsp;Cerrar Sesión</a></li>

                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="contenedor">
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
    </div>
    <div class="contenido-lateral">
        <?php
        if ($correo == null) {
        ?>
            <div class="navegacion-lateral">
                <h2 style="font-weight: 600; text-align: center;" class="subrayado">&nbsp;Bienvenido</h2>
            </div>
        <?php

        } else {
        ?>
            <div class="navegacion-lateral">
                <h2 style="font-weight: 600; text-align: center;" class="subrayado">&nbsp;Bienvenido:&nbsp;<i class="fa-solid fa-user" style="color: #080808;"></i>&nbsp<?= $nombre ?>, <?= $apellido ?></h2>
            </div>
        <?php
        }
        ?>



    </div>
    <div class="espacio">
        <p id="mensaje">Hola, elige el restaurante de tu preferencia</p>
    </div>
    <div class="contenido">
        <div class="menu">
            <p class="titulo-menu">Productos</p>
            <p class="subtitulo-menu">Menor precio</p>
            <hr>
            <ul>
                <?php
                include_once './Negocio.php';
                $obj = new Negocio();

                $vec = $obj->productosBaratos();
                foreach ($vec as $fila) {
                    echo "<li class='subrayado'><i class='fa-regular fa-circle-dot' style='color: #ff0000;'></i>&nbsp$fila[1]  <br> &nbsp&nbsp&nbsp<i class='fa-solid fa-dollar-sign' style='color: #01c622;'></i> $fila[2] </li><br>";
                }
                ?>

            </ul>
        </div>
        <?php
        if ($result->num_rows > 0) {
            echo '<div class="contenido-restaurante">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="restaurante ' . $row['nombre'] . '">';
                $cod = $row['codigo_restaurante'];
        ?>
                <a href='compras.php?codigo=<?= $cod ?>'>
            <?php

                echo '<img src="' . $row['foto_restaurante'] . '" alt="">';
                echo '<h2>' . $row['nombre'] . '</h2>';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No se encontraron restaurantes en la base de datos.";
        }
            ?>
            <div class="publicidad">
                <video width="100%" autoplay loop muted controls="false">
                    <source src="img/publicidadutp1.mp4" type="video/mp4">
                </video>
            </div>
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
                <a href="">Te atendemos todos los días de la semana</a><br>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>


</body>

</html>