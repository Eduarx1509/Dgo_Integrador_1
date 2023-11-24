<?php

include_once './Conexion.php';
class Negocio
{

    function registroTrabajador($nombre, $correo, $clave, $foto_restaurante)
    {
        $obj = new Conexion();
        $sql = "insert into restaurantes values(null,'$nombre','$correo','$clave','$foto_restaurante')";
        mysqli_query($obj->conecta(), $sql);
    }

    function listaCategoria()
    {
        $obj = new Conexion();
        $sql = "select codigo_categoria, nombre  from categoria";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function listaproductosRestaurantes($rst, $cate)
    {
        $obj = new Conexion();
        $sql = "select pd.nombre,pd.precio,pd.cantidad,pd.descripcion,pd.codigo_producto,pd.foto "
            . "from restaurantes rt INNER JOIN productos pd ON rt.codigo_restaurante = pd.codigo_restaurante INNER JOIN categoria ct ON ct.codigo_categoria=pd.codigo_categoria "
            . "WHERE rt.codigo_restaurante='$rst' and ct.codigo_categoria='$cate'";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function listaproductos($id)
    {
        $obj = new Conexion();
        $sql = "select nombre,precio,cantidad,descripcion,codigo_producto,foto from productos WHERE codigo_categoria='$id'";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function anulaProducto($id)
    {
        $obj = new Conexion();
        $sql = "delete from productos where codigo_producto='$id'";
        mysqli_query($obj->conecta(), $sql);
    }
    function anulaFactura($id)
    {
        $obj = new Conexion();
        $sql = "delete from pago where id_pago='$id'";
        mysqli_query($obj->conecta(), $sql);
    }

    function adicionProducto($codigo_restaurante, $nombre, $precio, $cantidad, $descripcion, $codigo_categoria, $foto)
    {
        $obj = new Conexion();
        $sql = "INSERT INTO productos(codigo_restaurante,nombre,precio,cantidad,descripcion,codigo_categoria,foto) 
                values($codigo_restaurante,'$nombre',$precio,$cantidad,'$descripcion',$codigo_categoria,'$foto')";
        mysqli_query($obj->conecta(), $sql);
    }

    function listaproductosRest($rst)
    {
        $obj = new Conexion();
        $sql = "select pd.nombre,pd.precio,pd.cantidad,pd.descripcion,pd.codigo_producto,pd.foto "
            . "from restaurantes rt INNER JOIN productos pd ON rt.codigo_restaurante = pd.codigo_restaurante INNER JOIN categoria ct ON ct.codigo_categoria=pd.codigo_categoria "
            . "WHERE rt.codigo_restaurante='$rst'";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }
    function detalle($rst)
    {
        $obj = new Conexion();
        $sql = "select nombre,foto_restaurante,ruc,descripcion,mision, vision from restaurantes WHERE codigo_restaurante='$rst'";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }
    function productosBaratos()
    {
        $obj = new Conexion();
        $sql = "SELECT * FROM productos ORDER BY precio ASC LIMIT 15";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }
    function listaFacturas($restaurante)
    {
        $obj = new Conexion();
        $sql = "select pg.id_pago,cl.nombre, cl.apellido, cl.correo, cl.telefono, codigo_postal,direccion
        from pago pg INNER JOIN cliente cl on pg.id_cliente=cl.id_cliente
            WHERE pg.codigo_restaurante='$restaurante'";
        $res = mysqli_query($obj->conecta(), $sql);
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }
    
}
