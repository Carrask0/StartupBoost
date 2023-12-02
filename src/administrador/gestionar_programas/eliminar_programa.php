<?php

session_start();

require_once __DIR__ . '/../../../config.php';
echo " <link rel='stylesheet' href='/../../../styles.css'>";

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Eliminar el mentor
$idPrograma = $_POST['idPrograma'];
$consulta = "DELETE FROM Programa WHERE idPrograma = '$idPrograma'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_programas.php");
} else {
    echo "No se ha podido eliminar";
}
