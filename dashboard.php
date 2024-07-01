<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    <nav>
        <ul>
            <li><a href="alta_pago.php">Registrar Pago</a></li>
            <li><a href="modificar_pago.php">Modificar Pago</a></li>
            <li><a href="eliminar_pago.php">Eliminar Pago</a></li>
            <li><a href="historial_pagos.php">Historial de Pagos</a></li>
            <li><a href="verificar_adelantos.php">Verificar Adelantos</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
</body>
</html>
