<?php
// Conexión al usuario dentro de la VPS
$conexion = new mysqli("localhost", "eduardo_bd", "4h91", "lavanderia_bd");
//$conexion = new mysqli("localhost", "root", "", "JME_LAV");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>