<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloDetalleRestaurante.css">
    <title>D'Go!</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <?php
    include_once './Negocio.php'; // Ajusta la ruta según la ubicación real de Negocio.php
    $negocio = new Negocio(); // Crea una instancia de la clase Negocio
    $codigoRestaurante = $_REQUEST['codigo'];
    $detalles = $negocio->detalle($codigoRestaurante); // Llama a la función para obtener la lista de productos por restaurante
    foreach ($detalles as $fila) {
    }
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
    $result = $conn->query($sql);
    $result2 = $conn->query($sql);
    ?>
    <?php

    session_start()
    ?>

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

                    <li><a class="subrayado" href="#">Atencion al cliente<i class="icon-abajo2"></i></a>
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
                            <li><a class="subrayado" href="Sesion_usuario.php"><i class="fa-solid fa-circle-left" style="color: #fc1d1d;"></i>&nbsp;&nbsp;Cerrar Sesión</a></li>
                            
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
    <section class="hero">

        <h2>Bienvenido a D'GO!</h2>
        <p>
            En el vertiginoso y dinámico mundo contemporáneo, caracterizado por la aceleración de la vida cotidiana y la búsqueda constante de soluciones prácticas, D'Go se alza como la opción definitiva en el apasionante ámbito del servicio de delivery. En un contexto donde la comodidad se ha vuelto una prioridad en nuestras elecciones diarias, D'Go no solo representa una conveniencia, sino también una experiencia culinaria sin igual.
            Nos llena de orgullo presentar una selección verdaderamente excepcional de empresas asociadas que, a través de nuestra innovadora plataforma, trascienden las barreras físicas para llevar la calidad y la variedad directamente a tu puerta. En este universo de opciones gastronómicas, cada empresa asociada con D'Go se compromete a ofrecer lo mejor de sus especialidades, creando así un mosaico de sabores y experiencias que deleitarán tus sentidos.</p>

    </section>

    <section class="about">
        <div class="about_content">
            <h2>Acerca de <?= $fila[0] ?></h2>
            <img src="<?= $fila[1] ?>" class="img2">
        </div>
        <P><?= $fila[3] ?></P>

    </section>
    <div class="services-space">
        <section class="services">
            <h2>Nosotros:</h2>
            <ul>
                <li>Nuestro compromiso con la excelencia comienza en la cocina, donde cada platillo es preparado con los ingredientes más frescos y de la más alta calidad. Extendemos este estándar a nuestro servicio de delivery, asegurando que cada comida llegue a tu puerta con el mismo sabor y calidad que disfrutarías en nuestro restaurante.</li>

                <li>Entendemos la importancia de la puntualidad en el servicio de delivery. Nos comprometemos a entregar tus pedidos de manera oportuna, para que disfrutes de tus comidas calientes y frescas justo cuando lo desees. Nuestro equipo de repartidores está dedicado a garantizar la rapidez y confiabilidad en cada entrega.</li>

                <li>Nos preocupamos por el medio ambiente y estamos comprometidos con prácticas sostenibles. Nuestro empaque de delivery está diseñado para minimizar residuos y maximizar la preservación de los alimentos. Al elegir [Nombre del Restaurante], no solo disfrutas de una excelente comida, sino que también contribuyes a la preservación del medio ambiente.</li>
            </ul>

        </section>
        <div class="misionvision">
            <section class="services">
                <h2>Misión</h2>
                <ul>
                    <li><?= $fila[4] ?></li>
                </ul>

            </section>
            <section class="services">
                <h2>Visión</h2>
                <ul>
                    <li><?= $fila[5] ?></li>
                </ul>

            </section>
        </div>

    </div>
    <section class="services ruc">
        <h2>RUC</h2>
        <ul>
            <li><?= $fila[2] ?></li>
        </ul>

    </section>
    <!--Boton-->
    <div class="boton-modal">
        <label for="btn-modal">
            D´GO
        </label>
    </div>
    <!--Fin de Boton-->
    <!--Ventana Modal-->
    <input type="checkbox" id="btn-modal">
    <div class="container-modal">
        <div class="content-modal">
            <h2>Bienvenido a D'Go: Tu Puerta a un Mundo Culinario Sin Límites</h2>
            <p>En el ajetreado ritmo de la vida moderna, donde la comodidad se convierte en una necesidad, presentamos con entusiasmo D'Go, el destino definitivo para descubrir una amplia variedad de sabores sin tener que salir de casa. D'Go no es simplemente un sitio web de delivery; es tu entrada a un universo culinario donde restaurantes de alta calidad se unen para llevarte una experiencia gastronómica sin igual, directamente a tu puerta.</p>
            <h3>Explora, Descubre y Deléitate:</h3>
            <P>En D'Go, nos enorgullece ser la plataforma que conecta tus antojos con la excelencia culinaria de una amplia variedad de restaurantes. Desde tus platos locales favoritos hasta especialidades gourmet, nuestro sitio web reúne una selección diversa que satisface todos los gustos y preferencias. Explora nuestras opciones, descubre nuevos sabores y deléitate con la comodidad de recibir tus platillos favoritos sin moverte de casa.</P>
            <h3>
                Una Red de Restaurantes de Calidad:
            </h3>
            <p>
                Trabajamos en estrecha colaboración con una red cuidadosamente seleccionada de restaurantes, cada uno comprometido con ofrecer productos de alta calidad. Desde restaurantes icónicos hasta gemas culinarias ocultas, D'Go es la plataforma donde los chefs talentosos y apasionados comparten sus creaciones contigo. Cada establecimiento registrado en D'Go es elegido no solo por su excelencia culinaria, sino también por su compromiso con la satisfacción del cliente
            </p>
            <h3>
                Cómo Funciona: Simple, Rápido y Conveniente:
            </h3>
            <p>
                Nuestra interfaz intuitiva te permite navegar fácilmente por una amplia variedad de restaurantes y sus menús. Solo tienes que seleccionar tus platillos favoritos, realizar tu pedido y esperar cómodamente en casa. Con opciones de pago seguras y entregas rápidas, D'Go simplifica el proceso, asegurando que disfrutes de tus comidas preferidas sin complicaciones.
            </p>
            <h3>
                Servicio de Delivery de Confianza:
            </h3>
            <p>
                En D'Go, entendemos la importancia de la puntualidad y la confiabilidad en el servicio de delivery. Nuestro compromiso es garantizar que tus pedidos lleguen a tiempo, con la frescura y calidad que mereces. Colaboramos con un equipo de repartidores dedicados para llevar tus platillos directamente a tu puerta, asegurando que cada experiencia con D'Go sea excepcional.
            </p>
            <div class="btn-cerrar">
                <label for="btn-modal">Cerrar</label>
            </div>
        </div>
        <label for="btn-modal" class="cerrar-modal"></label>
    </div>
    <!--Fin de Ventana Modal-->
    <script src="js/script.js"></script>
</body>

</html>