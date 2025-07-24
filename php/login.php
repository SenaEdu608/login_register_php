<?php

if (isset($_POST["cedula"]) && isset($_POST["contrasena"])) {

    $cedula = $_POST["cedula"];
    $contrasena = $_POST["contrasena"];

    $ruta_archivo = "usuarios.json";

    if (!file_exists($ruta_archivo)) {
        echo "<script>alert('Error: No hay usuarios registrados.'); window.history.back();</script>";
        exit();
    }

    $contenido = file_get_contents($ruta_archivo);
    $usuarios = json_decode($contenido, true);

    $usuario_encontrado = null;

    foreach ($usuarios as $usuario) {
        if ($usuario["cedula"] === $cedula && $usuario["contrasena"] === $contrasena) {
            $usuario_encontrado = $usuario;
            break;
        }
    }

    if ($usuario_encontrado !== null) {
        session_start();
        $_SESSION["nombre"] = $usuario_encontrado["nombre"];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Error: Cédula o contraseña incorrecta.'); window.history.back();</script>";
        exit();
    }

} else {
    echo "<script>alert('Error: Faltan datos del formulario.'); window.history.back();</script>";
}

?>

