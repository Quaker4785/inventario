<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";
	$tabla_a="";
	$categoria_id="";
	$campos="producto.producto_id,producto.producto_codigo,producto.producto_nombre,producto.producto_unidad,producto.producto_stock,producto.producto_ubicacion,
	producto.producto_referencia,producto.producto_contenedor,producto.producto_fecha,producto.producto_foto,producto.categoria_id,producto.usuario_id,categoria.categoria_id,categoria.categoria_nombre,usuario.usuario_id,usuario.usuario_nombre";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.producto_codigo LIKE '%$busqueda%' 
		OR producto.producto_nombre LIKE '%$busqueda%' OR producto.producto_ubicacion LIKE '%$busqueda%' OR producto.producto_contenedor LIKE '%$busqueda%' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE producto_codigo LIKE '%$busqueda%' OR producto_nombre LIKE '%$busqueda%'";

	}elseif($categoria_id>0){

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.categoria_id='$categoria_id' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE categoria_id='$categoria_id'";

	}else{

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto";

	}


	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	<div class="table-container">
        <table id="source" class="table is-bordered is-striped is-narrow table-hover is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th style="display:none;"><font color="red">#</font></th>
                    <th><b>codigo</b></th>
					<th style="width:300px"><b>Foto</b></th>
                    <th><b>nombre</b></th>
					<th><b>Unidad</b></th>
					<th><b>Stock</b></th>
					<th><b>Ubicación</b></th>
					<th><b>Categoria</b></th>
                    <th colspan="1">Opciones</th>
                </tr>
            </thead>
            <tbody>
	';
	$valor="";
	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$valor=$rows['producto_id'];
			$tabla.='
				<tr class="has-text-centered" >
				
					<td style="display:none;"><font color="blue"><b>'.$valor.'</font></td>
                    <td>'.$rows['producto_codigo'].'</td>
					<td style="width:50px"><img src="./img/producto/'.$rows['producto_foto'].'"></td>
                    <td>'.$rows['producto_nombre'].'</td>
					<td>'.$rows['producto_unidad'].'</td>
					<td>'.$rows['producto_stock'].'</td>
					<td>'.$rows['producto_ubicacion'].'</td>
					<td>'.$rows['categoria_nombre'].'</td>
                    <td>
					<button onclick="add(this)" class="btn btn-primary btn-xs">
                    Agregar
					</button></td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}


	$tabla.='</tbody></table></div>';

	
	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}

	$tabla_a.='
	';

	?>

	