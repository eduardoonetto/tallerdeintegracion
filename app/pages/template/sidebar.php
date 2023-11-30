<?php 
$url = $_SERVER['REQUEST_URI'];
// Divide la URL en partes usando "?"
$parts = explode('?', $url);

// Toma la primera parte que contiene el path
$path = $parts[0];

// Divide el path en partes usando "/"
$path_parts = explode('/', $path);

// Filtra las partes vacías (pueden haber barras dobles, como "//")
$path_parts = array_filter($path_parts);

// Obtiene el último valor
$last_value = end($path_parts);

  
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logo-ct.png" class="" style="width:100%;height: auto;margin-top: -60px;" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN','SUPERVISOR'])){?>
        <li class="nav-item">
          <a class="nav-link text-white  <?php echo (strpos($last_value, 'dashboard')!==false ? 'active bg-gradient-primary': '' ) ?> " href="../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Cuadro de Mando</span>
          </a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN','SUPERVISOR','MECANICO'])){?>
        <li class="nav-item">
          <a class="nav-link text-white <?php if(strpos($last_value, 'ots') !==false  or strpos($last_value, 'ordentrabajo') !==false) { echo 'active bg-gradient-primary';} ?>" href="../pages/ots.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">list</i>
            </div>
            <span class="nav-link-text ms-1">Orden De Trabajo</span>
          </a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN','SUPERVISOR','MECANICO'])){ ?>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (strpos($last_value, 'vehicles')!==false ? 'active bg-gradient-primary': '' ) ?>" href="../pages/vehicles.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">directions_car</i>
            </div>
            <span class="nav-link-text ms-1">Vehiculos</span>
          </a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN','SUPERVISOR'])){?>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (strpos($last_value, 'postventa')!==false ? 'active bg-gradient-primary': '' ) ?>" href="../pages/postventa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_shipping</i>
            </div>
            <span class="nav-link-text ms-1">Post-Venta</span>
          </a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN','SUPERVISOR'])){?>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (strpos($last_value, 'aseguradora')!==false ? 'active bg-gradient-primary': '' ) ?>" href="../pages/aseguradora.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
            </div>
            <span class="nav-link-text ms-1">Aseguradoras</span>
          </a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN','SUPERVISOR','BODEGA', 'MECANICO'])){?>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (strpos($last_value, 'inventario')!==false ? 'active bg-gradient-primary': '' ) ?>" href="../pages/inventario.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory_2</i>
            </div>
            <span class="nav-link-text ms-1">Inventario</span>
          </a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['usuario']['Role_Name'], ['ADMIN'])){?>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (strpos($last_value, 'usuarios')!==false ? 'active bg-gradient-primary': '' ) ?>" href="../pages/usuarios.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">manage_accounts</i>
            </div>
            <span class="nav-link-text ms-1">Trabajadores</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
    
  </aside>