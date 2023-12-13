<?

session_start();

$tipoUsuario = $_SESSION['tipoUsuario'];

if ($tipoUsuario != 'mentor') {
    $error = "Error de autenticación";
    header("Location: /../src/login_form.html?error=$error");
    exit();
}
