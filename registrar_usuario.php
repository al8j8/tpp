<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $con->prepare("INSERT INTO usuarios (username, passwordHash) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $passwordHash);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form action="registrar_usuario.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
