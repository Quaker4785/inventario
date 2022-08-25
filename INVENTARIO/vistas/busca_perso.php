<!DOCTYPE html>
<html lang="es">
<body>
<?php
     include "./inc/btn_back.php";
	?>
        <div class="container py-6 text-center">
            <div class="container is-fluid mb-6">
     <h1 class="title">Empleados</h1>
     <h2 class="subtitle">Lista de Empleados</h2>
        </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <form action="" method="post">
                        <label for="campo">Buscar: </label>
                        <input  class="form-control" placeholder="Buscador (Nombre - Apellido - DPI)" type="text" name="campo" id="campo">
                        <br>
                    </form>
                </div>
            </div>
            <div class="table-container form-control">
                
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth ">
                        <thead>
                        <tr class="has-text-centered">
                       <!-- <b><th>Num. empleado</th></b>-->
                        <b><th>Nombre</th></b>
                        <b><th>Apellido</th></b>
                        <b><th>telefono</th></b>
                        <b><th>DPI</th></b>
                        <b><th colspan="2">Opciones</th></b>
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
            let url = "./php/load_person.php"
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
