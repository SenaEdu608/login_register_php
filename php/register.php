<?php

// Verificamos que todos los datos requeridos del formulario hayan sido enviados
if (isset($_POST["nombre"]) && isset($_POST["cedula"]) && isset($_POST["contrasena"]) && isset($_POST["confirmar_contrasena"])) {

    // Guardamos los datos enviados desde el formulario en variables
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $contrasena = $_POST["contrasena"];
    $confirmar_contrasena = $_POST["confirmar_contrasena"];

    // Validamos que la contraseña y su confirmación sean iguales
    if ($contrasena !== $confirmar_contrasena) {
        // Si no coinciden, mostramos un mensaje y volvemos atrás
        echo "<script>alert('Error: Las contraseñas no coinciden.'); window.history.back();</script>";
        exit();
    }

    // Definimos la ruta del archivo JSON donde se guardarán los usuarios
    $ruta_archivo = "usuarios.json";

    // Si el archivo no existe, lo creamos como un arreglo vacío
    if (!file_exists($ruta_archivo)) {
        file_put_contents($ruta_archivo, "[]");
    }

    // Leemos el contenido del archivo JSON y lo convertimos en un arreglo de PHP
    $contenido = file_get_contents($ruta_archivo);
    $usuarios = json_decode($contenido, true);

    // Recorremos todos los usuarios ya registrados para verificar que no exista la misma cédula
    foreach ($usuarios as $usuario) {
        if ($usuario["cedula"] === $cedula) {
            // Si encontramos la misma cédula, mostramos un mensaje de error
            echo "<script>alert('Error: La cédula ya está registrada.'); window.history.back();</script>";
            exit();
        }
    }

    // Si todo está correcto, creamos un nuevo usuario en forma de arreglo
    $nuevo_usuario = array(
        "nombre" => $nombre,
        "cedula" => $cedula,
        "contrasena" => $contrasena
    );

    // Agregamos el nuevo usuario al arreglo de usuarios
    $usuarios[] = $nuevo_usuario;

    // Guardamos el arreglo actualizado en el archivo JSON, con formato legible
    file_put_contents($ruta_archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

    // Mostramos un mensaje de éxito y redirigimos al formulario de inicio de sesión
    echo "<script>alert('Registro exitoso.'); window.location.href = '../html/login.html';</script>";

} else {
    // Si algún campo del formulario falta, mostramos un mensaje de error
    echo "<script>alert('Error: Faltan datos del formulario.'); window.history.back();</script>";
}

?>
