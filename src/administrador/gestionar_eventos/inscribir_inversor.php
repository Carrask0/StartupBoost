<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

$idEvento = $_POST['idEvento'];
$idInversor = $_POST['idInversor'];

//Insertar los datos en la base de datos
$consulta = "INSERT INTO Inversor_Evento (idEvento, idInversor) VALUES ('$idEvento', '$idInversor')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_eventos.php");
} else {
    echo "No se ha podido insertar";
}