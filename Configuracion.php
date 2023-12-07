<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'b4k3dp0t4t0';
$dbName = 'papeleria';


$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} 
?>
