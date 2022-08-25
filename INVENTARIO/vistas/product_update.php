<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Actualizar producto</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM producto WHERE producto_id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><font color="red"><b><?php echo $datos['producto_nombre']; ?></b></font></h2>

	<form action="./php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>" required >

		 <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<b><font color="blue"><label>Código</label></font></b>
				  	<input class="input" type="text" name="producto_codigo" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required value="<?php echo $datos['producto_codigo']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Nombre</label></font></b>
				  	<input class="input" type="text" name="producto_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required value="<?php echo $datos['producto_nombre']; ?>" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Stock</label></font></b>
				  	<input class="input" type="text" name="producto_stock" pattern="[0-9]{1,25}" maxlength="25" required value="<?php echo $datos['producto_stock']; ?>" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Unidad</label></font></b>
				  	<input class="input" type="text" name="producto_unidad" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required value="<?php echo $datos['producto_unidad']; ?>" >
				</div>
		  	</div>
	    </div>	
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Ubicacion</label></font></b>
				  	<input class="input" type="text" name="producto_ubicacion" pattern="[0-9.]{1,25}" maxlength="25" required value="<?php echo $datos['producto_ubicacion']; ?>" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Referencia</label></font></b>
				<input class="input" type="text" name="producto_referencia" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required value="<?php echo $datos['producto_referencia']; ?>" >
				</div>
		  	</div>
	    </div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Contenedor</label></font></b>
				  	<input class="input" type="text" name="producto_contenedor" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required value="<?php echo $datos['producto_contenedor']; ?>" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Fecha</label></font></b>
				  	<input class="input" type="date" name="producto_fecha"  value="<?php echo $datos['producto_fecha']; ?>" >
				</div>
		  	</div>
	    </div>
		  	<div class="column">
			  <b><font color="blue"><label>Categoría</label></font></b><br>
		    	<div class="select is-rounded">
				  	<select name="producto_categoria" >
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM categoria");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								if($datos['categoria_id']==$row['categoria_id']){
    									echo '<option value="'.$row['categoria_id'].'" selected="" >'.$row['categoria_nombre'].' (Actual)</option>';
    								}else{
    									echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
    								}
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
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