<?php
session_start(); // Debe estar al principio del archivo

include_once './Negocio.php';
include_once 'carrito.php';

// Resto del código de carrito.php
?>
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

$result2 = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="app.js" async></script>
    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="css/modal.css" rel="stylesheet" type="text/css" />
    <link href="css/botones.css" rel="stylesheet" type="text/css" />
    <link href="css/aea.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MENU </title>
    <link rel="icon" href="">
</head>
<header>
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
                <li><i class="fa-solid fa-cart-shopping" style="color: #df0c21;" alt="Carrito" id="verCarritoBtn" onclick="abrirCarritoModal()"></i></li>



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

<body>
    <div style="display: flex;">
        <div style="width: 250px; position: fixed; margin-top:200px; margin-left: 20px">
            <video width="100%" autoplay loop muted controls="false">
                <source src="img/publicidad2.mp4" type="video/mp4">
            </video>
        </div>
        <div style="margin-left: 300px">
            <?php
            include_once './Negocio.php'; // Ajusta la ruta según la ubicación real de Negocio.php

            $negocio = new Negocio(); // Crea una instancia de la clase Negocio

            if (isset($_GET['codigo'])) {
                $codigoRestaurante = $_GET['codigo'];
                $productos = $negocio->listaproductosRest($codigoRestaurante); // Llama a la función para obtener la lista de productos por restaurante

                if (!empty($productos)) {
                    echo '<div class="contenido-restaurante">';
                    foreach ($productos as $producto) {
                        echo '<div class="restaurante ' . $producto['nombre'] . '">';
                        $codigoProducto = $producto['codigo_producto'];
            ?>
                        <a href='detalles_producto.php?codigo=<?= $codigoProducto ?>'>
                <?php
                        echo '<img src="' . $producto['foto'] . '" alt="">';
                        echo '<h2>' . $producto['nombre'] . '</h2>';
                        echo '<p>Precio: $' . $producto['precio'] . '</p>';
                        echo '<p>Cantidad disponible: ' . $producto['cantidad'] . '</p>';
                        echo '<p>' . $producto['descripcion'] . '</p>';
                        echo '</a>';
                        // Agregar el botón "Agregar al carrito" 
                        echo '<form action="agregar_al_carrito.php" method="post" class="agregar-carrito-form boton-item">';
                        echo '<input type="hidden" name="codigo_producto" value="' . $codigoProducto . '">';
                        echo '<input type="hidden" name="nombre_producto" value="' . $producto['nombre'] . '">';
                        echo '<input type="hidden" name="precio_producto" value="' . $producto['precio'] . '">';
                        echo '<input type="hidden" name="foto_producto" value="' . $producto['foto'] . '">';
                        echo '<button type="submit" class="boton-item">Agregar al carrito</button>';
                        echo '</form>';

                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo "No se encontraron productos para este restaurante en la base de datos.";
                }
            } else {
                echo "No se proporcionó el código del restaurante.";
            }
                ?>

                <?php
                include_once 'carrito.php';


                // Muestra el contenido del carrito
                $carrito = new Carrito();
                $productosEnCarrito = $carrito->obtenerCarrito();
                $total = $carrito->obtenerTotal(); // Obtiene el total del carrito

                ?>
                <!-- El modal -->
                <div id="carritoModal" class="modal">
                    <!-- Contenido del modal -->
                    <div class="modal-contenido">
                        <span class="cerrar" onclick="cerrarCarritoModal()">&times;</span>
                        <h3>TU CARRITO:</h3>

                        <!-- Muestra el mensaje repetido -->
                        <p id="mensajeRepetido" style="color: red;"><?php echo $mensajeRepetido; ?></p>

                        <ul>
                            <?php
                            foreach ($productosEnCarrito as $producto) {
                                // Array $producto
                                if (is_array($producto)) {

                                    echo '<div class="botones-container">';
                                    echo '<li class="producto-carrito" data-codigo="' . $producto['codigo'] . '">';

                                    echo '<span class="nombre">' . $producto['nombre'] . '</span>';

                                    // Botón para incrementar cantidad


                                    echo '<form class="boton-form" method="post" action="carrito.php">';
                                    echo '<input type="hidden" name="codigoProducto" value="' . $producto['codigo'] . '">';
                                    echo '<input type="hidden" name="action" value="incrementar">';
                                    echo '<button class="btn-incrementar" type="submit" name="btn_incrementar">+</button>';
                                    echo '</form>';

                                    // Botón para decrementar cantidad
                                    echo '<form class="boton-form" method="post" action="carrito.php">';
                                    echo '<input type="hidden" name="codigoProducto" value="' . $producto['codigo'] . '">';
                                    echo '<input type="hidden" name="action" value="decrementar">';
                                    echo '<button class="btn-decrementar" type="submit" name="btn_decrementar">-</button>';
                                    echo '</form>';

                                    // Botón para eliminar producto
                                    echo '<form class="boton-form" method="post" action="carrito.php">';
                                    echo '<input type="hidden" name="codigoProducto" value="' . $producto['codigo'] . '">';
                                    echo '<input type="hidden" name="action" value="eliminar">';
                                    echo '<button class="btn-eliminar" type="submit" name="btn_eliminar">Eliminar</button>';
                                    echo '</form>';
                                    echo '</div>';

                                    echo '<span class="cantidad">Cantidad: ' . $producto['cantidad'] . '</span>'; // Mostrar la cantidad
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                        <div class="total-cuadro">
                            <p class="total-texto">Total:</p>
                            <p class="total-precio">S/<?php echo number_format($total, 2); ?></p>
                        </div>
                        <form action="pagos.php" method="post">
                            <button type="submit" name="limpiar_carrito" class="limpiar-carrito-btn">Limpiar Carrito</button>
                            <button type="submit" name="resumen_compra" class="boton-item">Resumen de Compra</button>
                            <a href="./fpdf/generarPDF.php">Generar PDF</a>
                        </form>
                    </div>
                </div>
        </div>
        <div style="width: 250px; position: fixed; margin-top:200px; margin-left: 75%"">
            <video width="100%" autoplay loop muted controls="false">
                <source src="img/publicidad3.mp4" type="video/mp4">
            </video>
        </div>
    </div>


    <!-- Scripts de abrir y cerrar Modal -->
    <script>
        var mensajeRepetido = '';

        function abrirCarritoModal() {
            window.location.href = 'carritovista.php';
        }


        function cerrarCarritoModal() {
            var modal = document.getElementById('carritoModal');
            // Espera a que se complete la operación antes de cerrar el modal
            setTimeout(() => modal.classList.remove('mostrar'), 0);

            // Limpia el mensaje de producto repetido al cerrar el modal
            mensajeRepetido = '';
        }

        function resumenCompra() {
            window.location.href = 'pagos.php';
        }
    </script>

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
</body>
<script src="js/script.js"></script>

</html>