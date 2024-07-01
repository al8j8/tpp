<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['rrhh_id'])) die("Acceso denegado");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
if (isset($data['dni'], $data['mes'])) {
    $dni = $data['dni'];
    $mes = $data['mes'];

    $sql = $con->prepare("SELECT id FROM empleados WHERE dni = ?");
    $sql->bind_param("s", $dni);
    $sql->execute();
    $empleado = $sql->get_result()->fetch_assoc();

    if ($empleado) {
        $empleado_id = $empleado['id'];
        $sql = $con->prepare("SELECT * FROM pagos WHERE empleado_id = ? AND mes = ? AND tipo = 'adelanto'");
        $sql->bind_param("ii", $empleado_id, $mes);
        $sql->execute();
        $adelantos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['success' => true, 'adelantos' => $adelantos]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se encontraron adelantos']);
    }
}
?>
