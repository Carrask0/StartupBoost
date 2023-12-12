<?php

session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Obtener todas sesiones de la startup
$idStartup = $_SESSION['id'];

$consulta = "SELECT * FROM SesionMentoria WHERE idStartup = '$idStartup'";
$resultado = mysqli_query($conexion, $consulta);

echo "<h1>Sesiones de mentoría</h1>";
//Mostrar todas las sesiones
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<h2>Sesión: " . $fila['idSesionMentoria'] . "</h2>";
    echo "<p>Fecha: " . $fila['fechaSesion'] . "</p>";
    echo "<p>Objetivos: " . $fila['objetivos'] . "</p>";
    echo "<p>Resultado: " . $fila['resultado'] . "</p>";
    echo "<br>";
}
