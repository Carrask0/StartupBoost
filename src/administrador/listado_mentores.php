<?php

session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");


//Seleccionar todos los mentores
$consulta = "SELECT * FROM Mentor";
$resultado = mysqli_query($conexion, $consulta);

//Visualizar todos los mentores
$numero_filas = mysqli_num_rows($resultado);
$numero_columnas = mysqli_num_fields($resultado);

echo "<h2>Mentores</h2>";
echo "<table border='1'><tr>";
for ($i = 0; $i < $numero_columnas; $i++) {
    $nombreColumna = mysqli_fetch_field_direct($resultado, $i)->name;
    echo "<th>$nombreColumna</th>";
}
echo "</tr>";
for ($i = 0; $i < $numero_filas; $i++) {
    $fila = mysqli_fetch_array($resultado);
    echo "<tr>";
    for ($j = 0; $j < $numero_columnas; $j++) {
        echo "<td>" . $fila[$j] . "</td>";
    }
    echo "<td><form action='eliminar_mentor.php' method='post'><input type='hidden' name='idMentor' value='" . $fila[0] . "'><input type='submit' value='Eliminar'></form></td>";
    echo "<td><form action='form_actualizar_mentor.php' method='post'><input type='hidden' name='idMentor' value='" . $fila[0] . "'><input type='submit' value='Actualizar'></form></td>";

    echo "</tr>";
}
echo "</table>";

function redirectEliminarMentor($idMentor)
{
    $_SESSION['idMentor'] = $idMentor;
    header("Location: eliminar_mentor.php");
    exit;
}