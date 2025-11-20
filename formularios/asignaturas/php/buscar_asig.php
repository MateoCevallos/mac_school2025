<?php
require_once("../php/modelo.php");   // misma ruta que usas en ciclos

// OJO: aquí usamos la clase de ASIGNATURAS
$mclase = new clase_asignaturas();

// Texto que viene del input de búsqueda
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';

// Consultar registros filtrando por nombre
$registros = $mclase->_consultartodo($valor);

echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class=\"bg-primary text-light text-center\">
            <tr>
                <th>#</th>
                <th>CÓDIGO</th>
                <th>ASIGNATURA</th>
                <th>OBSERVACIÓN</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

$f = 1;
while ($fila = $registros->fetch()) {
    echo "<tr>
            <td>".$f."</td>
            <td>".$fila['ASIG_CODIGO']."</td>
            <td>".$fila['ASIG_NOMBRE']."</td>
            <td>".$fila['ASIG_OBSERV']."</td>

            <td class='text-center'>
                <a href='../vistas/modificar.php?v_id=".$fila['ASIG_CODIGO']."'>
                    <img src='../../../Src/imgs/edit.png'>
                </a>
            </td>

            <td class='text-center'>
                <img src='../../../Src/imgs/delete.png'
                     onclick='ajax_eli_asig(".$fila['ASIG_CODIGO'].");'
                     data-bs-toggle='modal' data-bs-target='#eliminar'>
            </td>
        </tr>";
    $f++;
}

echo "</table>";
?>
