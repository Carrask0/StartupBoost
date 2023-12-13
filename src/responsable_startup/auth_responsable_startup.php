<?

session_start();

$tipoUsuario = $_SESSION['tipoUsuario'];

if ($tipoUsuario != 'responsable_startup') {
    $_SESSION['validation'] = "false";
} else {
    $_SESSION['validation'] = "true";
}
