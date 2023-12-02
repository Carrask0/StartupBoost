<?php

session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");



//Eliminar el mentor
$idMentor = $_POST['idMentor'];
$consulta = "DELETE FROM Mentor WHERE idMentor = '$idMentor'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "Se ha eliminado correctamente";
    redirectListadoMentores();
} else {
    echo "No se ha podido eliminar";
}

//Redirigir a la página de listado de mentores
function redirectListadoMentores()
{
    header("Location: listado_mentores.php");
    exit;
}

