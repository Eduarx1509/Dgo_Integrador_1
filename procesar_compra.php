<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['procesar_compra'])) {
       
        // Puedes acceder a los detalles del carrito desde $_SESSION['carrito']

        foreach ($_SESSION['carrito'] as $producto) {
            $codigoProducto = $producto['codigo'];
            $cantidadProducto = $producto['cantidad'];

            // Realiza las actualizaciones en la base de datos
            // Puedes utilizar consultas SQL para restar la cantidad comprada
            // Supongamos que tienes una tabla llamada "productos" con campos "codigo" y "cantidad_disponible"
            // y quieres restar la cantidad comprada de la cantidad disponible en la base de datos

            // Aquí debes ajustar las consultas y la conexión a tu base de datos específica
            $conexion = new PDO("mysql:host=tu_host;dbname=tu_base_de_datos", "tu_usuario", "tu_contraseña");

            // Consulta SQL para restar la cantidad comprada de la cantidad disponible
            $consulta = $conexion->prepare("UPDATE productos SET cantidad_disponible = cantidad_disponible - :cantidad WHERE codigo = :codigo");
            $consulta->bindParam(':cantidad', $cantidadProducto);
            $consulta->bindParam(':codigo', $codigoProducto);

            // Ejecuta la consulta
            $consulta->execute();

            // Puedes agregar manejo de errores aquí si es necesario
        }
      
        // Limpia el carrito después de procesar la compra
        $carrito = new Carrito();
        $carrito->limpiarCarrito();

        // ACA VA LA PAGINA DE PAGO COMPLETO
        header('Location: Resumendecompra.php');
        exit();
    }
}

?>
