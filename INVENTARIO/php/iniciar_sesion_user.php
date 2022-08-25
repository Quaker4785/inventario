<?php
	/*== Almacenando datos ==*/
    $usuario=limpiar_cadena($_POST['login_usuario']);
    $clave=limpiar_cadena($_POST['login_clave']);


    /*== Verificando campos obligatorios ==*/
    if($usuario=="" || $clave==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-Z0-9]{4,20}",$usuario)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Las CLAVE no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }


    $check_user=conexion();
    $check_user=$check_user->query("SELECT * FROM usuario 
    INNER JOIN persona ON persona.id_persona= usuario.id_persona 
    INNER JOIN tipo_usuario ON tipo_usuario.id_tip_usuario=usuario.id_tip_usuario WHERE usuario_nombre='$usuario'");
    if($check_user->rowCount()==1){

    	$check_user=$check_user->fetch();

    	if($check_user['usuario_nombre']==$usuario && password_verify($clave, $check_user['usuario_clave']) && $check_user['id_tip_usuario']==1){

    		$_SESSION['id_']=$check_user['usuario_id'];
    		$_SESSION['nombre']=$check_user['nombre_persona'];
    		$_SESSION['apellido']=$check_user['apellido_persona'];
    		$_SESSION['usuario']=$check_user['usuario_nombre'];
            $_SESSION['usuario_tip']=$check_user['id_tip_usuario'];

    		if(headers_sent()){
				echo "<script> window.location.href='index.php?vista=user_new'; </script>";
			}else{
				header("Location: index.php?vista=home");
                echo "<script> window.location.href='index.php?vista=home'; </script>";
			}

    	}else{
    		echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                Usuario o clave incorrectos
	            </div>
	        ';
    	}
    }else{
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Usuario o clave incorrectos
            </div>
        ';
    }
    $check_user=null;