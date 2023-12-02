<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");


//Seleccionar todos los mentores
$consulta = "SELECT * FROM Inversor";
$resultado = mysqli_query($conexion, $consulta);

//Visualizar todos los inversores
$numero_filas = mysqli_num_rows($resultado);
$numero_columnas = mysqli_num_fields($resultado);

echo "<h2>Inversores</h2>";
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
    echo "<td><a href='eliminar_inversor.php?idInversor=" . $fila[0] . "'>Eliminar</a></td>";
    //Pass all parameters in the URL
    $parameters = array(
        'idInversor' => $fila[0],
        'nombreInversor' => $fila[1],
        'correo' => $fila[2],
        'tlf' => $fila[3]
    );
    echo "<td><a href='form_actualizar_inversor.html?" . http_build_query($parameters) . "'>Actualizar</a></td>";

    echo "</tr>";
}
echo "</table>";

function redirectEliminarInversor($idInversor)
{
    $_SESSION['idInversor'] = $idInversor;
    header("Location: eliminar_inversor.php");
    exit;
}