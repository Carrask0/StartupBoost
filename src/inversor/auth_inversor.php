<?

session_start();

$tipoUsuario = $_SESSION['inversor'];

if ($tipoUsuario != 'inversor') {
    $error = "Error de autenticación";
    echo "<p>$tipoUsuario</p>";
    //header("Location: ../../login_form.html?error=$error");
    exit();
}
