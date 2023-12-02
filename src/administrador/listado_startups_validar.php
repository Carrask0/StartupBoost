<?php

session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

echo "Conexión con la base de datos establecida"; //TODO: remove

//Seleccionar todas las startups que estén en estado pendiente
$consulta = "SELECT * FROM Startup WHERE estado = 'pendiente'";
$resultado = mysqli_query($conexion, $consulta);
