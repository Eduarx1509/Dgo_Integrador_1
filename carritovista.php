<?php
include_once 'carrito.php';
include_once './Negocio.php';

// Crear una instancia de la clase Carrito
$carrito = new Carrito();

// Manejar las acciones del formulario (incrementar, decrementar, eliminar)
$carrito->manejarAcciones();

// Obtener el contenido del carrito y el total
$productosEnCarrito = $carrito->obtenerCarrito();
$total = $carrito->obtenerTotal();

// Definir la variable $mensajeRepetido
$mensajeRepetido = ''; // Puedes asignarle un valor por defecto o dejarla vacía, dependiendo de tus necesidades

// Resto del código HTML y estructura de la página...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/carritovista.css" rel="stylesheet" type="text/css" />
    <title>Carrito de Compras</title>
    <!-- Agrega tus estilos CSS y scripts aquí -->
</head>
<body>

<div id="carritoContenedor">
    <h3>TU CARRITO:</h3>

    <!-- Muestra el mensaje repetido -->
    <p id="mensajeRepetido" style="color: red;"><?php echo $mensajeRepetido; ?></p>

    <ul>
        <?php foreach ($productosEnCarrito as $producto): ?>
            <?php if (is_array($producto)): ?>
                <div class="botones-container">
                    <li class="producto-carrito" data-codigo="<?php echo $producto['codigo']; ?>">
                        <span class="nombre"><?php echo $producto['nombre']; ?></span>

                        <!-- Botón para incrementar cantidad -->
                        <form class="boton-form" method="post" action="carritovista.php">
                            <input type="hidden" name="codigoProducto" value="<?php echo $producto['codigo']; ?>">
                            <input type="hidden" name="action" value="incrementar">
                            <button class="btn-incrementar" type="submit" name="btn_incrementar">+</button>
                        </form>

                        <!-- Botón para decrementar cantidad -->
                        <form class="boton-form" method="post" action="carritovista.php">
                            <input type="hidden" name="codigoProducto" value="<?php echo $producto['codigo']; ?>">
                            <input type="hidden" name="action" value="decrementar">
                            <button class="btn-decrementar" type="submit" name="btn_decrementar">-</button>
                        </form>

                        <!-- Botón para eliminar producto -->
                        <form class="boton-form" method="post" action="carritovista.php">
                            <input type="hidden" name="codigoProducto" value="<?php echo $producto['codigo']; ?>">
                            <input type="hidden" name="action" value="eliminar">
                            <button class="btn-eliminar" type="submit" name="btn_eliminar">Eliminar</button>
                        </form>
                    </li>
                </div>
                <span class="cantidad">Cantidad: <?php echo $producto['cantidad']; ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <div class="total-cuadro">
        <p class="total-texto">Total:</p>
        <p class="total-precio">S/<?php echo number_format($total, 2); ?></p>
    </div>

    <form action="pagos.php" method="post">
        <button type="submit" name="limpiar_carrito" class="limpiar-carrito-btn">Limpiar Carrito</button>
        <button type="submit" name="resumen_compra" class="boton-item">Resumen de Compra</button>
    </form>
</div>

<!-- Agrega tus scripts JavaScript aquí -->

</body>
</html>