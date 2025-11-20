// ================== CICLOS ==================

function ajax_buscar_ciclos(vldato) {
    var fd = new FormData();
    fd.append('valor', vldato);

    $.ajax({
        type: 'POST',
        url: '../php/buscar_ciclos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function (data) {
        $("#tabla").html(data);
    })
    .fail(function () {
        alert("Error al procesar la informacion");
    });

    return false;
}

function ajax_eli_ciclo(vldato) {
    // Código del ciclo en el input hidden del modal
    $("#txt_codigo").val(vldato);

    var fd = new FormData();
    fd.append('codigo', vldato);

    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'   // jQuery ya convierte a objeto
    })
    .done(function (datos) {
        console.log("Respuesta cargardatos:", datos);

        if (datos.error) {
            console.error(datos.error);
            return;
        }

        // Rellenar spans del modal
        $("#txt_nombre_eli").text(datos.v_nombre);
        $("#txt_observ_eli").text(datos.v_observ);
    })
    .fail(function () {
        alert("error al procesar la informacion");
    });

    return false;
}

// ================== ASIGNATURAS ==================

function ajax_buscar_asig(vldato) {
    var fd = new FormData();
    fd.append('valor', vldato); 

    $.ajax({
        type: 'POST',
        url: '../php/buscar_asig.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function (data) {
        $("#tabla").html(data); 
    })
    .fail(function () {
        alert("Error al procesar la información de asignaturas");
    });

    return false;
}

function ajax_eli_asig(vldato) {
    // Código de la asignatura en el input hidden del modal
    $("#txt_codigo").val(vldato);

    var fd = new FormData();
    fd.append('codigo', vldato); 

    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',   // ← OJO: archivo diferente
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
    .done(function (datos) {

        if (datos.error) {
            console.error(datos.error);
            return;
        }

        $("#txt_nombre_eli").text(datos.v_nombre);
        $("#txt_observ_eli").text(datos.v_observ);
    })
    .fail(function () {
        alert("Error al procesar la información para eliminar asignatura");
    });

    return false;
}
