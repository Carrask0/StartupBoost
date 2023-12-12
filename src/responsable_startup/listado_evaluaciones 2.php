<?php

session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Obtener todas evaluaciones de la startup
$idStartup = $_SESSION['id'];

$consulta = "SELECT * FROM Evaluacion WHERE idStartup = '$idStartup'";
$resultado = mysqli_query($conexion, $consulta);

echo "<h1>Evaluaciones</h1>";
//Mostrar todas las evaluaciones
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<h2>Evaluacion: " . $fila['idEvaluacion'] . "</h2>";
    echo "<p>Comentario: " . $fila['comentario'] . "</p>";
    echo "<p>Resultado: " . $fila['resultado'] . "</p>";
    echo "<br>";
}