<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Eliminar el inversor
$idInversor = $_GET['idInversor'];
$consulta = "DELETE FROM Inversor WHERE idInversor = '$idInversor'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_inversores.php");
} else {
    echo "No se ha podido eliminar";
}