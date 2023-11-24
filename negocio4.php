<?php
    include 'Conexion.php';
    $obj=new Conexion();
    $error = true;
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contrasena = $_POST['contrasena'];
        $direccion = $_POST['direccion'];
        //Validaciones de los campos
        if (!empty($nombre)) {
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            if (strlen($nombre) > 20) {
                echo '<div class = "alert error">El nombre es muy largo</div>';
                $error = false;
            }
        } else {
            echo '<div class = "alert error">Por favor ingresa un nombre</div>';
            $error = false;
        }

        if (!empty($apellido)) {
            $apellido = trim($apellido);
            $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
            if (strlen($apellido) > 20) {
                echo '<div class = "alert error">El apellido es muy largo</div>';
                $error = false;
            }
        } else {
            echo '<div class = "alert error">Por favor ingresa su apellido</div>';
            $error = false;
        }

        if (!empty($correo)) {
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo '<div class = "alert error">Por favor ingresa un correo válido</div>';
                $error = false;
            }
        } else {
            echo '<div class = "alert error">Por favor ingresa un correo </div>';
            $error = false;
        }

        if (!empty($telefono)) {
            if (!filter_var($telefono, FILTER_VALIDATE_INT)) {
                echo '<div class = "alert error">El teléfono debe ser un número</div>';
                $error = false;
            }
        } else {
            echo '<div class = "alert error">Por favor complete los campos</div>';
            $error = false;
        }

        if (!empty($contrasena)) {
             if (!preg_match('`[a-z]`',$contrasena)){
                echo '<div class = "alert error">La clave debe tener al menos una letra minúscula</div>';
                $error = false;
             }
             if (!preg_match('`[A-Z]`',$contrasena)){
                echo '<div class = "alert error">La clave debe tener al menos una letra mayúscula</div>';
                $error = false;
             }
             if (!preg_match('`[0-9]`',$contrasena)){
                echo '<div class = "alert error">La clave debe tener al menos un caracter numérico</div>';
                $error = false;
             }        
        } else {
            echo '<div class = "alert error">Debe ingresar una contraseña</div>';
            $error = false;
        }

        //Validación de registro
        if ($error) {
            $query = "INSERT INTO cliente ( nombre, apellido, correo, telefono, clave)
              VALUES('$nombre','$apellido','$correo','$telefono','$contrasena')";
            $ejecutar = $obj->conecta()->query($query);
            header('location: Sesion_usuario.php');
        }
    }    

   