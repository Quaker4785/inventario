<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Team: Códigos de Programación
*/


require "main.php";
$conn=conec();

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_persona', 'nombre_persona', 'apellido_persona', 'telefono_persona', 'dpi_persona'];

/* Nombre de la tabla */
$table = "persona";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


/* Consulta */
$sql = "SELECT " . implode(", ", $columns) . "
FROM $table
$where ";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;


/* Mostrado resultados */
$html = '';
$id_='';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $id_=$row['id_persona'];
        $html .= '<tr class="has-text-centered" >';
       // $html .= '<td>' . $row['id_persona'] . '</td>';      
        $html .= '<td>' . $row['nombre_persona'] . '</td>';
        $html .= '<td>' . $row['apellido_persona'] . '</td>';
        $html .= '<td>' . $row['telefono_persona'] . '</td>';
        $html .= '<td>' . $row['dpi_persona'] . '</td>';
        $html .= '<b><td><a href="index.php?vista=person_update&per_id_up='.$id_.'" class="button is-success is-rounded is-small">Actualizar</a></td></b>';
        $html .= '<b><td><a href="" class="button is-danger is-rounded is-small">Eliminar</a></td></b>';
        $html .= '</tr>';
        
        
    }
    $id_='';
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
    $id_='';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);