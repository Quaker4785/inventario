<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Nuevo producto</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
		
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/producto_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
	<?php
include "./inc/btn_back.php";
?>
		<div class="columns" >
		  	<div class="column">
		    	<div class="control" >
				<b><font color="blue"><label>Código</label></font></b>
				  	<input class="input form-control"  type="text" name="producto_codigo" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Nombre</label></font></b>
				  	<input class="input" type="text" name="producto_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Stock</label></font></b>
				  	<input class="input" type="text" name="producto_stock" pattern="[0-9]{1,25}" maxlength="25" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Unidad</label></font></b>
				  	<input class="input" type="text" name="producto_unidad" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required >
				</div>
		  	</div>
	  </div>
		
	    <div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Ubicación</label></font></b>
				  	<input class="input" type="text" name="producto_ubicacion"  pattern="[0-9.]{1,25}" maxlength="25" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Referencia</label></font></b>
				  	<input class="input" type="text" name="producto_referencia" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required >
				</div>
		  	</div>
		</div>  
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Contenedor</label></font></b>
				  	<input class="input" type="text" name="producto_contenedor"  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Fecha</label></font></b>
				  	<input class="input" type="date" name="producto_fecha"  >
				</div>
		  	</div>
		</div>  		
		<div class="columns"> 
		  	<div class="column">
			  <b><font color="blue"><label>Categoría</label></font></b><br>
		    	<div class="select is-rounded">
				  	<select name="producto_categoria" >
					  <b><option value="" selected="" >Seleccione una opción</option></b>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM categoria");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
				</div>
		  	</div>
			<div class="column">
			  <b><font color="blue"><label>Propietario</label></font></b><br>
		    	<div class="select is-rounded">
				  	<select name="nombre_propie" >
					  <b><option value="" selected="" >Seleccione una opción</option></b>
				    	<?php
    						$propie=conexion();
    						$propie=$propie->query("SELECT * FROM propietario");
    						if($propie->rowCount()>0){
    							$propie=$propie->fetchAll();
    							foreach($propie as $row){
    								echo '<option value="'.$row['propietario_id'].'" >'.$row['nombre_propietario'].'</option>';
				    			}
				   			}
				   			$propie=null;
				    	?>
				  	</select>
				</div>
		  	</div>
		
	
			<div class="column">
			<b><font color="blue"><label>Foto o imagen del producto</label></font></b><br>
				<div class="file is-small has-name">
				  	<label class="file-label">
				    	<input class="file-input" type="file" name="producto_foto" accept=".jpg, .png, .jpeg" >
				    	<span class="file-cta">
				      		<span class="file-label">Imagen</span>
				    	</span>
				    	<span class="file-name">JPG, JPEG, PNG. (MAX 3MB)</span>
				  	</label>
				</div>
			</div>
		</div>
		</div>	
		<p class="has-text-centered">
		<b><button type="submit" class="button is-info is-rounded">Guardar</button></b>
		</p>
	</form>
</div>