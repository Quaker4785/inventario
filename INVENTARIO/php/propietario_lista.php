<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT * FROM propietario WHERE (nombre_propietario LIKE '%$busqueda%') ORDER BY nombre_propietario ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(propietario_id) FROM propietario WHERE (nombre_propietario LIKE '%$busqueda%')";

	}else{

		$consulta_datos="SELECT * FROM propietario  ORDER BY nombre_propietario ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(propietario_id) FROM propietario";
		
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow table-hover is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th><font color="red">#</font></th>
                    <th><b>Propietario</b></th>
                    <th><b>Estado</b></th>
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
			
			$esta=$rows['estado_propietario'];
			if($esta==1){
				
				$valor="Activo";
			}else if($esta==0){
				$valor="Inactivo";
			}
			$tabla.='
				<tr class="has-text-centered" >
					<td><font color="blue"><b>'.$contador.'</font></td>
                    <td>'.$rows['nombre_propietario'].'</td>
                    <td>'.$valor.'</td>
                    <td>
					<b><a href="index.php?vista=propier_update&propier_update='.$rows['propietario_id'].'" class="button is-success is-rounded is-small">Actualizar</a>
                    </b></td>
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
		$tabla.='<p class="has-text-right">Mostrando propietarios <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}