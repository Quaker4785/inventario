<div class="container is-fluid mb-6">
	<h1 class="title">Tipo de Usuarios</h1>
	<h2 class="subtitle">Nuevo tipo usuario</h2>
</div>
<div class="container pb-6 pt-6">
<?php
	require_once "./php/main.php";
		
    include "./inc/btn_back.php";
	
	?>
	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/tip_usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<h4><b><font color="blue"><label>Nombre Tipo Usuario</label></font></b></h4>
				  	<input class="input" type="text" name="tip_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
			<div class="column">
			<h4><b><font color="blue"><label>Estado</label></font></b></h4>
				<input type="radio" class="btn-check"  name="options-outlined" value="activo" id="activo" autocomplete="off" checked>
				<label class="btn btn-outline-success btn-lg" for="activo">Activo</label>

				<input type="radio" class="btn-check" name="options-outlined" value="inactivo" id="inactivo" autocomplete="off" >
				<label class="btn btn-outline-danger btn-lg" for="inactivo">Inactivo</label>
			
			</div>
		</div>
		<b><p class="has-text-left">
			<button type="submit" class="button is-link is-medium is-rounded">Guardar</button></p></b>
	</form>

	<!--<form action="" method="POST" class="" autocomplete="off" >
	<h4><p class="has-text-centered">
		<a href="index.php?vista=tip_user_list" class=" btn btn-danger button"><i class="fa fa-trash-o" aria-hidden="true"></i>Lista tipo de Usuarios</a>
		</p></h4>
	</form>-->
</div>
