<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CICLOS</title>

        <!-- Bootstrap CSS -->
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Bootstrap JS -->
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

        <!-- jQuery y tu JS -->
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>

    <body onload="ajax_buscar_ciclos('');">
        <div class="alert alert-light">
            <h2 class="text-primary">Gestión de Ciclos o Educación</h2>
            <button type="button" class="btn btn-success" onclick="abrirModalFormulario()">Nuevo</button>
            <button type="button" class="btn btn-success" onclick="reporte();">Reporte</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='/mac_school2025/formularios/'">← Volver al Panel Principal</button>
        </div>

        <div class="container alert alert-info col-5">
            <h3>Buscar</h3>
            <div class="row">
                <input type="text" class="form-control col-4" id="txt_buscar" name="txt_buscar"
                       onkeyup="ajax_buscar_ciclos(this.value);">
            </div>
        </div>

        <table id="tabla" name="tabla" class="table table-bordered">
            <thead class="bg-primary text-light text-center">
                <tr>
                    <th>#</th>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>OBSERVACIÓN</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <!-- El cuerpo se llena por AJAX desde buscar_ciclos.php -->
        </table>

        <!-- Modal para formulario NUEVO / EDITAR (lo usamos ahora solo para NUEVO) -->
        <div class="modal fade" id="modalFormulario" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-labelledby="modalFormularioLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header alert alert-info text-primary">
                        <h5 class="modal-title" id="modalFormularioLabel">Nuevo Ciclo</h5>
                        <!-- Sin botón de cerrar para obligar a usar Guardar/Cerrar del formulario -->
                    </div>
                    <div class="modal-body" id="contenidoModal">
                        <!-- Aquí se cargará el formulario por AJAX -->
                        <div class="text-center">Cargando...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para ELIMINAR -->
        <div class="modal fade" id="eliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="../php/eliminar.php" method="post">
                <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Eliminar Ciclo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <!-- Código -->
                <input type="hidden" id="txt_codigo" name="txt_codigo">

                <p>¿Seguro que deseas eliminar el siguiente ciclo?</p>
                <p><strong>Nombre:</strong> <span id="txt_nombre_eli"></span></p>
                <p><strong>Observación:</strong> <span id="txt_observ_eli"></span></p>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Funciones JS específicas de este CRUD -->
        <script>
            function abrirModalFormulario() {
                // Cargar el contenido del formulario vía AJAX
                $("#contenidoModal").load("ingresar.php", function () {
                    var myModal = new bootstrap.Modal(document.getElementById('modalFormulario'));
                    myModal.show();
                });
            }

            function cerrarModalFormulario() {
                var modalEl = document.getElementById('modalFormulario');
                var modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) {
                    modal.hide();
                }
            }

            // Si tienes un reporte implementado en otro archivo, ajusta esta función
            function reporte() {
                // Ejemplo: abrir un reporte en otra pestaña
                // window.open('../php/reporte_ciclos.php', '_blank');
                alert('Función de reporte aún no implementada.');
            }
        </script>
    </body>
</html>
