<?php


session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

echo "Conexión con la base de datos establecida";

//Recoger los datos del formulario
$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$experiencia = $_POST['experiencia'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];


//Generar un id para el mentor (numerico)
$consulta = "SELECT MAX(idMentor) FROM Mentor";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($resultado);
$idMentor = $fila[0] + 1;


//Insertar los datos en la base de datos
$consulta = "INSERT INTO Mentor (idMentor, nombreMentor, especialidad, experiencia, correo, tlf) VALUES ('$idMentor', '$nombre', '$especialidad', '$experiencia', '$correo', '$telefono')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "Se ha insertado correctamente";
} else {
    echo "No se ha podido insertar";
}

