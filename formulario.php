<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pagos</title>
</head>
<body>
    <h1>Gestión de Pagos</h1>

    <!-- Alta de Pago -->
    <form action="alta_pago.php" method="post">
        <h2>Alta de Pago</h2>
        <label for="dni">DNI del Empleado:</label>
        <input type="text" name="dni" required><br>

        <label for="tipo">Tipo de Pago:</label>
        <select name="tipo" required>
            <option value="adelanto">Adelanto</option>
            <option value="mes">Pago del Mes</option>
        </select><br>

        <label for="mes">Mes (en número):</label>
        <input type="number" name="mes" min="1" max="12" required><br>

        <input type="submit" value="Registrar Pago">
    </form>

    <!-- Modificación de Pago -->
    <form action="modificar_pago.php" method="post">
        <h2>Modificar Pago</h2>
        <label for="id">ID del Pago:</label>
        <input type="text" name="id" required><br>

        <label for="tipo">Tipo de Pago:</label>
        <select name="tipo" required>
            <option value="adelanto">Adelanto</option>
            <option value="mes">Pago del Mes</option>
        </select><br>

        <label for="mes">Mes (en número):</label>
        <input type="number" name="mes" min="1" max="12" required><br>

        <input type="submit" value="Modificar Pago">
    </form>

    <!-- Baja de Pago -->
    <form action="baja_pago.php" method="post">
        <h2>Baja de Pago</h2>
        <label for="id">ID del Pago:</label>
        <input type="text" name="id" required><br>

        <input type="submit" value="Eliminar Pago">
    </form>

    <!-- Historial de Pagos de un Empleado -->
    <form action="historial_pagos.php" method="post">
        <h2>Historial de Pagos de un Empleado</h2>
        <label for="dni">DNI del Empleado:</label>
        <input type="text" name="dni" required><br>

        <input type="submit" value="Ver Historial">
    </form>

    <!-- Verificación de Adelantos -->
    <form action="verificacion_adelantos.php" method="post">
        <h2>Verificación de Adelantos</h2>
        <label for="dni">DNI del Empleado:</label>
        <input type="text" name="dni" required><br>

        <label for="mes">Mes (en número):</label>
        <input type="number" name="mes" min="1" max="12" required><br>

        <input type="submit" value="Verificar Adelantos">
    </form>
</body>
</html>
