<?php

session_start();

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/auth_responsable_startup.php';
echo " <link rel='stylesheet' href='/../../styles.css'>";

$validation = $_SESSION['validation'];
echo "<p>Validation: " . $validation . "</p>";
if ($validation == "false") {
    echo "<p>No tienes permisos para acceder a esta página</p>";
    header("Location: /../login_form.html");
}

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Obtener todas sesiones de la startup
$idStartup = $_SESSION['id'];

$consulta = "SELECT * FROM SesionMentoria WHERE idStartup = '$idStartup'";
$resultado = mysqli_query($conexion, $consulta);

echo "<h1 class='titulo'>Sesiones de mentoría</h1>";
echo ("<hr class='hr2'>");
//Mostrar todas las sesiones
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<h2>Sesión: " . $fila['idSesionMentoria'] . "</h2>";
    echo "<p>Fecha: " . $fila['fechaSesion'] . "</p>";
    echo "<p>Objetivos: " . $fila['objetivos'] . "</p>";
    echo "<p>Resultado: " . $fila['resultado'] . "</p>";
    echo "<br>";
}
if (mysqli_num_rows($resultado) == 0) {
    echo "<p>No hay sesiones de mentoría registradas</p>";
}
