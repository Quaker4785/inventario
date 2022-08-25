<div class="container is-fluid mb-6">
	<h1 class="title">Prestamos</h1>
	<h2 class="subtitle">Nuevo Prestamo</h2>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet"/>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
		
	?>

	<div class="form-rest mb-6 mt-6"></div>

<!-- ./php/producto_guardar.php   FormularioAjax"-->	
	<form action="" method="POST" class=""  autocomplete="off" enctype="multipart/form-data" >
	<?php
include "./inc/btn_back.php";
?>
		<div class="columns" >
		  	<div class="column">
		    	<div class="control" >
				<b><font color="blue"><label>Fecha de Salida</label></font></b>
				  	<input class="input form-control"  type="date" name="producto_codigo" pattern="" maxlength="70" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Fecha de Entrada</label></font></b>
				  	<input class="input" type="date" name="producto_nombre" pattern="" maxlength="70" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Comentario de Prestamo</label></font></b>
				  	<input class="input" type="text" name="producto_stock" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="25" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Responsable del prestamo</label></font></b>
				  	<input class="input" type="text" name="producto_unidad" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required >
				</div>
		  	</div>
	  </div>
		
	    <div class="columns">
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Telefono responsable del prestamo</label></font></b>
				  	<input class="input" type="text" name="producto_ubicacion"  pattern="[0-9.]{1,25}" maxlength="25" required >
				</div>
		  	</div>
		  	
		  	<div class="column">
			  <b><font color="blue"><label>Producto a prestar</label></font></b><br>
		    	<div class="select is-rounded">
				  	<select name="producto_categoria" >
					  <b><option value="" selected="" >Seleccione una opción</option></b>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM producto");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['producto_id'].'" >'.$row['producto_nombre'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
					
				</div><br>&nbsp;&nbsp;
			<div class="col-md-4"> 
			    <p class="has-text-centered">
						<b><button type="submit" class="button is-info is-rounded">Agregar</button></b>
			</div> 
			</div>
			
		</div>
		


	</form>

	<form id="transactionForm"> 
<div class="container">
	<div class="row">

			  <b><font color="blue"><label>Producto a prestar</label></font></b><br>
		    	<div class="select is-rounded">
				  	<select name="producto_categoria" id="producto_categoria">
					  <b><option value="" selected="" >Seleccione una opción</option></b>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM producto");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['producto_id'].'" >'.$row['producto_nombre'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
					
				
	</div>
  
    <table border="1" class="table" id="transactionTable">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Observaciones</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
	
    <div class="form-group">
      <button id="botonDeEnvio" class="btn btn-primary mr-2" >Agregar Fila</button>
      <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Fila</button>
    </div>
  </div>
</div>
</form>
</div>

<?php 
				 

?>

<script type="text/javascript">
	const form = document.getElementById("transactionForm");
	
	
	form.addEventListener("submit", function(event) {
		event.preventDefault();
		const cod = document.getElementById("producto_categoria");
		const selected = cod.options[cod.selectedIndex];
		let transactionFormData = new FormData(form);

		let transactionTableRef = document.getElementById("transactionTable");
		
		let newTransactionRowRef = transactionTableRef.insertRow(-1);
		
			
		let newTypeCellRef = newTransactionRowRef.insertCell(0); 
		newTypeCellRef.textContent = transactionFormData.get(selected)

        newTypeCellRef = newTransactionRowRef.insertCell(1); 
		newTypeCellRef.textContent = transactionFormData.get("producto_categoria");

		newTypeCellRef = newTransactionRowRef.insertCell(2); 
		newTypeCellRef.textContent = transactionFormData.get("producto_categoria");

	    newTypeCellRef = newTransactionRowRef.insertCell(3); 
		newTypeCellRef.textContent = transactionFormData.get("producto_categoria");
	});
	
</script>
<script type="text/javascript">
function agregarFila(){

	document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td></td><td></td><td></td><td></td>';

}

function eliminarFila(){
  var table = document.getElementById("transactionTable");
  var rowCount = table.rows.length;
  //console.log(rowCount);
  
  if(rowCount <= 1)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
}
</script>
