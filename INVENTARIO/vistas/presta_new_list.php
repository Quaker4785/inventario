<div class="container is-fluid mb-4">
    <h1 class="title">Prestamos</h1>
    <h2 class="subtitle">Lista</h2>
    <?php
include "./inc/btn_back.php";

?>
</div>

<div class="container  pb-4 pt-4">
<div class="form-rest mb-6 mt-6"></div>

    <!-- ./php/producto_guardar.php   FormularioAjax"-->	
	<form action="./php/presta_guardar.php" method="POST" class=""  autocomplete="off" enctype="multipart/form-data" >
    <div class="row"> 
       <div class="col">
       <div class="columns" >
		  	<div class="column">
		    	<div class="control" >
				<b><font color="blue"><label>Fecha de Salida</label></font></b>
				  	<input class="input form-control"  type="date" name="fecha_salida" pattern="" maxlength="70" required >
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Telefono responsable del prestamo</label></font></b>
				  	<input class="input" type="text" name="tel_presta"  pattern="[0-9.]{1,25}" maxlength="25" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	
			  <div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Comentario de Prestamo</label></font></b>
                      <textarea class="form-control" name="producto_comenta" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" id="exampleFormControlTextarea1" rows="3" required ></textarea>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
				<b><font color="blue"><label>Responsable del prestamo</label></font></b>
				  	<input class="input" type="text" name="producto_respon" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="100" required >
				</div>
		  	</div>
	  </div>
     
	    <div class="columns">
		  	
              </div> 
            <?php
                require_once "./php/main.php";
            
            
            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $pagina=limpiar_cadena($pagina);
            $url="index.php?vista=presta_new_list&page=";
            $registros=15;
            $busqueda="";

            # Paginador usuario #
            require_once "./php/prestamo_lista.php";
            ?>
        </div>
    </div>
    
    <p class="has-text-centered">
			<button type="submit"   class="button is-link is-medium is-rounded">Guardar</button>
		</p>
       
        <div class="col"> 
            <div class="table-responsive">
                <table id="target" class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th >#</th>
                    <th>codigo</th>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
	        </div>
     
    </div>
  
    
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script type="text/javascript">



function add(button) {
    var row = button.parentNode.parentNode;
    var cells = row.querySelectorAll('td:not(:last-of-type)');
    addToCartTable(cells);
}

function remove() {
	var row = this.parentNode.parentNode;
    document.querySelector('#target tbody')
            .removeChild(row);
}

function addToCartTable(cells) {
   var cod = cells[0].innerText;
   var code = cells[1].innerText;
   var name = cells[3].innerText;
   var price = cells[4].innerText;
   
   var newRow = document.createElement('tr');
   newRow.appendChild(createCell(cod));
   newRow.appendChild(createCell(code));
   newRow.appendChild(createCell(name));
   newRow.appendChild(createCell(price));
   var cellInputQty = createCell();
   cellInputQty.appendChild(createInputQty());
   newRow.appendChild(cellInputQty);
   var cellRemoveBtn = createCell();
   cellRemoveBtn.appendChild(createRemoveBtn())
   newRow.appendChild(cellRemoveBtn);
   
   document.querySelector('#target tbody').appendChild(newRow);
   //window.location.href = window.location.href + "?w1=" + cod;

   
}

function createInputQty() {
	var inputQty = document.createElement('input');
  inputQty.type = 'number';
  inputQty.required = 'true';
  inputQty.min = 1;
  inputQty.className = 'form-control'
  return inputQty;
}

function createRemoveBtn() {
	var btnRemove = document.createElement('button');
  btnRemove.className = 'btn btn-xs btn-danger';
  btnRemove.onclick = remove;
  btnRemove.innerText = 'Descartar';
  return btnRemove;
}

function createCell(text) {
	var td = document.createElement('td');
  if(text) {
  	td.innerText = text;
    
  }
  return td;
}
</script>
