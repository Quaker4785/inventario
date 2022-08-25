
 <nav class="navbar navbar-expand-lg bg-light">
 <div class="navbar-brand">
        <a  href="index.php?vista=home">
        <img src="./img/fhv.png" width="100" height="700" class="img-rounded">
        </a>
</div>
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php?vista=home"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" >Fundación Herencia Viva</font></font></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Empleados
              </font></font></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?vista=person_new" ><i class="fa fa-check"></i>&nbsp;Nuevo</a></li>
                <li><a class="dropdown-item" href="index.php?vista=person_list" ><span class="bi bi-clipboard-data"></span>&nbsp;Lista</a></li>
                <li><a class="dropdown-item" href="index.php?vista=busca_perso" ><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Usuarios
              </font></font></a>
              <ul class="dropdown-menu">
<!--user_new --><li><a class="dropdown-item" href="index.php?vista=user_enter" class="navbar-item"><i class="fa fa-check"></i>&nbsp;Nuevo usuario</a></li>
                <li><a class="dropdown-item" href="index.php?vista=user_list" class="navbar-item"><span class="bi bi-clipboard-data"></span>&nbsp;Lista</a></li>
                <li><a class="dropdown-item" href="index.php?vista=busca_usua" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a></li>
                <li class="divider">_________________________</li>
                <li><a class="dropdown-item" href="index.php?vista=user_tip_new" class="navbar-item"><i class="fa fa-check"></i>&nbsp;Tipo Usuario</a></li>
                <li><a class="dropdown-item" href="index.php?vista=tip_user_list" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Tipo Usuario Lista</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Categorías
              </font></font></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?vista=category_new" class="navbar-item"><i class="fa fa-check"></i>&nbsp;Nueva</a></li>
                <li><a class="dropdown-item" href="index.php?vista=category_list" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Lista</a></li>
                <li><a class="dropdown-item" href="index.php?vista=busca_catego" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Productos
              </font></font></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?vista=product_new" class="navbar-item"><i class="fa fa-cart-plus"></i>&nbsp;Nuevo</a></li>
                <li><a class="dropdown-item" href="index.php?vista=product_list_prueba" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Lista</a></li>
                <li><a class="dropdown-item" href="index.php?vista=product_category" class="navbar-item"><i class="bi bi-grid-1x2-fill"></i>&nbsp;Por categoría</a></li>
                <li><a class="dropdown-item" href="index.php?vista=busca_produc" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Propietario
              </font></font></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?vista=propier_new" class="navbar-item"><i class="fa fa-cart-plus"></i>&nbsp;Nuevo</a></li>
                <li><a class="dropdown-item" href="index.php?vista=propier_list" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Lista</a></li>
                <li><a class="dropdown-item" href="index.php?vista=" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Prestamos
              </font></font></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?vista=presta_new_list" class="navbar-item"><i class="fa fa-cart-plus"></i>&nbsp;Nuevo prestamo</a></li>
                <li><a class="dropdown-item" href="index.php?vista=#" class="navbar-item"><i class="bi bi-clipboard-data"></i>&nbsp;Lista</a></li>
                <li><a class="dropdown-item" href="index.php?vista=#" class="navbar-item"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Buscar</a>
              </ul>
            </li>
        </ul>
          <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="btn btn-primary is-rounded">
                        Mi cuenta
                    </a>
                    &nbsp; &nbsp;
                    <a href="index.php?vista=logout" class=" btn btn-danger button"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    &nbsp;  Salir  
                    </a>
                </div>
            </div>
    </div> 
        </div>
      </div>
    </nav>