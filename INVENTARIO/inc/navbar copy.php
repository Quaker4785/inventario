
<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
        <img src="./img/fhv.png" width="100" height="300">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        
        </a>
    </div>

    <div id="navbarBasicExample" class="icon-bar, navbar-menu">
        <div class="navbar-start">
          <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link"><i class="fa fa-fw fa-user"></i>&nbsp;Empleados</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=person_new" class="navbar-item"><i class="fa fa-check"></i>&nbsp;Nuevo</a>
                    <a href="index.php?vista=person_list" class="navbar-item"><span class="bi bi-clipboard-data"></span>&nbsp;Lista</a>
                    <a href="index.php?vista=busca_perso" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link"><i class="fa fa-fw fa-user"></i>&nbsp;Usuarios</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=user_new" class="navbar-item"><i class="fa fa-check"></i>&nbsp;Nuevo</a>
                    <a href="index.php?vista=user_list" class="navbar-item"><span class="bi bi-clipboard-data"></span>&nbsp;Lista</a>
                    <a href="index.php?vista=user_search" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link"><i class="fa fa-book fa-fw"></i>&nbsp;Categorías</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_new" class="navbar-item"><i class="fa fa-check"></i>&nbsp;Nueva</a>
                    <a href="index.php?vista=category_list" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Lista</a>
                    <a href="index.php?vista=category_search" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link"><i class="fa fa-shopping-cart"></i>&nbsp;Productos</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=product_new" class="navbar-item"><i class="fa fa-cart-plus"></i>&nbsp;Nuevo</a>
                    <a href="index.php?vista=product_list_prueba" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Lista</a>
                    <a href="index.php?vista=product_category" class="navbar-item"><i class="bi bi-grid-1x2-fill"></i>&nbsp;Por categoría</a>
                    <a href="index.php?vista=product_search" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
                </div>
            </div>

        </div>
        
        
    </div>
    
    <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="button is-primary is-rounded">
                        Mi cuenta
                    </a>

                    <a href="index.php?vista=logout" class=" btn btn-danger button is-link"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    &nbsp;  Salir  
                    </a>
                </div>
            </div>
    </div> 
</nav>