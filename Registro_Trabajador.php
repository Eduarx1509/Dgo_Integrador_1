<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="css/CssRegistroRestaurante.css" rel="stylesheet" type="text/css"/>
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
      
       
        <br>
        <br>
        <br>
        <br>
        
        <br>
        <div class="contenedor" id="contenedor">
            <div class="form-contenedor iniciar-sesion">
               
            <form method="post" >
                <h1 class="subrayado">Registre su Restaurante</h1> 
                    <div class="redes-sociales">
                        <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="icon"><i class="fa-solid fa-envelope"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                 <span>Ingresa tus credenciales</span>
            <table>
            <tr>
                
                <td>
                    <input type="text" placeholder="Nombre" name="nombre" required>
                </td>
            </tr>
            <tr>
                
                <td>
                    <input type="email" placeholder="Correo" name="correo" required>
                </td>
                
            </tr>
            <tr>
               
                <td>
                    <input type="password" placeholder="Contraseña" name="clave" required>
                </td>
            </tr>
            
            <tr>
                <td><button type="submit" name="enviar">Registrarse</button>      
            <tr>
                <td align   ="center">
                <button><a href="iniciar_sesionRestaurante.php">Regresar</a></button>
                </td>
            </tr>
        </table>
            <?PHP
                include_once './Negocio.php';
                $obj=new Negocio();
            ?>
        </form>
                
          </div>  
            <div class="lateral-contenedor">
                <div class="lateral">
                    <div class="lateral-panel lateral-derecho">
                        <form action="subirFotoRestaurante.php" method="post" enctype="multipart/form-data">
                                          
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
                            
                            <tr><td class="subrayado" align="center" style="color: black;">Seleccione la imagen</td>
                            
                            
                        </table>
                        </form> 
                    </div>
                </div>
            </div>
        
     </div>

    <?php
        
        if (isset($_POST["enviar"])) {           
        $obj->registroTrabajador($_POST["nombre"], $_POST["correo"],$_POST["clave"],"fotos/$pic");
            header("location:iniciar_sesionRestaurante.php");
        }           
    ?>
</body>
</html>
