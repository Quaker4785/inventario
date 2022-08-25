<?php
    
    require_once "main.php";
    $id=limpiar_cadena($_POST['propietario_id']);
    $nombre=limpiar_cadena($_POST['nombre_propietario']);

    /*== Verificando producto ==*/
	$check_persona=conexion();
	$check_persona=$check_persona->query("SELECT * FROM propietario WHERE propietario_id='$id'");
    
    
    
    
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
    $actualizar_propietario=conexion();
    $actualizar_propietario=$actualizar_propietario->prepare("UPDATE propietario SET nombre_propietario=:nombre, estado_propietario=:estado WHERE propietario_id=:id");

    $marcadores=[
        ":nombre"=>$nombre,
        ":estado"=>$activoo,
        ":id"=>$id
    ];


    if($actualizar_propietario->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO ACTUALIZADO!</strong><br>
                El propietario se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el propietario, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_propietario=null;