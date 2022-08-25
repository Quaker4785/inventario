<div class="container is-fluid mb-6">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario</h2>
</div>
<div class="container pb-6 pt-6">
<?php
	require_once "./php/main.php";
		
    include "./inc/btn_back.php";
	
	?>
	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Nombre Usuario</label></font></b>
				  	<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Email</label><font></b>
				  	<input class="input" type="email" name="usuario_email" maxlength="70" >
				</div>
		  	</div>
			  <div class="column">
			  <b><font color="blue"><label>Lista Empleados</label></font><br></b>
		    	<div class="select is-rounded is-link is-medium">
				  	<select class="is-hovered" name="persona_lista" require >
					  <b><option value="" selected="" >Seleccione una opción</option></b>
				    	<?php
    						$personas=conexion();
    						$personas=$personas->query("SELECT * FROM persona");
    						if($personas->rowCount()>0){
    							$personas=$personas->fetchAll();
    							foreach($personas as $row){
    								echo '<option value="'.$row['id_persona'].'" >'.$row['nombre_persona'].'</option>';
				    			}
				   			}
				   			$personas=null;
				    	?>
				  	</select>
				</div>
		  	</div>
			  <div class="column">
			  <b><font color="blue"><label>Lista Tipo Usuario</label></font><br></b>
		    	<div class="select is-rounded is-link is-medium">
				  	<select class="is-hovered" name="tip_user_lista" require >
					  <b><option value="" selected="" >Seleccione una opción</option></b>
				    	<?php
    						$personas=conexion();
    						$personas=$personas->query("SELECT * FROM tipo_usuario");
    						if($personas->rowCount()>0){
    							$personas=$personas->fetchAll();
    							foreach($personas as $row){
    								echo '<option value="'.$row['id_tip_usuario'].'" >'.$row['nombre_tip_usuario'].'</option>';
				    			}
				   			}
				   			$personas=null;
				    	?>
				  	</select>
				</div>
		  	</div>
		</div>
		  	
		
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Clave</label></font></b>
				  	<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Repetir clave</label></font></b>
				  	<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<b><p class="has-text-centered">
			<button type="submit" class="button is-link is-medium is-rounded">Guardar</button>
		</p></b>
	</form>
</div>