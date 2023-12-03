<?php

session_start();

require_once __DIR__ . '/../../../config.php';
echo " <link rel='stylesheet' href='/../../../styles.css'>";

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

// Mostrar todos los mentores
$consulta = "SELECT * FROM Mentor";
$resultado = mysqli_query($conexion, $consulta);

$num_filas = mysqli_num_rows($resultado);

echo "<h1>Mentores</h1>";
if ($num_filas == 0) {
    echo "No hay mentores disponibles";
    exit();
}
echo "<table>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Especialidad</th>";
echo "<th>Experiencia</th>";
echo "<th>Correo</th>";
echo "<th>Teléfono</th>";
echo "<th>Asignar</th>";
echo "</tr>";

while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['nombreMentor'] . "</td>";
    echo "<td>" . $fila['especialidad'] . "</td>";
    echo "<td>" . $fila['experiencia'] . "</td>";
    echo "<td>" . $fila['correo'] . "</td>";
    echo "<td>" . $fila['tlf'] . "</td>";
    echo "<td><a href='listado_startups_asignar.php?idMentor=" . $fila['idMentor'] . "'>Asignar</a></td>";
    echo "</tr>";
}
