<div class="container is-fluid mb-6">
	<h1 class="title">Propietarios</h1>
	<h2 class="subtitle">Actualizar Propietario</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['propier_update'])) ? $_GET['propier_update'] : 0;

		/*== Verificando persona ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM propietario WHERE propietario_id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered" name="nameuser"><b><font color="red"><?php echo $datos['nombre_propietario']; ?></font></b></h2>

	<form action="./php/propietario_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="propietario_id"  value="<?php echo $datos['propietario_id']; ?>" required >

		 <div class="columns">
		  	<div class="column">
		    	<div class="control">
				<h4><b><font color="blue"><label>Propietario</label></font></b></h4>
				  	<input class="input" type="text" name="nombre_propietario" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required value="<?php echo $datos['nombre_propietario']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<h4><b><font color="blue"><label>Estado</label></font></b></h4>
				
				<?php 
				if($datos['estado_propietario']==1){
					echo '<input type="radio" class="btn-check"  name="options-outlined" value="activo" id="activo" autocomplete="off" checked>
					<label class="btn btn-outline-success btn-lg" for="activo">Activo</label>

					<input type="radio" class="btn-check" name="options-outlined" value="inactivo" id="inactivo" autocomplete="off">
					<label class="btn btn-outline-danger btn-lg" for="inactivo">Inactivo</label>
					';
				}else if($datos['estado_propietario']==0){
					echo '<input type="radio" class="btn-check"  name="options-outlined" value="activo" id="activo" autocomplete="off" >
					<label class="btn btn-outline-success btn-lg" for="activo">Activo</label>

					<input type="radio" class="btn-check" name="options-outlined" value="inactivo" id="inactivo" autocomplete="off" checked>
					<label class="btn btn-outline-danger btn-lg" for="inactivo">Inactivo</label>
					';
				} 
				?>		
				</div>
		  	</div>
		</div>	
		
				  	
		</div>
		<p class="has-text-centered">
			<b><button type="submit" class="button is-link is-rounded is-lg">Actualizar</button></b>
		</p>
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_producto=null;
	?>
</div>