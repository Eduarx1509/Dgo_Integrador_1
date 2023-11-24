<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos_registrarse.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="css/estilos_registrarse.css" rel="stylesheet" type="text/css"/>
        <title>Registro de Usuario</title>
        
        <link rel="stylesheet" href="css/login.css">
    
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        
        <div class = "container-form ">
            <div class = "information">
                <div class = "info-childs">
                    <h2>Bienvenido a DGO</h2>
                    <p>Crea una cuenta y accede a un mundo de sabores. ¡Tu próximo pedido está a solo un registro de distancia!</p>
                    <img src="./imagenes/logo_blanco_dgo.svg" alt="logo de DGO">
                </div>
            </div>
            <div class = "form-information">
                <div class = "form-information-childs">
                    <h2>Crear una cuenta</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class = "formulario">
                        <div class = "card">
                            <div class = "card-i">
                                <p>Nombres:</p>
                                <label>
                                    <i class='bx bx-user'></i>
                                    <input type="text" placeholder = "Nombre Completo" name = "nombre" value = "<?php if (isset($nombre)) echo $nombre; ?>">
                                </label>
                            </div>
                            <div class = "card-i">
                                <p>Apellidos:</p>
                                <label>
                                    <i class='bx bx-user'></i>
                                    <input type="text" placeholder = "Apellido Completo" name = "apellido">
                                </label>
                            </div>
                        </div>
                        <p>Correo electrónico:</p>
                        <label>
                            <i class='bx bx-envelope' ></i>
                            <input type="email" placeholder = DGO_example@gmail.com name = "correo">
                        </label>
                        <p>Teléfono:</p>
                        <label>
                            <i class='bx bx-phone' ></i>
                            <input type="text" placeholder = 983055580 name = "telefono">
                        </label>
                        <p>Contraseña:</p>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder = "**********" name = "contrasena">
                        </label>
                        <p>Dirección:</p>
                        <label>
                            <i class='bx bx-map-alt'></i>
                            <input type="text" placeholder = "Avenida DGO, Ate 10029" name = "direccion">
                        </label>
                        <div class = "btn">
                            <input type="submit" name ="submit" value="Registrarse">
                        </div>
                        <?php include 'negocio4.php'; ?>
                    </form>
                    <br>
                    <div class="btn">
                        <a class="btn-regresar" href="Sesion_usuario.php">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>