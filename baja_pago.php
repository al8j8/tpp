<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['rrhh_id'])) die("Acceso denegado");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
if (isset($data['id'])) {
    $id = $data['id'];

    $sql = $con->prepare("DELETE FROM pagos WHERE id = ?");
    $sql->bind_param("i", $id);
    echo json_encode(['success' => $sql->execute()]);
}
?>
