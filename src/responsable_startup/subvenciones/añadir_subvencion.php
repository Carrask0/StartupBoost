<?php

session_start();

require_once __DIR__ . '/../../../config.php';
require_once __DIR__ . '/../auth_responsable_startup.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

$idStartup = $_SESSION['id'];
$idConvocatoria = $_POST['idConvocatoria'];
$cantidad = $_POST['cantidad'];
//Fecha actual
$fechaConcesion = date("Y-m-d");

if ($cantidad <= 0) {
    $error = "La cantidad debe ser mayor que 0";
    header("Location: form_subvencion.html?error=$error");
    exit();
}

//Insertar los datos en la base de datos
$consulta = "INSERT INTO Subvencion (idStartup, idConvocatoria, cantidad, fechaConcesion) VALUES ('$idStartup', '$idConvocatoria', '$cantidad', '$fechaConcesion')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: ../opciones_startup.html");
} else {
    echo "No se ha podido insertar";
}
