<?php
require_once('modelo.php');

header('Content-Type: application/json; charset=utf-8');

// Sanitizar código recibido
$codigo = isset($_POST['codigo'])
    ? filter_var($_POST['codigo'], FILTER_SANITIZE_NUMBER_INT)
    : 0;

if ($codigo <= 0) {
    echo json_encode(array("error" => "Código de asignatura inválido"));
    exit;
}

// Usar la clase de ASIGNATURAS
$obj = new clase_asignaturas();
$row = $obj->_consultarcodigo($codigo);

if ($row && $fila = $row->fetch(PDO::FETCH_ASSOC)) {
    echo json_encode(array(
        "v_nombre" => $fila['ASIG_NOMBRE'],
        "v_observ" => $fila['ASIG_OBSERV']
    ));
} else {
    echo json_encode(array("error" => "Asignatura no encontrada"));
}
