<?php

if (isset($_POST["nombre"]) && isset($_POST["cedula"]) && isset($_POST["contrasena"]) && isset($_POST["confirmar_contrasena"])) {

    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $contrasena = $_POST["contrasena"];
    $confirmar_contrasena = $_POST["confirmar_contrasena"];

    if ($contrasena !== $confirmar_contrasena) {
        echo "<script>alert('Error: Las contraseñas no coinciden.'); window.history.back();</script>";
        exit();
    }

    $ruta_archivo = "usuarios.json";

    if (!file_exists($ruta_archivo)) {
        file_put_contents($ruta_archivo, "[]");
    }

    $contenido = file_get_contents($ruta_archivo);
    $usuarios = json_decode($contenido, true);

    foreach ($usuarios as $usuario) {
        if ($usuario["cedula"] === $cedula) {
            echo "<script>alert('Error: La cédula ya está registrada.'); window.history.back();</script>";
            exit();
        }
    }

    $nuevo_usuario = array(
        "nombre" => $nombre,
        "cedula" => $cedula,
        "contrasena" => $contrasena
    );

    $usuarios[] = $nuevo_usuario;
    file_put_contents($ruta_archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

    echo "<script>alert('Registro exitoso.'); window.location.href = '../html/login.html';</script>";

} else {
    echo "<script>alert('Error: Faltan datos del formulario.'); window.history.back();</script>";
}

?>
