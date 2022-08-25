<?php
    
    require_once "main.php";
    $id=limpiar_cadena($_POST['id_tip_usuario']);
    $nombre=limpiar_cadena($_POST['nombre_tip_usuario']);

    /*== Verificando producto ==*/
	$check_persona=conexion();
	$check_persona=$check_persona->query("SELECT * FROM tipo_usuario WHERE id_tip_usuario='$id'");
    
    
    
    
    $activoo;
    if($_REQUEST['options-outlined']=="activo"){
        $activoo=true;
    }else if($_REQUEST['options-outlined']=="inactivo"){
        $activoo=false;
    }

    /*== Verificando campos obligatorios ==*



    /*== Verificando usuario ==
    $check_usuario=conexion();
    $check_usuario=$check_usuario->query("SELECT nombre_tip_usuario FROM tipo_usuario WHERE nombre_tip_usuario='$nombre'");
    if($check_usuario->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El TIPO DE USUARIO  ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_usuario=null;*/




   
    /*== Actualizando datos ==*/
    $actualizar_tipo_user=conexion();
    $actualizar_tipo_user=$actualizar_tipo_user->prepare("UPDATE tipo_usuario SET nombre_tip_usuario=:nombre, estado_tip_usuario=:estado WHERE id_tip_usuario=:id");

    $marcadores=[
        ":nombre"=>$nombre,
        ":estado"=>$activoo,
        ":id"=>$id
    ];


    if($actualizar_tipo_user->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO ACTUALIZADO!</strong><br>
                El tipo de usuario se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el tipo de usuario, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_tipo_user=null;