<!DOCTYPE html>
<html lang="es">
<body>
<?php
     include "./inc/btn_back.php";
	?>
        <div class="container py-6 text-center">
            <div class="container is-fluid mb-6">
     <h1 class="title">Productos</h1>
     <h2 class="subtitle">Buscar Producto</h2>
        </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <form action="" method="post">
                        <label for="campo">Buscar: </label>
                        <input  class="form-control" placeholder="Buscador (Nombre - Ubicación)" type="text" name="campo" id="campo">
                        <br>
                    </form>
                </div>
            </div>
            <div class="table-container form-control">
                
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth ">
                        <thead>
                        <tr class="has-text-centered">
                       <!-- <b><th>Num. empleado</th></b>-->
                        <b><th>Código</th></b>
                        <b><th>Nombre</th></b>
                        <b><th>Unidad</th></b>
                        <b><th>Stock</th></b>
                        <b><th>Ubicación</th></b>
                        <b><th>Referencia</th></b>
                        <b><th>Contenedor</th></b>
                        <b><th>Categoria</th></b>
                        <b><th>Fecha</th></b>
                        <b><th>Propietario</th></b>
                        <b><th>Foto</th></b>
                        <b><th colspan="3">Opciones</th></b>
                            </tr>
                        </thead>
                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   
    <script>
        /* Llamando a la función getData() */
        
        getData()
        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("campo").addEventListener("keyup", getData)
        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "./php/load_produc.php"
            let formaData = new FormData()
            formaData.append('campo', input)
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
