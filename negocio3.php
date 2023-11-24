<?php

    session_start();
    include 'Conexion.php';
    $obj=new Conexion();
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($obj->conecta(),"SELECT * FROM cliente WHERE 
    correo = '$correo' AND clave = '$contrasena'");

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;
        
        header('location: pag_Cliente.php');
        exit;
    } else {
        echo '
        <script> 
            alert("Usuario no existe, por favor verifique los datos introducidos") 
            window.location = "Sesion_usuario.php";
        </script>';
        exit;
    }

