<?php
	/*== Almacenando datos ==*/
    $perso_id_del=limpiar_cadena($_GET['per_id_del']);

    /*== Verificando producto ==*/
    $check_persona=conexion();
    $check_persona=$check_persona->query("SELECT * FROM persona WHERE id_persona='$perso_id_del'");

    if($check_persona->rowCount()==1){

    	$datos=$check_persona->fetch();

    	$eliminar_persona=conexion();
    	$eliminar_persona=$eliminar_persona->prepare("DELETE FROM persona WHERE id_persona=:id");

    	$eliminar_persona->execute([":id"=>$perso_id_del]);

    	if($eliminar_persona->rowCount()==1){


	        echo '
	            <div class="notification is-info is-light">
	                <strong>¡PRODUCTO ELIMINADO!</strong><br>
	                Los datos del empleado se eliminaron con exito
	            </div>
	        ';
	    }else{
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                No se pudo eliminar el empleado, por favor intente nuevamente
	            </div>
	        ';
	    }
	    $eliminar_persona=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El EMPLEADO que intenta eliminar no existe
            </div>
        ';
    }
    $check_persona=null;