<div class="container is-fluid mb-6">
	<h1 class="title">Prestamos</h1>
	<h2 class="subtitle">Nuevo Prestamo</h2>
	
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
		
	?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div class="table-responsive">
<table id="source" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Código</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>C1483</td>
      <td>Laptop HP CX44</td>
      <td>$844.90</td>
      <td>
        <button onclick="add(this)" class="btn btn-primary btn-xs">
          Agregar
        </button>
      </td>
    </tr>
  </tbody>
</table>
</div>

<div class="table-responsive">
<table id="target" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>

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
   var code = cells[1].innerText;
   var name = cells[2].innerText;
   var price = cells[3].innerText;
   
   var newRow = document.createElement('tr');
   
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
