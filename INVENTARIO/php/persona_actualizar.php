<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_persona']);


    /*== Verificando producto ==*/
	$check_persona=conexion();
	$check_persona=$check_persona->query("SELECT * FROM persona WHERE id_persona='$id'");

    if($check_persona->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El empleado no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_persona->fetch();
    }
    $check_persona=null;


    /*== Almacenando datos ==*/
    $nombre=limpiar_cadena($_POST['nombre_persona']);
    $apellido=limpiar_cadena($_POST['apellido_persona']);
	$telefono=limpiar_cadena($_POST['telefono_persona']);
    $dpi=limpiar_cadena($_POST['dpi_persona']);
    

	/*== Verificando campos obligatorios ==*/
    if( $nombre=="" || $apellido=="" || $telefono=="" || $dpi=="" ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


   

    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}",$nombre)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}",$apellido)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                EL APELLIDO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[0-9.]{1,25}",$telefono)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
               EL TELEFONO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    
    if(verificar_datos("[0-9]{1,25}",$dpi)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El DPI no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    /*== Verificando codigo ==*/
    if($dpi!=$datos['dpi_persona']){
	    $check_codigo=conexion();
	    $check_codigo=$check_codigo->query("SELECT dpi_persona FROM persona WHERE dpi_persona='$dpi'");
	    if($check_codigo->rowCount()>0){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                El DPI ingresado ya se encuentra registrado, por favor elija otro
	            </div>
	        ';
	        exit();
	    }
	    $check_codigo=null;
    }


   
    /*== Verificando categoria ==*/
    if($telefono!=$datos['telefono_persona']){
	    $check_categoria=conexion();
	    $check_categoria=$check_categoria->query("SELECT telefono_persona FROM persona WHERE telefono_persona='$telefono'");
	    if($check_categoria->rowCount()<=0){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                EL TELEFONO ya se encuentra registrado, por favor elija otro
	            </div>
	        ';
	        exit();
	    }
	    $check_categoria=null;
    }


    /*== Actualizando datos ==*/
    $actualizar_persona=conexion();
    $actualizar_persona=$actualizar_persona->prepare("UPDATE persona SET nombre_persona=:nombre,
    apellido_persona=:apellido, telefono_persona=:telefono, dpi_persona=:dpi
    WHERE id_persona=:id");

    $marcadores=[
        ":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":telefono"=>$telefono,
        ":dpi"=>$dpi,
        ":id"=>$id
    ];


    if($actualizar_persona->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO ACTUALIZADO!</strong><br>
                El empleado se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el empleado, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_persona=null;