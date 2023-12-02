<?php


session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

echo "Conexión con la base de datos establecida";

//Recoger los datos del formulario
$nombre = $_POST['nombre'];
$sector = $_POST['sector'];
$descripcion = $_POST['descripcion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estado = "pendiente";

//Generar un id para la startup (numerico)
$consulta = "SELECT MAX(idStartup) FROM Startup";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($resultado);
$idStartup = $fila[0] + 1;

//Comprobar que no exista ya una startup con ese nombre
$consulta = "SELECT * FROM Startup WHERE nombreStartup = '$nombre'";
$resultado = mysqli_query($conexion, $consulta);
$numero_filas = mysqli_num_rows($resultado);

if ($numero_filas > 0) {
    echo "Ya existe una startup con ese nombre";
} else {
    //Insertar los datos en la base de datos
    $consulta = "INSERT INTO Startup (idStartup, nombreStartup, descripcion, sector, estado, correo, tlf) VALUES ('$idStartup', '$nombre', '$descripcion', '$sector', '$estado', '$correo', '$telefono')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Se ha insertado correctamente";
    } else {
        echo "No se ha podido insertar";
    }
}
