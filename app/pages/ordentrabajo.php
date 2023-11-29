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
                        $workOrdersData = $workOrders->get_workOrder($_GET['ot']);
                        $workOrdersData = $workOrdersData[0];

                       
                        ?>
<form action="../processor/transactioner?tx=ot" method="POST">
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
              
              <input type="text" id="id" name="id" value="<?= $workOrdersData['vehicle_id'] ?>" hidden class="form-control ">
              <input type="text" id="action" name="action" value="edit" hidden class="form-control ">
              <input type="text" id="customer_id" name="customer_id" value="<?= $workOrdersData['customer_id'] ?>" hidden class="form-control ">

              <div class="row">
                <div class="col-2">
                <div class="input-group input-group-static mb-4">
                    <label class="ms-0">Fecha Ingreso</label>
                    <input type="date" required name="fecha_in" disabled id="fecha_in" value="<?= $workOrdersData['date_created'] ?>" class="form-control ">
                  </div>
                </div>
              </div>
              <h5>Datos Vehiculo:</h5>
                <div class="row">
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">Patente</label>
                      <input type="text" required id="patente" disabled value="<?= $workOrdersData['patente'] ?>" name="patente" class="form-control ">
                    </div>
                  </div>
                  <div class="col-1">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">Año</label>
                      <input type="text" name="anio" id="anio" value="<?= $workOrdersData['year'] ?>"  disabled required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Marca</label>
                      <select class="form-control" id="marca" disabled name="marca" required">
                        <option value="<?= $workOrdersData['make'] ?>"><?= $workOrdersData['make'] ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Modelo</label>
                      <select class="form-control" name="modelo" disabled id="modelo" required id="modelo">
                        <option value="<?= $workOrdersData['model'] ?>"><?= $workOrdersData['model'] ?></option>
                      </select>
                    </div>
                  </div>
                 
                </div>
                <h5>Datos Dueño:</h5>
                <div class="row">
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">Nombre Dueño</label>
                      <input type="text" name="nombre" id="nombre" value="<?= $workOrdersData['name'] ?>" disabled required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">RUT</label>
                      <input type="text" id="rut" value="<?= $workOrdersData['rut'] ?>" name="rut" disabled required class="form-control ">
                      <p id="mensaje"></p>
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">Correo Electronico</label>
                      <input type="email" name="email" value="<?= $workOrdersData['email'] ?>" id="email" disabled required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">Telefono</label>
                      <input type="text" name="telefono" value="<?= $workOrdersData['phone'] ?>" id="telefono" disabled  required class="form-control ">
                    </div>
                  </div>
                  <div class="col-3">
                  <div class="input-group input-group-static mb-4">
                      <label class="ms-0">Direccion</label>
                      <input type="text" name="direccion" id="direccion" value="<?= $workOrdersData['address'] ?>" disabled required class="form-control ">
                    </div>
                  </div>
                </div>
                <h5>Razon de visita:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                          <label for="exampleFormControlSelect1" class="ms-0">Razon</label>
                          <select class="form-control" id="razon" disabled  name="razon">
                              <option value="<?= $workOrdersData['reason_visit'] ?>"><?= $workOrdersData['reason_visit'] ?></option>
                          </select>
                    </div>
                  </div>
                  <label for="exampleFormControlSelect1" class="ms-0">Detalles</label>
                  <div class="input-group input-group-dynamic">
                    <textarea class="form-control"  disabled rows="3" name='description' spellcheck="false"><?= $workOrdersData['description'] ?>.</textarea>
                  </div>
                </div>
                <br>
                
            </div>
          </div>
        </div>
      </div>




    </div>
    </div>
    </div>


    </div>
    <div class="container-fluid py-4">
      <div class="row min-vh-60">
        <div class="col-12">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Materiales Utilizados</h5>
              </div>
            </div>
            <div class="card-body">
              <div id="products-container">
                <!-- Contenido existente -->
                <div class="row">
                  <div class="col-3">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Item</label>
                      <select class="form-control item" id="item" onchange="actualizarPrecio(this)" name="item[]">
                        <option value="">Seleccione un producto</option>
                        <?php
                          include '../controllers/InventoryController.php';
                          $inventory = new InventoryController();
                          $inventoryData = $inventory->get_inventories();
                          if ($inventoryData and count($inventoryData) > 0) {
                              // Recorre los resultados utilizando un bucle foreach
                              foreach ($inventoryData as $fila) { 
                                  $inventory_id = $fila['id'];
                                  $inventory_item = $fila['item'];
                                  $inventory_valor = $fila['valor'];
                                  echo "<option value=" . $inventory_id . " data-valor='" . $inventory_valor . "'>". $inventory_item ."</option>";
                              }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Cantidad</label>
                      <input type="text" required id="item_qty" name="cantidad[]"  onchange="actualizarPrecio(this)" value="1" class="form-control cantidad">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label for="total" class="ms-0">Precio Total</label>
                      <input type="text" id="total" name="total[]" class="form-control total" readonly>
                      </div>
                  </div>
                </div>
                <!-- Fin del contenido existente -->
                <div id="productos-dinamicos"></div>
            </div>
            <div class="col-3">
              <div class="input-group input-group-static mb-4 mt-4">
                <label for="exampleFormControlSelect1" class="ms-0">Aseguradora</label>
                <select class="form-control aseguradora" id="aseguradora" onchange="actualizarPrecio(this)" name="aseguradora">
                  <option value="">-- Aseguradora --</option>
                  <?php
                    include '../controllers/InsuranceController.php';
                    $insurance = new InsuranceController();
                    $insuranceData = $insurance->get_insurances();
                    if ($insuranceData and count($insuranceData) > 0) {
                        // Recorre los resultados utilizando un bucle foreach
                        foreach ($insuranceData as $fila) { 
                            $insurance_id = $fila['id'];
                            $insurance_start = $fila['start_date'];
                            $insurance_end = $fila['end_date'];
                            $insurance_razon_social = $fila['razon_social'];
                            $insurance_cobertura = $fila['cobertura'];
                            $insurance_status = ($insurance_end > date("Y-m-d")) ? "Vigente" : "Vencido";
                            if($insurance_status == "Vigente"){
                              echo "<option value=" . $insurance_id . " data-cobertura='" . $insurance_cobertura . "'>". $insurance_razon_social ."</option>";
                            }
                        }
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-1">
              <div class="input-group input-group-dynamic mb-4">
                <span class="input-group-text">$ CLP</span>
                <input type="text" id="suma-total" name="suma_total" class="form-control" readonly>
              </div>
            </div>
            <div class="col-1">
                <button  type="button" onclick="agregarProducto()" class="btn btn-primary">Agregar Producto</button>
            </div>
            <h5>Responsable:</h5>
            <div class="col-2">
              <div class="input-group input-group-static mb-4 mt-4">
                <label for="exampleFormControlSelect1" class="ms-0">Mecanico</label>
                <select class="form-control" id="mecanico" name="mecanico">
                  <option value="">-- MECANICO --</option>
                  <?php
                    include '../controllers/UserController.php';
                    $user = new UserController();
                    $userData = $user->get_mecanicos();
                    if ($userData and count($userData) > 0) {
                        // Recorre los resultados utilizando un bucle foreach
                        foreach ($userData as $fila) { 
                            $user_id = $fila['user_id'];
                            $user_name = $fila['user_name'];
                            echo "<option value=" . $user_id . ">". $user_name ."</option>";
                        }
                    }
                  ?>
                </select>
              </div>
            </div>
            
              <div class="" >
                  <button type="submit" class="btn bg-gradient-success btn-lg w-100 " style="justify-content: center;margin: auto;">Guardar</button>
              </div>
          </div>
        </div>
      </div>    
    </div>
</form> 

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
  <script>
let contadorProductos = 1; // Inicializamos en 1 ya que ya hay una fila existente.

function agregarProducto() {
      const container = document.getElementById("products-container");
      const nuevaFila = container.firstElementChild.cloneNode(true);

      contadorProductos++;

      // Cambia los IDs de los nuevos elementos
      const nuevoItem = nuevaFila.querySelector(".item");
      nuevoItem.id = `producto${contadorProductos}`;

      const nuevaCantidad = nuevaFila.querySelector(".cantidad");
      nuevaCantidad.id = `cantidad${contadorProductos}`;
      nuevaCantidad.setAttribute("data-valor", "0"); // Puedes establecerlo en el valor predeterminado deseado

      const nuevoTotal = nuevaFila.querySelector(".total");
      nuevoTotal.id = `total${contadorProductos}`;
      nuevoTotal.value = ""; // Limpia el valor del nuevo total

      container.appendChild(nuevaFila);
    }

    function actualizarPrecio(elemento) {
      const container = elemento.closest(".row");
      const selectItem = container.querySelector(".item");
      const valorSeleccionado = selectItem.options[selectItem.selectedIndex].getAttribute("data-valor");
      const cantidadInput = container.querySelector(".cantidad");
      const totalInput = container.querySelector(".total");
      const sumaTotalInput = document.getElementById("suma-total");
      let sumaTotal = 0;
      const cantidad = cantidadInput.value;
      const precioTotal = valorSeleccionado * cantidad;
      // Obtener el valor de la cobertura de la aseguradora seleccionada
      const selectAseguradora = document.getElementById("aseguradora");
      const cobertura = selectAseguradora.options[selectAseguradora.selectedIndex].getAttribute("data-cobertura");

      totalInput.value = precioTotal;
      
      // Recorre todas las filas y suma los totales
      const filas = document.querySelectorAll("#products-container .row");
      filas.forEach((fila) => {
        console.log(fila);
          const totalInput = fila.querySelector(".total");
          const total = parseFloat(totalInput.value) || 0; // Convierte el valor a número, o usa 0 si no es un número
          sumaTotal += total;
      });
      // Aplicar descuento de la cobertura
      if (cobertura) {
        const descuento = sumaTotal * cobertura;
        sumaTotal -= descuento;
      }
      sumaTotalInput.value = sumaTotal.toFixed(0); // Formatea el resultado con dos decimales
      
    }
  </script>
</body>

</html>