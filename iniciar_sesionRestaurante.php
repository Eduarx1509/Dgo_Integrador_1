<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>D'Go!</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
     <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="img/logopill.svg" alt="">
        </div>
        <div class="buscar">
            <input type="text" placeholder="Buscar...">
            <button onclick="realizarBusqueda()" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
        </div>
        <nav>
            <ul>
                <li><a href="pag_Cliente.php" class="subrayado">Inicio</a></li>
                <li><a href="#" class="subrayado">Restaurantes</a></li>
                <li><a href="#" class="subrayado">Promociones</a></li>
                <li><a href="Sesion_usuario.php" class="subrayado" style="margin-right: 0;">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="contenedor" id="contenedor">
        <div class="form-contenedor iniciar-sesion">
            <form action="negocio2.php" method="POST">
                <h1>Iniciar sesión</h1>
                <div class="redes-sociales">
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-solid fa-envelope"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-tiktok"></i></a>
                </div>
                <?php
                if (isset($_GET['error'])) {
                ?>
                    <p class="error">
                        <?php
                        echo $_GET['error']
                        ?>
                    </p>
                <?php
                }
                ?>
                <span>Ingresa tus credenciales</span>
                <input type="email" placeholder="Correo" name="correo" required>
                <input type="password" placeholder="Contraseña" name="clave" required>
                <span style="color: red;">
                </span>
<!--                <a href="#" class="subrayado">¿Olvidaste tu contraseña?</a>-->
                <button type="submit">Iniciar sesión</button>
                <a href="Registro_Trabajador.php" class="subrayado">Registrarme</a>
                <a href="Sesion_usuario.php" class="subrayado">Soy Cliente</a>
                
            </form>
             
        </div>
        <div class="lateral-contenedor">
            <div class="lateral">
                <div class="lateral-panel lateral-derecho">
                    <h1>¡Hola, restaurante!</h1>
                    <p>Ingresa tus credenciales para que puedas administrar tu restaurante.</p>
                    <button class="hidden" id="registrarme" style="cursor: default">Feliz jornada</button>
                </div>
            </div>
        </div>
    </div>
    
    
</body>

</html>