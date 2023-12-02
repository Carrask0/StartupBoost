<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Recoger los datos del formulario
$nombre = $_POST['nombreMentor'];
$especialidad = $_POST['especialidad'];
$experiencia = $_POST['experiencia'];
$correo = $_POST['correo'];
$telefono = $_POST['tlf'];

//Insertar los datos en la base de datos
$consulta = "INSERT INTO Mentor (nombreMentor, especialidad, experiencia, correo, tlf) VALUES ('$nombre', '$especialidad', '$experiencia', '$correo', '$telefono')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {

    header("Location: listado_mentores.php");
} else {
    echo "No se ha podido insertar";
}
