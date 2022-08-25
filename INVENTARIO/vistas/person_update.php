<div class="container is-fluid mb-6">
	<h1 class="title">Empleados</h1>
	<h2 class="subtitle">Actualizar Empleado</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['per_id_up'])) ? $_GET['per_id_up'] : 0;

		/*== Verificando persona ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM persona WHERE id_persona='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><b><font color="red"><?php echo $datos['nombre_persona']; ?></font></b></h2>

	<form action="./php/persona_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="id_persona" value="<?php echo $datos['id_persona']; ?>" required >

		 <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<b><font color="blue"><label>Nombres</label></font></b>
				  	<input class="input" type="text" name="nombre_persona" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required value="<?php echo $datos['nombre_persona']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Apellidos</label></font></b>
				  	<input class="input" type="text" name="apellido_persona" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required value="<?php echo $datos['apellido_persona']; ?>" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Telefono</label></font></b>
				  	<input class="input" type="text" name="telefono_persona" pattern="[0-9]{1,25}" maxlength="8" required value="<?php echo $datos['telefono_persona']; ?>" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>DPI</label></font></b>
				  	<input class="input" type="text" name="dpi_persona" pattern="[0-9]{1,25}" maxlength="13" required value="<?php echo $datos['dpi_persona']; ?>" >
				</div>
		  	</div>
	    </div>	
		
				  	
		</div>
		<p class="has-text-centered">
			<b><button type="submit" class="button is-success is-rounded">Actualizar</button></b>
		</p>
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_producto=null;
	?>
</div>