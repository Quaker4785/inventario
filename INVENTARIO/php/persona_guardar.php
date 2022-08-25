<?php
    
    require_once "main.php";
    include "./inc/btn_back.php";
    /*== Almacenando datos ==*/
    $nombre=limpiar_cadena($_POST['empleado_nombre']);
    $apellido=limpiar_cadena($_POST['empleado_apellido']);
    $dpi=limpiar_cadena($_POST['empleado_dpi']);
    $telefono=limpiar_cadena($_POST['empleado_telefono']);
   


    /*== Verificando campos obligatorios ==*/
    if($nombre==""  || $apellido=="" || $telefono==""){
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
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El APELLIDO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[0-9.]{1,25}",$dpi)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[0-9.]{1,25}",$telefono)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }




    /*== Verificando email ==*/
   
            $check_nombre=conexion();
            $check_nombre=$check_nombre->query("SELECT nombre_persona FROM persona WHERE nombre_persona='$nombre'");
            if($check_nombre->rowCount()>0){
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        El nombre ingresado ingresado ya se encuentra registrado, por favor elija otro
                    </div>
                ';
                exit();
            }
            $check_nombre=null;


    /*== Verificando usuario ==*/
    $check_telefono=conexion();
    $check_telefono=$check_telefono->query("SELECT telefono_persona FROM persona WHERE telefono_persona='$telefono'");
    if($check_telefono->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El numero de telefono ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_telefono=null;

    $check_dpi=conexion();
    $check_dpi=$check_dpi->query("SELECT dpi_persona FROM persona WHERE dpi_persona='$dpi'");
    if($check_dpi->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El numero de DPI ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_dpi=null;



    /*== Guardando datos ==*/
    $guardar_persona=conexion();
    $guardar_persona=$guardar_persona->prepare("INSERT INTO persona(nombre_persona, apellido_persona, telefono_persona, dpi_persona)  VALUES(:nombre,:apellido,:telefono,:dpi)");

    $marcadores=[
        ":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":telefono"=>$telefono,
        ":dpi"=>$dpi
    ];

    $guardar_persona->execute($marcadores);

    if($guardar_persona->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>EMPLEADO REGISTRADO!</strong><br>
                El empleado se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el empleado, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_persona=null;