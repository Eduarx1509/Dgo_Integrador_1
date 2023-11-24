<?php
include_once './Negocio.php';
$id=$_REQUEST["id"];
$obj=new Negocio();
$obj->anulaFactura($id);

