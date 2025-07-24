<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    echo "Acceso no autorizado. <a href='../html/login.html'>Inicia sesión aquí</a>";
    exit();
}

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
  <h1>Bienvenido, <?php echo $nombre_usuario; ?>!</h1>
  <p>Has iniciado sesión correctamente.</p>
</body>
</html>
