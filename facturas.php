<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/cssFranky.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
         <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    </head>
     <body>
         <?php
        include_once './Negocio.php';
        $obj=new Negocio();
        $codigo=$_REQUEST["cod_res"];
        $vec=$obj->listaFacturas($codigo);
        ?>
        
        
        
         <table class="table_section">
            <thead>
                <tr><th>Código Factura<th>Nombre<th>Apellido<th>Correo<th>Telefono<th>Codigo Postal<th> Direccion<th> ATENDER
            </thead>
        <?php
        foreach ($vec as $fila){
            echo "<tr class='bg-white' align='center'><td>$fila[0]<td>$fila[1]<td>$fila[2]<td>$fila[3]<td>$fila[4]<td>$fila[5]<td>$fila[6]";
            ?>  
            <td><a href='eliminarFactura.php?id=<?=$fila[0]?>'><i class="fa-solid fa-clipboard-user" style="color: red; font-size: 40px"></i>
           </a></td>
            <?php
        }
        ?>
        </table>
    </body>
</html>