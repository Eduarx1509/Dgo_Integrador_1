<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/cssFranky.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
         <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
        
    </head>
    <body>
         <?php
        include_once './Negocio.php';
        $obj=new Negocio();
        $codigo=$_REQUEST["cod_res"];
        $vec=$obj->listaproductosRestaurantes($codigo, 1);
        ?>
        
        
        
        <table class="table_section">
            <thead>
                <tr><th>Foto<th>Plato<th>Precio<th>Cantidad<th>Detalles<th>Eliminar<br> Producto
            </thead>
        <?php
        foreach ($vec as $fila){
            echo "<tr class='bg-white' align='center'><td><img src='$fila[5]'width='300' height='150' alt=''/><td>$fila[0]<td><i class='fa-solid fa-dollar-sign' style='color: #3dca2b;'></i>$fila[1]<td>$fila[2]";
            ?>
                <td><a href="pagDetallesProducto.php?foto=<?=$fila[5]?>&nombre=<?=$fila[0]?>&precio=<?=$fila[1]?>&cantidad=<?=$fila[2]?>&detalle=<?=$fila[3]?>"><i class="fa-solid fa-circle-info" style="color: blue; font-size: 40px"></i></a></td>
            <td><a href='EliminaProducto.php?id=<?=$fila[4]?>'><i class="fa-solid fa-trash" style="color: red; font-size: 40px"></i></a></td>
            
            <?php
        }
        ?>
        </table>
            
    
    </body>
</html>
