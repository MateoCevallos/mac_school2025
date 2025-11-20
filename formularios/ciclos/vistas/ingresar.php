<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nuevo Ciclo</title>

        <!-- Bootstrap CSS -->
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- (Opcional) Bootstrap JS: realmente ya se carga en crud.php, así que podrías omitirlo -->
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

        <!-- jQuery y AJAX (también ya se cargan en crud.php, pero no afectan si quedan aquí) -->
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/controlador_insertar.php" method="post">
        <div>
            <h2 class="text-primary"> Nuevo Ciclo</h2>
        </div>
        <div class="container">
            <div class="form-group row mb-3">
                <label class="col-2 col-form-label">Nombre</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" maxlength="20" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-2 col-form-label">OBSERVACION</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="txt_observacion" id="txt_observacion" maxlength="50">
                </div>
            </div>
      
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <!-- Ahora cierra el modal -->
                    <button type="button" class="btn btn-secondary" onclick="cerrarModalFormulario()">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
