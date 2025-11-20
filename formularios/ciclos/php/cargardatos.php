<?php
require_once('modelo.php');

header('Content-Type: application/json; charset=utf-8');

$codigo = isset($_POST['codigo'])
    ? filter_var($_POST['codigo'], FILTER_SANITIZE_NUMBER_INT)
    : 0;

if ($codigo <= 0) {
    echo json_encode(["error" => "Código de ciclo inválido"]);
    exit;
}

$obj = new clase_ciclos();
$row = $obj->_consultarcodigo($codigo);

if ($row && $fila = $row->fetch(PDO::FETCH_ASSOC)) {
    echo json_encode([
        "v_nombre" => $fila['CIC_NOMBRE'],
        "v_observ" => $fila['CIC_OBSERV']
    ]);
} else {
    echo json_encode(["error" => "Ciclo no encontrado"]);
}
