<?php
session_start();
include('Conexion.php');

$obj=new Conexion();
        


if (isset($_POST['correo']) && isset($_POST['clave'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $correo = validate($_POST['correo']);
    $clave = validate($_POST['clave']);

    if (empty($correo)) {
        header("Location:iniciar_sesionRestaurante.php?error=El correo es requerido");
    } elseif (empty($clave)) {
        header("Location: iniciar_sesionRestaurante.php?error=La contraseña es requerida");
        exit();
    } else {
        $clave = ($clave);

        $Sql = "SELECT * FROM restaurantes WHERE correo = '$correo' AND clave='$clave'";
        $result = mysqli_query($obj->conecta(), $Sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['correo'] === $correo && $row['clave'] === $clave) {
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['codigo_restaurante'] = $row['codigo_restaurante'];
                $_SESSION['foto_restaurante'] = $row['foto_restaurante'];
                header("Location: Pag_Restaurante.php");
                exit();
            } else {
                header("Location: iniciar_sesionRestaurante.php?error=El correo o contraseña son incorrectas");
                exit();
            }
        } else {
            header("Location: iniciar_sesionRestaurante.php?error=El correo o contraseña son incorrectas");
            exit();
        }
    }
    header("Location: Pag_Restaurantes.php?nom=<?$nombre?>");
    exit();
}
