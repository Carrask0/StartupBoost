<?php

session_start();

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/auth_inversor.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

$idStartup = $_POST['idStartup'];
$cantidad = $_POST['cantidad'];
$idInversor = $_SESSION['id'];

//Insertar los datos en la base de datos
$consulta = "INSERT INTO Inversion (idStartup, idInversor, cantidad) VALUES ('$idStartup', '$idInversor', '$cantidad')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_startups.php");
} else {
    echo "No se ha podido insertar";
}
