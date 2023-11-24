<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/cssRegProducto.css" rel="stylesheet" type="text/css"/>
         <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    </head>
    <body>
        <?php 
    $pic="";
    session_start();
                
    if(isset($_SESSION["foto"])){
    $pic=$_SESSION["foto"];
                
    }

    ?>  
        <div class="contenedor" id="contenedor">
        <h1>Agregar nuevos productos</h1>
        <table>
            <tr>
                <td>
                   
                    <div class="form-contenedor iniciar-sesion">
                    
                      
                      <form action="subirFotoProducto.php" method="post" enctype="multipart/form-data">
                                          
                        <table>
                            <tr>
                                <td align="center">
                                    <img src="fotos/<?=$pic?>" width="300" height="300" style="border-radius: 10px;">
                                </td>
                                
                                    
                            </tr>
                            <tr>
                                <td style="font-size: 8px;" align="center">
                                    <b> <?=$pic?></b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="file" name="test" oninput="submit()" >
                                </td>
                            </tr>
                            
                            <tr><td class="subrayado" align="center">Seleccione la imagen</td>
                            
                            
                        </table>
                        </form> 
                    
                    
                </td>
                //////////////////////////////////
                <td>
                    <div class="lateral-contenedor">
                    <div class="lateral">
                        <div class="lateral-panel lateral-derecho">
                    
                        <form> 
                            <table aling="center">
                                
                                <tr><td><input type="hidden" placeholder="Codigo Restaurante" name="codigo_restaurante" value="<?=$_SESSION['codigo_restaurante']?>" required>
                                <tr><td><input type="text" placeholder="Nombre" name="nombre" required>
                                <tr><td><input type="number" placeholder="Precio" name="precio" required>
                                <tr><td><input type="number" placeholder="Cantidad" name="cantidad" required>
                                <tr><td><input type="text" placeholder="Descripción" name="descripcion" required>
                                <tr><td><select name="codigo_categoria" >
                                                
                                                <option value="1" selected> Menu Diario</option>
                                                <option value="2" selected> Plato Ejecutivo</option>
                                                <option value="3" selected> Plato a la Carta</option>
                                                <option value="4" selected> Bebidas</option>
                                                <option value="5" selected> Categoria de Producto</option>
                                        </select>
                                
                                <tr><td><input style="background-color: #F90;" type="submit" name="enviar">
                            </table>                  
                        </form>
                        </div>
                    </div>
                    </div>
                   
                    
                    </div>  
                    
                </td>
            </tr>
        </table>
                 
            
        </div>
        
        <?php
        
        if(isset($_REQUEST["enviar"])){
            include_once './Negocio.php';
            $obj=new Negocio();
            $obj->adicionProducto($_REQUEST["codigo_restaurante"], $_REQUEST["nombre"], $_REQUEST["precio"], $_REQUEST["cantidad"], $_REQUEST["descripcion"], $_REQUEST["codigo_categoria"], "fotos/$pic"); 
        }
        ?>
            
        
    </center>
    </body>
</html>
