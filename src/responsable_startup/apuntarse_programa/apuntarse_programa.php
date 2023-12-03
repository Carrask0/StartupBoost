<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

$idPrograma = $_GET['idPrograma'];
$idStartup = $_SESSION['idStartup'];

$consulta = "INSERT INTO Programa_startup VALUES ('$idPrograma', '$idStartup')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: /../opciones_startup.html");
} else {
    echo "No se ha podido eliminar";
}
