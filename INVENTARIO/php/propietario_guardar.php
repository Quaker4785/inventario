<?php
    
    require_once "main.php";

    /*== Almacenando datos ==*/
    //$id_=id_increment();
    $nombre=limpiar_cadena($_POST['pro_nombre']);
    //$estado1=limpiar_cadena($_POST['options-outlined']);
   // $estado2=limpiar_cadena($_POST['options-outlined']);
    
    $activoo;
    if($_REQUEST['options-outlined']=="activo"){
        $activoo=true;
    }else if($_REQUEST['options-outlined']=="inactivo"){
        $activoo=false;
    }

    /*== Verificando campos obligatorios ==*/
    if($nombre==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }





    /*== Verificando usuario ==*/
    $check_usuario=conexion();
    $check_usuario=$check_usuario->query("SELECT nombre_propietario FROM propietario WHERE nombre_propietario='$nombre'");
    if($check_usuario->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El PROPIETARIO ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_usuario=null;




    /*== Guardando datos ==*/
    $guardar_usuario=conexion();
    $guardar_usuario=$guardar_usuario->prepare("INSERT INTO propietario(nombre_propietario, estado_propietario) VALUES(:nombre,:estado)");

    $marcadores=[
        ":nombre"=>$nombre,
        ":estado"=>$activoo
      
    ];

    $guardar_usuario->execute($marcadores);

    if($guardar_usuario->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡USUARIO REGISTRADO!</strong><br>
                El Propietario se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el propietario, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_usuario=null;