<?php 
# CONEXIÓN A LA BASE DE DATOS
$host = "localhost";
$db = "musicbox";
$username = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    if($conexion){
        //echo "CONEXIÓN EXITOSA: Base de datos: ".$db;
    }
} catch (Exception $e) {
    echo "NO SE PUDO CONECTAR A LA SE DE DATOS --- ". $e->getMessage();
}

?>
