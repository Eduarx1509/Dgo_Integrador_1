<?php
$file=$_FILES["test"]["name"];//nombre y tipo de archivo
$tipo=strtolower(pathinfo($file, PATHINFO_EXTENSION)); //extension
$tam=$_FILES["test"]["size"];//tamaño en bytes
$url_tempo=$_FILES["test"]["tmp_name"];//ruta temporal
$url_insert=dirname(__FILE__)."/fotos";
$url_target=str_replace("\\", "/", $url_insert)."/".$file;
$valida=1; $msg="";
 session_start();
 if($file==null){
     $_SESSION["foto"]="fotos/sin_foto.jpg";
 }
 if ($tam>5000000) {
    $msg="Tamaño muy grande, maximo 5MB excede $tam";
    $valida=0;
}
if ($tipo!="jpg" && $tipo!="png") {
    $msg="No se aceptan este tipo de archivos $tipo";
    $valida=0;
}
if($valida==1){
    if (move_uploaded_file($url_tempo, $url_target)) {
        $_SESSION["foto"]=$file;
        
    }else{
        $_SESSION["foto"]="Error al cargar el archivo";
    }
}else{
    $_SESSION["foto"]=$msg;
}
header("location:pagAgregarProductos.php");
?>
