<?php 
require_once('../php/modelo.php');

// Verificar si 'v_id' está en la URL y es un número válido
if (isset($_GET['v_id']) && is_numeric($_GET['v_id'])) {
    $v_id = (int)$_GET['v_id'];  // Obtener el ID de la asignatura desde la URL

    // Obtener los detalles de la asignatura
    $obj = new clase_asignaturas();
    $row = $obj->_consultarcodigo($v_id);  // _consultarcodigo devuelve un PDOStatement

    // Obtener la fila
    $fila = $row->fetch(PDO::FETCH_ASSOC);

    // Verificar si realmente se encontró un registro
    if (!$fila) {
        echo "No se encontró la asignatura con el código proporcionado.";
        exit;
    }
} else {
    echo "ID de asignatura no válido o no proporcionado.";
    exit;
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de Asignatura</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/actualizar.php" method="post">
        <!-- El código de la asignatura está oculto en el formulario -->
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['ASIG_CODIGO']; ?>">
        <div>
            <h2 class="text-primary">Actualizar Asignatura</h2>
        </div>
        <div class="container">
            <!-- Campo para el nombre de la asignatura -->
            <div class="form-group row">
                <label class="col-2">Nombre de la Asignatura</label>
                <input type="text" class="form form-control col-4" 
                       name="txt_nombre" id="txt_nombre" maxlength="200" 
                       value="<?php echo $fila['ASIG_NOMBRE']; ?>" required>
            </div>
            <!-- Campo para las observaciones de la asignatura -->
            <div class="form-group row">
                <label class="col-2">Observación</label>
                <input type="text" class="form-control col-4" 
                       name="txt_observa" id="txt_observa" maxlength="100" 
                       value="<?php echo $fila['ASIG_OBSERV']; ?>">
            </div>
            
            <!-- Botones para guardar o cerrar -->
            <div class="form-group row">
                <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <a href="../vistas/crud.php" class="btn btn-secondary">Cerrar</a>
                </label>
            </div>
        </div>
    </form>
</body>
</html>
