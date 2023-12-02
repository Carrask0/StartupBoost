<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Recoger los datos del formulario
$nombrePrograma = $_POST['nombrePrograma'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];

//Insertar los datos en la base de datos
$consulta = "INSERT INTO Programa (nombrePrograma, tipo, descripcion, duracion) VALUES ('$nombrePrograma', '$tipo', '$descripcion', '$duracion')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_programas.php");
} else {
    echo "No se ha podido insertar";
}
