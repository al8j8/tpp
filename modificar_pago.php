<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['rrhh_id'])) die("Acceso denegado");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
if (isset($data['id'], $data['monto'], $data['tipo'], $data['mes'])) {
    $id = $data['id'];
    $monto = $data['monto'];
    $tipo = $data['tipo'];
    $mes = $data['mes'];

    $sql = $con->prepare("UPDATE pagos SET monto = ?, tipo = ?, mes = ? WHERE id = ?");
    $sql->bind_param("dsii", $monto, $tipo, $mes, $id);
    echo json_encode(['success' => $sql->execute()]);
}
?>
