<?php

// Verificamos si el formulario envió los campos "cedula" y "contrasena"
if (isset($_POST["cedula"]) && isset($_POST["contrasena"])) {

    // Guardamos los datos recibidos desde el formulario
    $cedula = $_POST["cedula"];
    $contrasena = $_POST["contrasena"];

    // Definimos la ruta del archivo donde están almacenados los usuarios
    $ruta_archivo = "usuarios.json";

    // Si el archivo no existe, mostramos un mensaje de error
    if (!file_exists($ruta_archivo)) {
        echo "<script>alert('Error: No hay usuarios registrados.'); window.history.back();</script>";
        exit();
    }

    // Leemos el contenido del archivo JSON y lo convertimos en un arreglo (array)
    $contenido = file_get_contents($ruta_archivo);
    $usuarios = json_decode($contenido, true);

    // Inicializamos una variable para guardar el usuario si lo encontramos
    $usuario_encontrado = null;

    // Recorremos todos los usuarios registrados
    foreach ($usuarios as $usuario) {

        // Comparamos los datos ingresados con los que están guardados
        if ($usuario["cedula"] === $cedula && $usuario["contrasena"] === $contrasena) {
            $usuario_encontrado = $usuario; // Si hay coincidencia, guardamos el usuario
            break; // Salimos del ciclo porque ya lo encontramos
        }
    }

    // Si el usuario fue encontrado, iniciamos la sesión
    if ($usuario_encontrado !== null) {
        session_start(); // Iniciamos la sesión para guardar datos temporales
        $_SESSION["nombre"] = $usuario_encontrado["nombre"]; // Guardamos el nombre del usuario
        header("Location: dashboard.php"); // Redireccionamos al dashboard
        exit();
    } else {
        // Si los datos no coinciden con ningún usuario, mostramos un error
        echo "<script>alert('Error: Cédula o contraseña incorrecta.'); window.history.back();</script>";
        exit();
    }

} else {
    // Si no llegaron los datos del formulario, mostramos un error
    echo "<script>alert('Error: Faltan datos del formulario.'); window.history.back();</script>";
}

?>
