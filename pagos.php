<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once './carrito.php';

$carrito = new Carrito();

// Obtiene el total del carrito
$totalCarrito = $carrito->obtenerTotal();
// Productos del carrito
$productosEnCarrito = $carrito->obtenerProductosEnCarrito();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pagos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="app.js" async></script>
    <title>Método de pago</title>
</head>
<body>
    <div class="contenedor">
    
        <h1>Método de pago</h1><br>
        
        <!-- Formulario principal -->
        <form action="validar_pagos.php" method="POST">

            <!-- Sección de información del usuario -->
            <label>Método de pago aceptable</label>
            <div class="iconos-contenedor" style="margin-bottom: 0px;">
                <img src="img/efectivo.png" alt="logo-efectivo" width="150px" height="150px">
            </div>
            
            <label>Código Postal (Solo cercado de Lima)</label>
            <input type="text" placeholder="15046" name="postal" required>
            
            <label>Dirección</label>
            <input type="text" placeholder="Av. D'GO 808, Ate" name="direccion" required>
            
            <label>Producto 1</label>
            <input type="text" placeholder="producto 1" name="pd1" >

            <label>Producto 2</label>
            <input type="text" placeholder="producto 2" name="pd2">

            <label>Producto 3</label>
            <input type="text" placeholder="producto 2" name="pd3">
            
            <!-- Mostrar resumen de compras -->
            <div class="resumen-compras">
                <h2>Resumen de Compras</h2>
                <!-- Sección de monto total -->
                <h3 id="monto-total">Tu Total es: S/<?php echo $totalCarrito; ?></h3>




                
                <!-- Detalles del carrito -->
                <h4>Detalles del Carrito:</h4>
                <ul>
                    <?php foreach ($productosEnCarrito as $producto): ?>
                        <?php if (is_array($producto)): ?>
                            <li>
                                Producto: <?php echo $producto['nombre']; ?><br>
                                Precio Unitario: S/<?php echo number_format($producto['precio_unitario'], 2); ?><br>
                                Cantidad: <?php echo $producto['cantidad']; ?><br>
                                Precio Total: S/<?php echo number_format($producto['precio_unitario'] * $producto['cantidad'], 2); ?><br>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

                <?php
                // Verifica si el usuario está autenticado
                if (isset($_SESSION['usuario'])):
                    // Usuario autenticado, muestra el botón de Confirmar Pago
                    ?>
                    <input type="submit" class="btn" value="Confirmar Pago" name="submit">
                <?php else: ?>
                    <!-- Usuario no autenticado, mensaje o enlace a la página de inicio de sesión -->
                    <p>Inicia sesión para confirmar tu pago.</p>
                    <a href="Sesion_usuario.php">Iniciar Sesión</a>
                <?php endif; ?>
                <a href="./fpdf/generarPDF.php">Generar PDF</a>
            </div>
        </form>
</body>
</html>
