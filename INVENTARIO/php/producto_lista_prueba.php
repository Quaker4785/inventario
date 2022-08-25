<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="producto.producto_id,producto.producto_codigo,producto.producto_nombre,producto.producto_unidad,producto.producto_stock,producto.producto_ubicacion,
	producto.producto_referencia,producto.producto_contenedor,producto.producto_fecha,producto.producto_foto,producto.categoria_id,producto.usuario_id,categoria.categoria_id,
	categoria.categoria_nombre,usuario.usuario_id,usuario.usuario_nombre,usuario.id_persona,producto.propietario_id,propietario.nombre_propietario";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM producto 
		INNER JOIN propietario ON propietario.propietario_id=producto.propietario_id
		INNER JOIN categoria ON categoria.categoria_id=producto.categoria_id
		INNER JOIN usuario ON usuario.usuario_id=producto.producto_id";
		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE producto_codigo LIKE '%$busqueda%' OR producto_nombre LIKE '%$busqueda%'";

	}else if($categoria_id>0){

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN propietario ON propietario.propietario_id=producto.propietario_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.categoria_id='$categoria_id' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE categoria_id='$categoria_id'";

	}else{

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN propietario ON propietario.propietario_id=producto.propietario_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto";

	}
	$conexion=conexion();
///conteo de paginación 
	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);
/////
	$tabla.='
	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-justified">
                	<th>#</th>
                    <th >Imagen</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
					<th>Unidad</th>
					<th>Stock</th>
					<th>Ubicacion</th>
					<th>Referencia</th>
					<th>Contenedor</th>
					<th>Fecha</th>
					<th>Categoria</th>
					<th>Propietario</th>
					<th>Usuario</th>
                    <th colspan="3">Opciones</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-justified" >
					<td>'.$contador.'</td>
                    <td ><img src="./img/producto/'.$rows['producto_foto'].'" ></td>
					<td>'.$rows['producto_nombre'].'</td>
					<td>'.$rows['producto_codigo'].'</td>
					<td>'.$rows['producto_unidad'].'</td>
					<td>'.$rows['producto_stock'].'</td>
					<td>'.$rows['producto_ubicacion'].'</td>
					<td>'.$rows['producto_referencia'].'</td>
					<td>'.$rows['producto_contenedor'].'</td>
					<td>'.$rows['producto_fecha'].'</td>
					<td>'.$rows['categoria_nombre'].'</td>
					<td>'.$rows['nombre_propietario'].'</td>
                    <td>'.$rows['usuario_nombre'].'</td>
                    <td>
					<a href="index.php?vista=product_img&product_id_up='.$rows['producto_id'].'" class="button is-link is-rounded is-small">Imagen</a>
                    </td>
                    <td>
					<a href="index.php?vista=product_update&product_id_up='.$rows['producto_id'].'" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
					<a href="'.$url.$pagina.'&product_id_del='.$rows['producto_id'].'" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="5">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="5">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}


	$tabla.='</tbody></table></div>';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando Productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}