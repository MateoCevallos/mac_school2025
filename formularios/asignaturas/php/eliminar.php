<?php
require_once('modelo.php');
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
$obj = new clase_asignaturas();
$result = $obj->_eliminar($_POST['txt_codigo']);

// Verificar si se eliminaron filas (el valor de rowCount() debe ser mayor que 0 para ser exitoso)
if ($result > 0) {
    echo '<script>jQuery(function(){swal({
        title: "Eliminar Asignatura", text: "Registro Eliminado", type: "success", confirmButtonText: "Aceptar"
    }, function(){location.href = "../vistas/crud.php";});});</script>';
} else {
    echo '<script>jQuery(function(){swal({
        title: "Eliminar Asignatura", text: "Error al Eliminar", type: "error", confirmButtonText: "Aceptar"
    }, function(){location.href = "../vistas/crud.php";});});</script>';
}
?>
