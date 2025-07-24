<?php
// Iniciamos la sesión para poder acceder a los datos del usuario que se guardaron al iniciar sesión
session_start();

// Verificamos si existe una sesión activa con el nombre del usuario
if (!isset($_SESSION["nombre"])) {
    // Si no hay sesión iniciada, mostramos un mensaje y un enlace para volver al login
    echo "Acceso no autorizado. <a href='../html/login.html'>Inicia sesión aquí</a>";
    exit(); // Detenemos la ejecución del código
}

// Si la sesión existe, guardamos el nombre en una variable para usarlo en el saludo
$nombre_usuario = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
<link rel="stylesheet" href="../html/css/deshboard.css">
</head>
<body>
<!-- Mostramos un mensaje de bienvenida con el nombre del usuario -->
 <h1>Bienvenido, <?php echo $nombre_usuario; ?>!</h1>
 <p>Has iniciado sesión correctamente.</p>
</body>
</html>
