<?php

session_start();

require_once __DIR__ . '/../config.php';



//Conectar con la base de datos
$conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("No se ha podido conectar con la base de datos");

$tipoUsuario = $_POST['tipoUsuario'];
$idUsuario = $_POST['idUsuario'];

switch ($tipoUsuario) {
    case 'administrador':
        header("Location: administrador/opciones_administrador.html");
        break;
    case 'responsable_startup':
        // Verificar si la startup ya existe
        $consultaExiste = "SELECT * FROM Startup WHERE idStartup = '$idUsuario'";
        $resultadoExiste = mysqli_query($conexion, $consultaExiste);
        if (mysqli_num_rows($resultadoExiste) == 0) {
            // Si no existe, insertar la nueva startup
            $consultaInsertar = "INSERT INTO Startup (idStartup) VALUES ('$idUsuario')";
            $resultado = mysqli_query($conexion, $consultaInsertar);
            if (!$resultado) {
                echo "Error al insertar la startup";
                exit();
            }
            header("Location: responsable_startup/registrar_startup/form_intro_datos_startup.html");
        }
        // Redirigir o manejar la sesión independientemente de si se insertó o ya existía
        $_SESSION['id'] = $idUsuario;
        $_SESSION['tipoUsuario'] = $tipoUsuario;
        header("Location: responsable_startup/opciones_startup.html");
        break;
    case 'inversor':
        $consulta = "SELECT * FROM Inversor WHERE idInversor = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        $numFilas = mysqli_num_rows($resultado);
        if ($numFilas > 0) {
            $_SESSION['id'] = $idUsuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            header("Location: inversor/opciones_inversor.html");
        } else {
            header("Location: login_form.html");
        }
        break;
    case 'mentor':
        $consulta = "SELECT * FROM Mentor WHERE idMentor = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        $numFilas = mysqli_num_rows($resultado);
        if ($numFilas > 0) {
            $_SESSION['id'] = $idUsuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            header("Location: mentor/opciones_mentor.html");
        } else {
            header("Location: login_form.html");
        }
        break;
    default:
        header("Location: login_form.html");
        break;
}
