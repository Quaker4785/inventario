<div class="container is-fluid mb-6">
	<h1 class="title">Empleados</h1>
	<h2 class="subtitle">Nuevo Empleado</h2>
</div>
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>
	<?php
     include "./inc/btn_back.php";
	?>
	<form action="./php/persona_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Nombre</label></font></b>
				  	<input class="input" type="text" name="empleado_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
					<b><font color="blue"><label>Apellido</label></font></b>
				  	<input class="input" type="text" name="empleado_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Numero de DPI</label></font></b>
				  	<input class="input" type="int" name="empleado_dpi" maxlength="13" pattern="[0-9.]{1,25}" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Numero de Telefono</label></font></b>
				  	<input class="input" type="int" name="empleado_telefono" maxlength="8" pattern="[0-9.]{1,25}" required >
				</div>
		  	</div>
		</div>
		  	
		<p class="has-text-centered">
			<button type="submit" class="button is-link is-medium is-rounded">Guardar</button>
		</p>
	</form>
</div>