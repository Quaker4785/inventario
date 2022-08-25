
<div class=" main-container" >

	<form class="box login" action="" method="POST" autocomplete="off">
		<h5 class="title is-2 has-text-centered is-uppercase">Fundacion Herencia Viva</h5>

		<div class="field ">
		<h2><label class="">Usuario</label></h2>
			<div class="control">
			    <input class="input" type="text" name="login_usuario" placeholder="Ingrese el Usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
			</div>
		</div>

		<div class="field">
		  	<h2><label class="">Contraseña</label></h2>
		  	<div class="control">
		    	<input class="input" type="password" name="login_clave" placeholder="Ingrese la Contraseña" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
		  	</div>
		</div>

		<p class="has-text-centered mb-6 mt-4"> 
			<button type="submit" class="button is-link is-medium is-rounded is-fullwidth">Iniciar sesion</button>
		</p>

		<?php
			if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
				require_once "./php/main.php";
				require_once "./php/iniciar_sesion_user.php";
			}
		?>
	</form>

	</div>
