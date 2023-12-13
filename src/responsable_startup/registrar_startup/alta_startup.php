<?php

session_start();

require_once __DIR__ . '/../../../config.php';

//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

//Recoger los datos del formulario

$nombre = $_POST['nombre'];
$sector = $_POST['sector'];
$descripcion = $_POST['descripcion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estado = "pendiente";


$id = $_SESSION['id'];

// Si la startup existe no se hace nada
$consulta = "SELECT * FROM Startup WHERE idStartup = '$id'";
$resultado = mysqli_query($conexion, $consulta);
$numero_filas = mysqli_num_rows($resultado);

if ($numero_filas > 0) {
    header("Location: ../opciones_startup.html");
    exit();
}

function validarDatos($nombre, $sector, $descripcion, $correo, $telefono)
{
    $errores = "";

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($sector) || empty($descripcion) || empty($correo) || empty($telefono)) {
        return $errores = "Todos los campos son obligatorios.";
    }

    // Verificar formato de correo electrónico con expresión regular
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $correo)) {
        return $errores =  "El formato del correo electrónico no es válido.";
    }

    // Verificar formato de número de teléfono (solo números y al menos 9 dígitos)
    if (!preg_match('/^\d{9,}$/', $telefono)) {
        $errores =  "El formato del número de teléfono no es válido.";
    }

    // Si hay errores, se devuelve el array
    if (!empty($errores)) {
        return $errores;
    }

    // Si pasa todas las validaciones
    return null;
}

// Validar los datos
$validacion = validarDatos($nombre, $sector, $descripcion, $correo, $telefono);

if ($validacion !== null) {
    $error = $validacion;
    header("Location: form_intro_datos_startup.html?error=$error");
    exit();
} else {

    //Comprobar que no exista ya una startup con ese nombre
    $consulta = "SELECT * FROM Startup WHERE nombreStartup = '$nombre'";
    $resultado = mysqli_query($conexion, $consulta);
    $numero_filas = mysqli_num_rows($resultado);

    if ($numero_filas > 0) {

        $error = "Ya existe una startup con ese nombre.";
        header("Location: form_intro_datos_startup.html?error=$error");
        exit();
    } else {

        //Insertar los datos en la base de datos
        $consulta = "INSERT INTO Startup (nombreStartup, descripcion, sector, estado, correo, tlf) VALUES ('$nombre', '$descripcion', '$sector', '$estado', '$correo', '$telefono')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            header("Location: ../opciones_startup.html");
        } else {
            $error = "No se ha podido insertar.";
            header("Location: form_intro_datos_startup.html?error=$error");
            exit();
        }
    }
}
