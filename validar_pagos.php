<?php
session_start();
    include 'Conexion.php';
    $obj=new Conexion();
    $codigo = $_POST['postal'];
    $direccion = $_POST['direccion'];
    $pd1 = $_POST['pd1'];
    $pd2 = $_POST['pd2'];
    $pd3 = $_POST['pd3'];
    $user=$_SESSION['ID']; 
    $query = "INSERT INTO pago (id_pago, codigo_postal, direccion, id_cliente,codigo_restaurante)
              VALUES(null,'$codigo','$direccion','$user', $pd1)";
              
    $ejecutar = $obj->conecta()->query($query);
    $query = "INSERT INTO pago (id_pago, codigo_postal, direccion, id_cliente,codigo_restaurante)
              VALUES(null,'$codigo','$direccion','$user', $pd2)";
    $ejecutar2 = $obj->conecta()->query($query);
    $query = "INSERT INTO pago (id_pago, codigo_postal, direccion, id_cliente,codigo_restaurante)
              VALUES(null,'$codigo','$direccion','$user', $pd3)";
    $ejecutar3 = $obj->conecta()->query($query);