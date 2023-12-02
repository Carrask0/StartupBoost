<?php


session_start();

require_once __DIR__ . '/../../../config.php';
echo " <link rel='stylesheet' href='/../../../styles.css'>";

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");


//Recoger los datos del formulario
$nombreInversor = $_POST['nombreInversor'];
$correo = $_POST['correo'];
$tlf = $_POST['tlf'];

// Insertar los datos en la base de datos
$consulta = "INSERT INTO Inversor (nombreInversor, correo, tlf) VALUES ('$nombreInversor', '$correo', '$tlf')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    header("Location: listado_inversores.php");
} else {
    echo "No se ha podido insertar";
}
