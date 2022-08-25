<div class="container is-fluid mb-6">
    <h1 class="title">Empleados</h1>
    <h2 class="subtitle">Lista de Empleados</h2>
</div>

<div class="container pb-6 pt-6">  
    <?php
        require_once "./php/main.php";
        
     include "./inc/btn_back.php";
	
        # Eliminar usuario #
        if(isset($_GET['user_id_del'])){
            require_once "./php/usuario_eliminar.php";
        }

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=person_list&page=";
        $registros=15;
        $busqueda="";

        # Paginador usuario #
        require_once "./php/persona_lista.php";
    ?>
</div>