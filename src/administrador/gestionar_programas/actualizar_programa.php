<?php

session_start();

require_once __DIR__ . '/../../../config.php';
echo " <link rel='stylesheet' href='/../../../styles.css'>";

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Recoger los datos del formulario
$idPrograma = $_POST['idPrograma'];
$nombrePrograma = $_POST['nombrePrograma'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];

//Actualizar los datos en la base de datos
$consulta = "UPDATE Programa SET nombrePrograma = '$nombrePrograma', tipo = '$tipo', descripcion = '$descripcion', duracion = '$duracion' WHERE idPrograma = '$idPrograma'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_programas.php");
} else {
    echo "No se ha podido actualizar";
}
