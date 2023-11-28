<?php
// Estos parametros se modifican dependiendo de el dispositivo donde se registre.
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'b4k3dp0t4t0'; //esta contra es solo de mi laptop (jose) en caso se cargar el sistema en otra, debe cambiarse
$dbName = 'papeleria';


$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} 
?>