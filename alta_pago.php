<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['rrhh_id'])) die("Acceso denegado");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
if (isset($data['dni'], $data['monto'], $data['tipo'], $data['mes'])) {
    $dni = $data['dni'];
    $monto = $data['monto'];
    $tipo = $data['tipo'];
    $mes = $data['mes'];
    $fecha = date("Y-m-d");

    $sql = $con->prepare("SELECT id FROM empleados WHERE dni = ?");
    $sql->bind_param("s", $dni);
    $sql->execute();
    $empleado = $sql->get_result()->fetch_assoc();

    if ($empleado) {
        $empleado_id = $empleado['id'];
        $sql = $con->prepare("INSERT INTO pagos (empleado_id, monto, tipo, mes, fecha) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("idsis", $empleado_id, $monto, $tipo, $mes, $fecha);
        echo json_encode(['success' => $sql->execute()]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Empleado no encontrado']);
    }
}
?>
