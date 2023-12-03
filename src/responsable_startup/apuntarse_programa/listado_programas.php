<?php

session_start();

require_once __DIR__ . '/../../../config.php';
echo " <link rel='stylesheet' href='/../../../styles.css'>";

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Seleccionar todos los mentores
$consulta = "SELECT * FROM Programa";
$resultado = mysqli_query($conexion, $consulta);

//Visualizar todos los mentores
$numero_filas = mysqli_num_rows($resultado);
$numero_columnas = mysqli_num_fields($resultado);

echo "<h1>Programas</h1>";
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
    echo "<td><a href='apuntarse_programa.php?idPrograma=" . $fila[0] . "'>Apuntarse</a></td>";
    echo "</tr>";
}
echo "</table>";
