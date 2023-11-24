<?php


include_once './carrito.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['codigo_producto'])) {
        $codigoProducto = $_POST['codigo_producto'];
        $nombreProducto = $_POST['nombre_producto'];
        $precioProducto = $_POST['precio_producto'];

        $carrito = new Carrito();
        // Pasa los parámetros adicionales al carrito
        $carrito->agregarAlCarrito([
            'codigo' => $codigoProducto,
            'nombre' => $nombreProducto,
            'precio' => $precioProducto,
            'foto' => $FotoProducto,
        ]);

        // Redirige a la página de compras o a donde prefieras
        header('Location:'.$_SERVER['HTTP_REFERER']."");
        exit();
    }
}
?>
