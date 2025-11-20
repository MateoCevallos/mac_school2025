<!doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nueva Asignatura</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/controlador_insertar.php" method="post">
        <div>
            <h2 class="text-primary">Nueva Asignatura</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-2">Nombre</label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" maxlength="200" required>
            </div>
            <div class="form-group row">
                <label class="col-2">Observación</label>
                <input type="text" class="form-control col-4" name="txt_observacion" id="txt_observacion" maxlength="100">
            </div>
      
            <div class="form-group row">
                <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='../vistas/crud.php'">Cerrar</button>
                </label>
            </div>

        </div>
    </form>
</body>
</html>
