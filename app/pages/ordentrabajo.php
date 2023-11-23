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
    <div class="container-fluid py-4">
      <div class="row min-vh-6">
        <div class="col-12 excluir">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Orden de trabajo</h5>
              </div>
            </div>
            <div class="card-body">
              <form action="../processor/transactioner?tx=worker" method="POST">
                <input type="text" id="id" name="id" value="" hidden class="form-control ">
                <input type="text" id="action" name="action" value="new" hidden class="form-control ">


                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Vehiculo a reparar</label>
                      <select class="form-control" id="cargo" name="cargo" required>
                        <option value="1">1 - Mazda Artis</option>
                        <option value="2">2 - Daihatsu cuore</option>
                        <option value="3">3 - Chevrolet Aska</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Aseguradora</label>
                      <select class="form-control" id="cargo" name="cargo" required>
                        <option value="1">Bci</option>
                        <option value="2">Liberty</option>
                        <option value="3">Mapre</option>
                        <option value="4">Fallabella Seguros</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="iinput-group input-group-static mb-4">
                      <label>Fecha Ingreso</label>
                      <input type="date" required name="fecha_in" id="fecha_in" class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Estado</label>
                      <select class="form-control" id="cargo" name="cargo" required>
                        <option value="1">Desabolladura</option>
                        <option value="2">Pintura</option>
                        <option value="3">Listo para entrega</option>
                        <option value="4">Despachado</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rut</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cargo</th>
                          <th class="text-secondary opacity-7"></th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include '../controllers/WorkerController.php';
                        $Worker = new WorkerController();
                        $WorkerData = $Worker->getTrabajadores();
                        if ($WorkerData and count($WorkerData) > 0) {
                          // Recorre los resultados utilizando un bucle foreach
                          foreach ($WorkerData as $fila) {
                            $worker_id = $fila['id'];
                            $worker_rut = $fila['rut'];
                            $worker_nombre = $fila['nombre'];
                            switch ($fila['id_worker_role']) {
                              case '1':
                                $worker_cargo = "Desabollador";
                                break;
                              case '2':
                                $worker_cargo = "Pintor";
                                break;
                              case '3':
                                $worker_cargo = "Preparador";
                                break;
                              case '4':
                                $worker_cargo = "Pulidor";
                                break;
                              case '5':
                                $worker_cargo = "Mecanico";
                                break;

                              default:
                                $worker_cargo = "Desabollador";
                                break;
                            }
                            $jsonData = json_encode(array(
                              'worker_id' => $worker_id,
                              'worker_rut' => $worker_rut,
                              'worker_nombre' => $worker_nombre,
                              'worker_cargo' => $fila['id_worker_role']
                            ));


                        ?>
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div>
                                    <img src="https://cdn.iconscout.com/icon/free/png-256/free-user-1648810-1401302.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?= $worker_rut ?></h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $worker_nombre ?></p>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $worker_cargo ?></span>
                              </td>
                              <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs text-warning excluir" data-toggle="tooltip" onclick="CargaData(<?php echo htmlspecialchars($jsonData, ENT_QUOTES, 'UTF-8') ?> )" data-original-title="Edit user">
                                  Edit
                                </a>
                              </td>
                              <td class="align-middle">
                                <a class="text-secondary font-weight-bold text-xs text-danger excluir" data-toggle="tooltip" href="../processor/transactioner?tx=worker&id=<?php echo $worker_id ?>&action=delete" data-original-title="Delete user">
                                  Borrar
                                </a>
                              </td>
                            </tr>
                        <?php
                          }
                        } else {
                          echo "&#160;&#160;&#160;&#160;&#160;No se encontraron resultados";
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>



      <br>
      <br>
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