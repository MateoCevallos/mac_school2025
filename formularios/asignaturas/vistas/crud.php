<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ASIGNATURAS</title>

        <!-- CSS -->
        <link href="/mac_school2025/Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- JS: primero jQuery, luego Bootstrap, luego ajax.js -->
        <script src="/mac_school2025/Libs/jquery.min.js"></script>
        <script src="/mac_school2025/Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="/mac_school2025/Libs/ajax.js"></script>

        <!-- Test: comprobar que la función existe -->
        <script>
            console.log("Tipo de ajax_buscar_asig:", typeof ajax_buscar_asig);
        </script>
    </head>

    <body onload="ajax_buscar_asig('');">
        <div class="alert alert-light">
            <h2 class="text-primary">Gestión de Asignaturas</h2>
            <button type="button" class="btn btn-success" onclick="abrirModalFormulario()">Nuevo</button>
            <button type="button" class="btn btn-success" onclick="reporte();">Reporte</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='/mac_school2025/formularios/'">← Volver al Panel Principal</button>
        </div>

        <div class="container alert alert-info col-5">
            <h3>Buscar</h3>
            <div class="row">
                <input type="text" class="form-control col-4" id="txt_buscar" name="txt_buscar"
                       onkeyup="ajax_buscar_asig(this.value);">
             </div>
        </div>

        <table id="tabla" name="tabla" class="table table-bordered">
            <thead class='bg-primary text-light text-center'>
                <tr>
                    <th>#</th>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>OBSERVACIÓN</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
        </table>

        <!-- Modal ELIMINAR ASIGNATURA -->
        <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="eliminarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="../php/eliminar.php" method="post">
                        <div class="modal-header bg-danger text-light">
                            <h5 class="modal-title" id="eliminarLabel">Confirmar Eliminación de Asignatura</h5>
                        </div>
                        <div class="modal-body">
                            <!-- Código de la asignatura -->
                            <input type="hidden" name="txt_codigo" id="txt_codigo">

                            <p>¿Está seguro de que desea eliminar la asignatura?</p>
                            <div class="alert alert-warning">
                                <!-- IDs que usa ajax_eli_asig en ajax.js -->
                                <p>Nombre: <strong id="txt_nombre_eli"></strong></p>
                                <p>Observación: <strong id="txt_observ_eli"></strong></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FIN MODAL ELIMINAR -->

        <!-- Modal para formulario NUEVA ASIGNATURA -->
        <div class="modal fade" id="modalFormulario" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-labelledby="modalFormularioLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header alert alert-info text-primary">
                        <h5 class="modal-title" id="modalFormularioLabel">Nueva Asignatura</h5>
                    </div>
                    <div class="modal-body" id="contenidoModal">
                        <div class="text-center">Cargando...</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        function abrirModalFormulario() {
            $("#contenidoModal").load("ingresar.php", function () {
                var myModal = new bootstrap.Modal(document.getElementById('modalFormulario'));
                myModal.show();
            });
        }
        </script>
    </body>
</html>
