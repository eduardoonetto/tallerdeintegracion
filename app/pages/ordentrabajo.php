<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    AUTOMOTIVE - Orden de trabajo
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="../assets/js/trabajadores.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php require_once('../pages/template/sidebar.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " id="miTabla">
    <!-- Navbar -->
    <?php require_once('./template/navbar.php'); ?>
    <!-- End Navbar -->
    <br>
    <?php
                        include '../controllers/WorkOrdersController.php';
                        $workOrders = new WorkOrdersController();
                        var_dump($_GET['ot']);
                        $workOrdersData = $workOrders->get_workOrder($_GET['ot']);
                        $workOrdersData = $workOrdersData[0];
                        var_dump($workOrdersData);

                       
                        ?>
    <div class="container-fluid py-4">
      <div class="row min-vh-80">
        <div class="col-12">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Informacion Vehiculo</h5>
              </div>
            </div>
            <div class="card-body">
              <form action="../processor/transactioner?tx=vehicle" method="POST">
              <input type="text" id="id" name="id" value="" hidden class="form-control ">
              <input type="text" id="action" name="action" value="edit" hidden class="form-control ">
              <input type="text" id="customer_id" name="customer_id" value="" hidden class="form-control ">

              <div class="row">
                <div class="col-2">
                  <div class="input-group  input-group-static mb-4">
                    <label >Fecha Ingreso</label>
                    <input type="date" required name="fecha_in" disabled id="fecha_in" class="form-control ">
                  </div>
                </div>
              </div>
              <h5>Datos Vehiculo:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4  col">
                      <label class="form-label">Patente</label>
                      <input type="text" required id="patente" disabled name="patente" class="form-control ">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="input-group input-group-static mb-4 mt-4  col">
                      <label class="form-label">Año</label>
                      <input type="text" name="anio" id="anio" disabled required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Marca</label>
                      <select class="form-control" id="marca" disabled name="marca" required onchange="cambiarModelos()">
                        <option value="">Selecciona una marca</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Ford">Ford</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="BMW">BMW</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Audi">Audi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Modelo</label>
                      <select class="form-control" name="modelo" disabled id="modelo" required id="modelo">
                        <option value="">Selecciona una marca primero</option>
                      </select>
                    </div>
                  </div>
                 
                </div>
                <h5>Datos Dueño:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Nombre Dueño</label>
                      <input type="text" name="nombre" id="nombre" disabled required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">RUT</label>
                      <input type="text" id="rut" name="rut" disabled required class="form-control ">
                      <p id="mensaje"></p>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Correo Electronico</label>
                      <input type="email" name="email" id="email" disabled required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Telefono</label>
                      <input type="text" name="telefono" id="telefono" disabled  required class="form-control ">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Direccion</label>
                      <input type="text" name="direccion" id="direccion" disabled required class="form-control ">
                    </div>
                  </div>
                </div>
                <h5>Razon de visita:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                        <label for="exampleFormControlSelect1" class="ms-0">Razon</label>
                        <select class="form-control" id="razon" disabled  name="razon">
                            <option value="">Selecciona una razon</option>
                            <option value="Desabolladura">Desabolladura</option>
                            <option value="Pintura">Pintura</option>
                            <option value="Desabolladura y Pintura">Desabolladura y Pintura</option>
                        </select>
                    </div>
                  </div>
                  <label for="exampleFormControlSelect1" class="ms-0">Detalles</label>
                  <div class="input-group input-group-dynamic">
                    <textarea class="form-control"  disabled rows="5" placeholder="Mas informacion aqui:" name='description' spellcheck="false"></textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
                
      <!-- TABLAS -->
      <center>
        <img src="../assets/img/logonegro.png" id="logoreporte" style="width:50%;height: auto;margin-top:-50px;display:none" alt="main_logo">
      </center>

      <br>



    </div>
    </div>
    </div>


    </div>
  </main>
  <?php require_once('./template/customizer.php'); ?>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/world.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>

</body>

</html>