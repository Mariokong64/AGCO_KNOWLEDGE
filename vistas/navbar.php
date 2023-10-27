<header>

  <!----------------------------------------------
            MENU SUPERIOR (Barra de navegación)
    ---------------------------------------------->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

      <a class="navbar-brand" href="#">

        <img src="vistas/img/agco_large_logo2.png" alt="" style="width: 200px;">

      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto">

          <li class="nav-item">

            <a class="nav-link active" aria-current="page" href="inicio">Inicio</a>

          </li>

          <!-- Botón de los módulos -->

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

              Módulos

            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="agcosolutions">Agco Solution</a></li>
              <li><a class="dropdown-item" href="intelisis">Intélisis</a></li>
              <li><a class="dropdown-item" href="internet">Internet</a></li>
              <li><a class="dropdown-item" href="office">Office</a></li>
              <li><a class="dropdown-item" href="windows">Windows</a></li>
              <li><a class="dropdown-item" href="servidores">Servidores</a></li>
              <li><a class="dropdown-item" href="afsystem">AGCO AF System</a></li>
              <li><a class="dropdown-item" href="wiki">Wiki</a></li>
              <li><a class="dropdown-item" href="otros">Otros</a></li>

            </ul>

          </li>

          <!-- Botón de los usuarios -->
          <?php
          if ($_SESSION["perfil"] == "Administrador") {

            echo
            '<li class="nav-item">

            <a class="nav-link" href="usuarios">Usuarios</a>

          </li>';
          }

          ?>

          <!-- Botón de la documentación -->

          <li class="nav-item">

            <a class="nav-link" href="documentacion">Documentación</a>

          </li>

          <!-- Botón de usuarios para cerrar sesión -->

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: bold;">

              <?php echo $_SESSION["usuario"]; ?>

            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="salir">Cerrar Sesión</a></li>

            </ul>

          </li>

        </ul>

        <!-- Sección de buscar 

        <form class="d-flex">

          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">

          <button class="btn btn-outline-success" type="submit">Buscar</button>

        </form>

        -->

      </div>

    </div>

  </nav>

</header>