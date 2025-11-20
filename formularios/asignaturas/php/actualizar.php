<?php
require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
// Validación mínima para evitar notificaciones
$nombre   = isset($_POST['txt_nombre'])  ? $_POST['txt_nombre']  : '';
$observa  = isset($_POST['txt_observa']) ? $_POST['txt_observa'] : '';
$codigo   = isset($_POST['txt_codigo'])  ? $_POST['txt_codigo']  : 0;

// Crear un objeto de la clase asignaturas
$obj = new clase_asignaturas();

// Ejecutar la función de actualización
$result = $obj->_actualizar($nombre, $observa, $codigo);

// Verificar si la actualización fue exitosa
if ($result > 0) {
    echo '<script>
        jQuery(function(){ 
            swal({
                title: "Actualización de Asignatura", 
                text: "Registro Actualizado", 
                type: "success", 
                confirmButtonText: "Aceptar"
            }, function(){
                location.href="../vistas/crud.php";
            });
        });
    </script>';
} else {
    echo '<script>
        jQuery(function(){ 
            swal({
                title: "Actualización de Asignatura", 
                text: "Error al Actualizar", 
                type: "error", 
                confirmButtonText: "Aceptar"
            }, function(){
                location.href="../vistas/crud.php";
            });
        });
    </script>';
}
?>
