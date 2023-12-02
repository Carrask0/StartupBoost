<?php
require_once __DIR__ . '/config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

echo "Conexión con la base de datos establecida";

//Visualizar todas las tablas de la base de datos
$consulta = "SHOW TABLES";
$resultado = mysqli_query($conexion, $consulta);

echo "<br>Nombres tablas: <br>";
while ($fila = mysqli_fetch_array($resultado)) {
    echo $fila[0] . " - ";
}

// Tablas: Evento - Evento_Mentor - Inversion - Inversor - Inversor_Evento - Mentor - Programa - Programa_startup - Startup - Startup_Evento - Subvencion
$nombresTablas = array("Evento", "Evento_Mentor", "Inversion", "Inversor", "Inversor_Evento", "Mentor", "Programa", "Programa_startup", "Startup", "Startup_Evento", "Subvencion");
for ($i = 0; $i < count($nombresTablas); $i++) {
    $consulta = "SELECT * FROM " . $nombresTablas[$i];
    $resultado = mysqli_query($conexion, $consulta);

    // Mostrar tablas
    echo "<br><br>Tabla: " . $nombresTablas[$i] . "<br>";
    echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        for ($j = 0; $j < count($fila) / 2; $j++) {
            echo "<td>" . $fila[$j] . "</td>";
        }
        echo "</tr>";
    }
}
