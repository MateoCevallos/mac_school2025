<?php
require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
// Tomar los valores del formulario
$nombre       = isset($_POST['txt_nombre'])       ? $_POST['txt_nombre']       : '';
$observacion  = isset($_POST['txt_observacion'])  ? $_POST['txt_observacion']  : '';

// Por si acaso, forzamos a string (nunca null)
$observacion = ($observacion === null) ? '' : $observacion;

// Crear objeto y llamar al insertar
$obj = new clase_asignaturas();
$result = $obj->_insertar($nombre, $observacion);

if ($result) {
    echo '<script>jQuery(function(){swal({
        title:"Añadir Asignatura", text:"Registro Guardado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/crud.php";});});</script>';
} else {
    echo '<script>jQuery(function(){swal({
        title:"Añadir Asignatura", text:"Error al Guardar", type:"error", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/crud.php";});});</script>';
}
?>
