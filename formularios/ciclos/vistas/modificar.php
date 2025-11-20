<?php
// formularios/ciclos/vistas/modificar.php

require_once('../php/modelo.php');

$obj = new clase_ciclos();

// Tomar el id desde GET y validar
$v_id = $_GET['v_id'] ?? null;

if ($v_id === null) {
    // Si no viene el parámetro, volvemos al CRUD
    header('Location: crud.php');
    exit;
}

// Consultar datos del ciclo
$row  = $obj->_consultarcodigo($v_id);
$fila = $row ? $row->fetch() : false;

if (!$fila) {
    // Si no se encuentra, también volvemos al CRUD
    header('Location: crud.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de datos</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/actualizar.php" method="post">
        <!-- Código del ciclo -->
        <input type="hidden" id="txt_codigo" name="txt_codigo"
               value="<?php echo htmlspecialchars($fila['CIC_CODI'], ENT_QUOTES, 'UTF-8'); ?>">

        <div>
            <h2 class="text-primary">Actualizar Ciclo</h2>
        </div>

        <div class="container">
            <div class="form-group row mb-3">
                <label class="col-2 col-form-label">Nombre de ciclo</label>
                <div class="col-10">
                    <input type="text"
                           class="form-control"
                           name="txt_nombre"
                           id="txt_nombre"
                           maxlength="20"
                           required
                           value="<?php echo htmlspecialchars($fila['CIC_NOMBRE'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-2 col-form-label">Observación</label>
                <div class="col-10">
                    <input type="text"
                           class="form-control"
                           name="txt_observacion"
                           id="txt_observacion"
                           maxlength="50"
                           value="<?php echo htmlspecialchars($fila['CIC_OBSERV'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <a href="crud.php" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
