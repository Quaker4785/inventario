<?php
    
    require_once "main.php";

    /*== Almacenando datos ==*/
    $fecha=limpiar_cadena($_POST['fecha_salida']);
    $cel=limpiar_cadena($_POST['tel_presta']);
    $come=limpiar_cadena($_POST['producto_comenta']);
    $respon=limpiar_cadena($_POST['producto_respon']);
    $idp=limpiar_cadena($_POST['var']);
  
   


    /*== Verificando campos obligatorios ==
    if($nombre==""  || $apellido=="" || $telefono==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==
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
    }*/




    /*== Verificando email ==
   
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


    /*== Verificando usuario ==
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
    $check_dpi=null;*/



    /*== Guardando datos ==*/
    $guardar_persona=conexion();
    $guardar_persona=$guardar_persona->prepare("INSERT INTO prestamo(fecha_salida, fecha_entrada comentario_prestamo, nombre_perso_prestamo, numero_perso_prestamo) VALUES (:fecha,:fec,:come,:respon,:cel)");

    $marcadores=[
        ":fecha"=>$fecha,
        ":fec"=>$idp,
        ":cel"=>$cel,
        ":come"=>$come,
        ":respon"=>$respon
        
    ];

    $guardar_persona->execute($marcadores);

    if($guardar_persona->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>EMPLEADO REGISTRADO!</strong><br>
                El prestamo se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el prestamo, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_persona=null;
