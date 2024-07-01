<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['rrhh_id'])) die("Acceso denegado");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
if (isset($data['dni'])) {
    $dni = $data['dni'];

    $sql = $con->prepare("SELECT id FROM empleados WHERE dni = ?");
    $sql->bind_param("s", $dni);
    $sql->execute();
    $empleado = $sql->get_result()->fetch_assoc();

    if ($empleado) {
        $empleado_id = $empleado['id'];
        $sql = $con->prepare("SELECT * FROM pagos WHERE empleado_id = ?");
        $sql->bind_param("i", $empleado_id);
        $sql->execute();
        $pagos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['success' => true, 'pagos' => $pagos]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Empleado no encontrado']);
    }
}
?>
