<?php

class Conexion {
    
function conecta(){
    $servername = "localhost"; // Por lo general, es "localhost" si la base de datos está en el mismo servidor que tu aplicación.
    $username = "root"; // El nombre de usuario de tu base de datos.
    $password = ""; // La contraseña de tu base de datos.
    $dbname = "bdrestaurantes"; // El nombre de tu base de datos.

    // Intenta conectarte a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}

}
