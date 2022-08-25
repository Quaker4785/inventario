<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Team: Códigos de Programación
*/


require "main.php";
$conn=conec();

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['producto_id', 'producto_codigo', 'producto_nombre', 'producto_unidad', 'producto_stock','producto_ubicacion',
'producto_referencia','producto_contenedor','producto_fecha','categoria_nombre','nombre_propietario'];
$col=['producto_nombre,categoria'];

/* Nombre de la tabla */
$table = "producto";

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
$sql = "SELECT " . implode(", ", $columns) . " FROM $table 
INNER JOIN categoria AS c ON c.categoria_id=producto.categoria_id
INNER JOIN propietario ON propietario.propietario_id=producto.propietario_id

$where ORDER BY producto_nombre";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;


/* Mostrado resultados */
$html = '';
$id_='';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
       // $ruta="/img/producto/".$row['producto_foto'];
        $id_=$row['producto_id'];
        $html .= '<tr class="has-text-centered" >';
       // $html .= '<td>' . $row['id_persona'] . '</td>';      
        $html .= '<td>' . $row['producto_codigo'] . '</td>';
        $html .= '<td>' . $row['producto_nombre'] . '</td>';
        $html .= '<td>' . $row['producto_unidad'] . '</td>';
        $html .= '<td>' . $row['producto_stock'] . '</td>';
        $html .= '<td>' . $row['producto_ubicacion'] . '</td>';
        $html .= '<td>' . $row['producto_referencia'] . '</td>';
        $html .= '<td>' . $row['producto_contenedor'] . '</td>';
        $html .= '<td>' . $row['categoria_nombre'] . '</td>';
        $html .= '<td>' . $row['producto_fecha'] . '</td>';
        $html .= '<td>' . $row['nombre_propietario'] . '</td>'; 
       // $html += '<td><img src='.$ruta.'/></td> '; 
        $html .= '<td><a href="index.php?vista=product_img&product_id_up='.$id_.'" class="button is-link is-rounded is-small">Imagen</a></td>';    
        $html .= '<b><td><a href="index.php?vista=product_update&product_id_up='.$id_.'" class="button is-success is-rounded is-small">Actualizar</a></td></b>';
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