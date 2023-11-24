<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/CssDetalles.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
         <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    </head>
    <body>
        <?php
        include_once './Negocio.php';
            $foto=$_REQUEST["foto"];
            $nombre=$_REQUEST["nombre"];
            $precio=$_REQUEST["precio"];
            $cantidad=$_REQUEST["cantidad"];
            $detalle=$_REQUEST["detalle"];
            
            $obj=new Negocio();
        ?>
        <h1 class="subrayado"> "<?=$nombre?>" </h1>
        <br>
        <br>
        
        <div class="contenedor" id="contenedor">
        
        <table>
            <tr>
                <td>
                   
                    <div class="form-contenedor iniciar-sesion">
                    
                      
                      <form>
                   
                        <table>
                            <tr><td><i class="fa-solid fa-camera-retro" style="color: #ffab1a; font-size: 25px;"></i>
                            <tr>
                                <td align="center">
                                    <img src="<?=$foto?>" width="300" height="300" style="border-radius: 10px;">
                                </td>
                                
                            </tr>
                            <tr><td style="font-size: 10px;" align="center">
                                    <b>Foto referencial</b>
                                </td>
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
                                <tr><td colspan="2"><i class="fa-solid fa-circle-info" style="color: #ff9500; font-size: 25px;"></i><br><br>
                                <tr><td class="subrayado">Nombre: <td><?=$nombre?>
                                <tr><td class="subrayado">Precio:<td><i class="fa-solid fa-dollar-sign" style="color: #59c133;"><?=$precio?></i>
                                <tr><td class="subrayado">Cantidad: <td><?=$cantidad?>
                                <tr><td colspan="2" ><?=$detalle?>
                                
                               
                                
                                
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
    </body>
</html>
