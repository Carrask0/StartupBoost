<?php


session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");


//Recoger los datos del formulario
$idMentor = $_GET['idMentor'];

//Actualizar los datos en la base de datos
$consulta = "UPDATE Mentor SET nombre = '$nombre', especialidad = '$especialidad', experiencia = '$experiencia', correo = '$correo', telefono = '$telefono' WHERE idMentor = '$idMentor'";
$resultado = mysqli_query($conexion, $consulta);


if ($resultado) {
    echo "Se han actualizado los datos correctamente";
    redirectListadoMentores();
} else {
    echo "No se ha podido actualizar";
}

//Redirigir a la página de listado de mentores
function redirectListadoMentores()
{
    header("Location: listado_mentores.php");
    exit;
}

