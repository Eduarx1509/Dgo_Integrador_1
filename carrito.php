<?php

include_once './procesar_compra.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Carrito
{
    public function agregarAlCarrito($productoDetalles)
    {
        // Verifica si el carrito existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
            $_SESSION['total'] = 0; // Inicializa el total en la sesión
        }

        if (count($_SESSION['carrito']) < 3) {
            // Busca el producto en el carrito por su código
            $codigoProducto = $productoDetalles['codigo'];
            $productoExistenteKey = array_search($codigoProducto, array_column($_SESSION['carrito'], 'codigo'));

            if ($productoExistenteKey !== false) {
                // Si el producto ya está en el carrito, incrementa la cantidad
                $_SESSION['carrito'][$productoExistenteKey]['cantidad'] += 1;
            } else {
                // Si el producto no está en el carrito, agrégalo
                // Agrega el precio unitario al detalle del producto
                $productoDetalles['precio_unitario'] = $productoDetalles['precio'];
                $productoDetalles['cantidad'] = 1; // Establece la cantidad inicial
                $_SESSION['carrito'][] = $productoDetalles;
            }

            // Actualiza el total sumando el precio del producto
            $_SESSION['total'] += $productoDetalles['precio'];
        } else {
            echo "No puedes agregar más de tres productos al carrito.";
        }
    }
    public function obtenerCarrito()
    {
        // Retorna el contenido del carrito desde la sesión
        return isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
    }

    public function obtenerTotal()
    {
        // Retorna el total desde la sesión
        return isset($_SESSION['total']) ? $_SESSION['total'] : 0;
    }

    public function limpiarCarrito()
    {
        // Limpia el carrito eliminando la variable de sesión
        unset($_SESSION['carrito']);
        unset($_SESSION['total']);
    }
    public function obtenerProductosEnCarrito()
    {
        // Retorna la lista de productos en el carrito desde la sesión
        return isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
    }
    public function incrementarCantidad($codigoProducto)
    {
        // Encuentra el producto en el carrito
        $productoKey = array_search($codigoProducto, array_column($_SESSION['carrito'], 'codigo'));

        // Incrementa la cantidad
        $_SESSION['carrito'][$productoKey]['cantidad']++;

        // Actualiza el precio total
        $_SESSION['total'] += $_SESSION['carrito'][$productoKey]['precio_unitario'];
    }

    public function decrementarCantidad($codigoProducto)
    {
        // Encuentra el producto en el carrito
        $productoKey = array_search($codigoProducto, array_column($_SESSION['carrito'], 'codigo'));

        // Decrementa la cantidad si es mayor que 1
        if ($_SESSION['carrito'][$productoKey]['cantidad'] > 1) {
            $_SESSION['carrito'][$productoKey]['cantidad']--;

            // Actualiza el precio total
            $_SESSION['total'] -= $_SESSION['carrito'][$productoKey]['precio_unitario'];
        }
    }

    public function eliminarProducto($codigoProducto)
    {
        // Encuentra el producto en el carrito
        $productoKey = array_search($codigoProducto, array_column($_SESSION['carrito'], 'codigo'));

        // Resta el precio total del producto eliminado
        $_SESSION['total'] -= ($_SESSION['carrito'][$productoKey]['precio_unitario'] * $_SESSION['carrito'][$productoKey]['cantidad']);

        // Elimina el producto del carrito
        unset($_SESSION['carrito'][$productoKey]);

        // Reindexa el array después de la eliminación
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
    public function manejarAcciones()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $codigoProducto = $_POST['codigoProducto'];

        switch ($_POST['action']) {
            case 'incrementar':
                $this->incrementarCantidad($codigoProducto);
                break;

            case 'decrementar':
                $this->decrementarCantidad($codigoProducto);
                break;

            case 'eliminar':
                $this->eliminarProducto($codigoProducto);
                break;
        }

     
        //$_SESSION['mensajeRepetido'] = $mensajeRepetido;

        
        header('Location:'.$_SERVER['HTTP_REFERER']."");
        exit();
    }
}
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['limpiar_carrito'])) {
    $carrito = new Carrito();
    $carrito->limpiarCarrito();

    // Redirige de nuevo a la página de compras o a donde prefieras
    header('Location:'.$_SERVER['HTTP_REFERER']."");
    
    exit();
}
$carrito = new Carrito();

// Maneja las acciones
$carrito->manejarAcciones();
?>
