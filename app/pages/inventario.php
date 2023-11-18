<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    AUTOMOTIVE - Inventario
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
  <script src="../assets/js/inventory.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
<?php require_once('../pages/template/sidebar.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " id="miTabla">
    <!-- Navbar -->
    <?php require_once('./template/navbar.php'); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4" >
      <div class="row min-vh-6">
        <div class="col-12 excluir">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Ingreso de Items</h5>
              </div>
            </div>
            <div class="card-body">
              <form action="../processor/transactioner?tx=inventory" method="POST">
              <input type="text" id="id" name="id" value="" hidden class="form-control ">
              <input type="text" id="action" name="action" value="new" hidden class="form-control ">

              <div class="row">
                    <div class="col-3">
                        <div class="input-group input-group-static mb-4 mt-4  col">
                            <label class="form-label">Nombre Item</label>
                            <input type="text" required id="item" name="item" class="form-control ">
                            </div>
                    </div>
                    <div class="col-1">
                        <div class="input-group input-group-static mb-4 mt-4  col">
                            <label class="form-label">Cantidad</label>
                            <input type="number" required id="cantidad" name="cantidad" class="form-control ">
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="input-group input-group-static mb-4 mt-4  col">
                            <label class="form-label">Umbral</label>
                            <input type="number" required id="umbral" name="umbral" class="form-control ">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group input-group-static mb-4 mt-4  col">
                            <label class="form-label">Valor</label>
                            <input type="text" required id="valor" name="valor" class="form-control ">
                        </div>
                    </div>
                    <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Categoria</label>
                      <select class="form-control" id="categoria" name="categoria" required>
                        <option value="">Selecciona una categoria</option>
                        <option value="Herramientas">Herramientas</option>
                        <option value="Pinturas">Pinturas</option>
                        <option value="Repuestos">Repuestos</option>
                        <option value="Manufactura">Manufactura</option>
                      </select>
                    </div>
                  </div>
                </div>
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

      

      <br>
      <br>
     <!-- TABLAS -->
     <center>
      <img src="../assets/img/logonegro.png" id="logoreporte" style="width:50%;height: auto;margin-top:-50px;display:none" alt="main_logo">
</center>
      <div class="row" >
      <button onclick="imprimir()" class="btn btn-info float-end col-2 excluir" style="margin-left:20px">Generar PDF desde la Tabla</button>
        <div class="col-12">
            
          <div class="card my-4">
            
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              
                <h6 class="text-white text-capitalize ps-3">Items Registrados</h6> 
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Categoria</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        include '../controllers/InventoryController.php';
                        $inventory = new InventoryController();
                        $inventoryData = $inventory->get_inventories();
                        if ($inventoryData and count($inventoryData) > 0) {
                            // Recorre los resultados utilizando un bucle foreach
                            foreach ($inventoryData as $fila) { 
                                $inventory_id = $fila['id'];
                                $inventory_item = $fila['item'];
                                $inventory_cantidad = $fila['cantidad'];
                                $inventory_umbral = $fila['umbral'];
                                $inventory_valor = $fila['valor'];
                                $inventory_categoria = $fila['categoria'];
                                $jsonData = json_encode(array(
                                    'id' => $inventory_id,
                                    'item' => $inventory_item,
                                    'cantidad' => $inventory_cantidad,
                                    'umbral' => $inventory_umbral,
                                    'valor' => $inventory_valor,
                                    'categoria' => $inventory_categoria
                                ));
                                
                                
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlINmd7_KuJCeto_o1ztIOmu3bywoMNxGifBcoHwYUzw&s" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $inventory_item ?></h6>
                            <p class="text-xs text-secondary mb-0">$<?= $inventory_valor ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $inventory_categoria ?></p>
                        <p class="text-xs text-secondary  mb-0">umbral min: <?= $inventory_umbral ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm <?php echo ($inventory_umbral < $inventory_cantidad) ? 'bg-gradient-success' : 'bg-gradient-danger' ?> bg-gradient-secondary"><?php echo ($inventory_umbral < $inventory_cantidad) ? 'Normal' : 'Critico' ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $inventory_cantidad ?></span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs text-warning excluir" data-toggle="tooltip" onclick="CargaData(<?php echo htmlspecialchars($jsonData, ENT_QUOTES, 'UTF-8') ?> )" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                      <td class="align-middle">
                        <a class="text-secondary font-weight-bold text-xs text-danger excluir" data-toggle="tooltip" href="../processor/transactioner?tx=inventory&id=<?php echo $inventory_id ?>&action=delete" data-original-title="Delete user">
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
            </div>
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