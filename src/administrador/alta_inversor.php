<?php


session_start();

require_once __DIR__ . '/../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");


//Recoger los datos del formulario
$nombreInversor = $_POST['nombreInversor'];
$correo = $_POST['correo'];
$tlf = $_POST['tlf'];


//Generar un id para el inversor (numerico)
$consulta = "SELECT MAX(idInversor) FROM Inversor";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($resultado);
$idInversor = $fila[0] + 1;


//Insertar los datos en la base de datos
$consulta = "INSERT INTO Inversor (idInversor, nombreInversor, correo, tlf) VALUES ('$idInversor', '$nombreInversor', '$correo', '$tlf')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "Se ha insertado correctamente";
    redirectListadoInversores();
} else {
    echo "No se ha podido insertar";
}

//Redirigir a la página de listado de mentores
function redirectListadoInversores()
{
    header("Location: listado_inversores.php");
    exit;
}

