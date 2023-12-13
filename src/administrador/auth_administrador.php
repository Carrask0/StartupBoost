<?

session_start();

$id = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipoUsuario'];

if ($tipoUsuario != 'administrador') {
    $error = "Error de autenticación";
    header("Location: ../../login_form.html?error=$error");
    exit();
}
