<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  AUTOMOTIVE - Vehiculos
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
</head>

<body class="g-sidenav-show  bg-gray-200">
<?php require_once('../pages/template/sidebar.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php require_once('./template/navbar.php'); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row min-vh-80">
        <div class="col-12">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Ingreso de Vehiculos</h5>
              </div>
            </div>
            <div class="card-body">
              <form action="../processor/transactioner?tx=vehicle" method="POST">
              <input type="text" id="id" name="id" value="" hidden class="form-control ">
              <input type="text" id="action" name="action" value="new" hidden class="form-control ">
              <input type="text" id="customer_id" name="customer_id" value="" hidden class="form-control ">

              <div class="row">
                <div class="col-2">
                  <div class="input-group  input-group-static mb-4">
                    <label >Fecha Ingreso</label>
                    <input type="date" required name="fecha_in" id="fecha_in" class="form-control ">
                  </div>
                </div>
              </div>
              <h5>Datos Vehiculo:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4  col">
                      <label class="form-label">Patente</label>
                      <input type="text" required id="patente" name="patente" class="form-control ">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="input-group input-group-static mb-4 mt-4  col">
                      <label class="form-label">Año</label>
                      <input type="text" name="anio" id="anio" required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Marca</label>
                      <select class="form-control" id="marca" name="marca" required onchange="cambiarModelos()">
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
                      <select class="form-control" name="modelo" id="modelo" required id="modelo">
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
                      <input type="text" name="nombre" id="nombre" required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">RUT</label>
                      <input type="text" id="rut" name="rut" required class="form-control ">
                      <p id="mensaje"></p>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Correo Electronico</label>
                      <input type="email" name="email" id="email" required class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Telefono</label>
                      <input type="text" name="telefono" id="telefono"  required class="form-control ">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">Direccion</label>
                      <input type="text" name="direccion" id="direccion" required class="form-control ">
                    </div>
                  </div>
                </div>
                <h5>Razon de visita:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                        <label for="exampleFormControlSelect1" class="ms-0">Razon</label>
                        <select class="form-control" id="razon"  name="razon">
                            <option value="">Selecciona una razon</option>
                            <option value="Desabolladura">Desabolladura</option>
                            <option value="Pintura">Pintura</option>
                            <option value="Desabolladura y Pintura">Desabolladura y Pintura</option>
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
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Autos Ingresados</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Marca/Modelo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha Ingreso</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        include '../controllers/VehicleController.php';
                        $vehicle = new VehicleController();
                        $vehicleData = $vehicle->get_vehicles_customers();

                        if ($vehicleData) {
                            // Recorre los resultados utilizando un bucle foreach
                            foreach ($vehicleData as $fila) { 
                                $customer_name = $fila['name'];
                                $customer_email = $fila['email'];
                                $customer_phone = $fila['phone'];
                                $customer_address = $fila['address'];
                                $customer_rut = $fila['rut'];
                                $vehicle_make = $fila['make'];
                                $vehicle_model = $fila['model'];
                                $vehicle_date_in = $fila['date_in'];
                                $vehicle_id = $fila['id'];
                                $vehicle_customer_id = $fila['customer_id'];
                                $vehicle_reason_visit = $fila['reason_visit'];
                                $vehicle_year = $fila['year'];
                                $vehicle_patente = $fila['patente'];
                                $jsonData = json_encode(array(
                                    "customer_name" => $customer_name,
                                    "customer_email" => $customer_email,
                                    "customer_phone" => $customer_phone,
                                    "customer_address" => $customer_address,
                                    "customer_rut" => $customer_rut,
                                    "vehicle_make" => $vehicle_make,
                                    "vehicle_model" => $vehicle_model,
                                    "vehicle_date_in" => $vehicle_date_in,
                                    "vehicle_id" => $vehicle_id,
                                    "vehicle_customer_id" => $vehicle_customer_id,
                                    "vehicle_reason_visit" => $vehicle_reason_visit,
                                    "vehicle_year" => $vehicle_year,
                                    "vehicle_patente" => $vehicle_patente
                                ));
                                
                                
                                
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="https://cdn4.iconfinder.com/data/icons/business-soft/512/warning_web_stop_road_traffic_information_law-512.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $customer_name ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $customer_email ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $vehicle_make ?> ● <?= $vehicle_patente ?></p>
                        <p class="text-xs text-secondary mb-0"><?= $vehicle_model ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Pendiente</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $vehicle_date_in ?></span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs text-warning" data-toggle="tooltip" onclick="CargaData(<?php echo htmlspecialchars($jsonData, ENT_QUOTES, 'UTF-8') ?> )" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                      <td class="align-middle">
                        <a class="text-secondary font-weight-bold text-xs text-danger" data-toggle="tooltip" href="../processor/transactioner?tx=vehicle&id=<?php echo $vehicle_id ?>&action=delete" data-original-title="Delete user">
                          Borrar
                        </a>
                      </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo"NO SE ENCONTRARON REGISTROS";
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
  <script>
        const rutInput = document.getElementById("rut");
        const mensaje = document.getElementById("mensaje");

        rutInput.addEventListener("input", validarRUT);

        function validarRUT() {
            mensaje.textContent = "";

            let rut = rutInput.value.trim();

            // Eliminar cualquier guion medio ya existente
            rut = rut.replace("-", "");

            // Obtener el último dígito
            const ultimoDigito = rut.charAt(rut.length - 1);

            // Verificar si el último dígito es un número
            if (!isNaN(ultimoDigito)) {
                // Agregar un guion medio antes del último dígito
                rut = rut.slice(0, -1) + "-" + ultimoDigito;
                rutInput.value = rut;

                if (Fn.validaRut(rut)) {
                    mensaje.textContent = "RUT válido.";
                } else {
                    mensaje.textContent = "RUT inválido.";
                }
            }
        }

        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut: function (rutCompleto) {
                rutCompleto = rutCompleto.replace("‐", "-");
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                    return false;
                var tmp = rutCompleto.split('-');
                var digv = tmp[1];
                var rut = tmp[0];
                if (digv == 'K' || digv == 'k') digv = 'K';

                return (Fn.dv(rut) == digv);
            },
            dv: function (T) {
                var M = 0, S = 1;
                for (; T; T = Math.floor(T / 10))
                    S = (S + T % 10 * (9 - M++ % 6)) % 11;
                return S ? S - 1 : 'K';
            }
        };

        const modelosPorMarca = {
            Toyota: ["Corolla", "Camry", "RAV4", "Prius", "Highlander", "Sienna", "Tundra", "4Runner", "Tacoma", "C-HR"],
            Honda: ["Civic", "Accord", "CR-V", "Fit", "HR-V", "Pilot", "Odyssey", "Ridgeline", "Insight", "Passport"],
            Ford: ["F-150", "Escape", "Explorer", "Mustang", "Edge", "Focus", "Fusion", "Ranger", "Expedition", "EcoSport"],
            Chevrolet: ["Silverado", "Equinox", "Traverse", "Malibu", "Blazer", "Camaro", "Spark", "Tahoe", "Colorado", "Suburban"],
            Volkswagen: ["Jetta", "Passat", "Tiguan", "Atlas", "Golf", "Arteon", "ID.4", "Taos", "Atlas Cross Sport", "Touareg"],
            Nissan: ["Altima", "Rogue", "Sentra", "Maxima", "Kicks", "Murano", "Frontier", "Titan", "Pathfinder", "370Z"],
            Hyundai: ["Elantra", "Sonata", "Tucson", "Santa Fe", "Kona", "Palisade", "Venue", "Nexo", "Ioniq", "Veloster"],
            BMW: ["3 Series", "5 Series", "X3", "X5", "7 Series", "X1", "X7", "X6", "4 Series", "6 Series"],
            "Mercedes-Benz": ["C-Class", "E-Class", "GLC", "S-Class", "GLE", "A-Class", "CLA", "GLA", "GLB", "GLS"],
            Audi: ["A3", "A4", "Q5", "Q7", "A6", "Q3", "A5", "Q8", "e-tron", "TT"]
        };

        function cambiarModelos() {
            const marcaSelect = document.getElementById("marca");
            const modeloSelect = document.getElementById("modelo");
            const marcaSeleccionada = marcaSelect.value;

            modeloSelect.innerHTML = ""; // Limpiar select de modelos

            if (marcaSeleccionada) {
                const modelos = modelosPorMarca[marcaSeleccionada];
                modelos.forEach((modelo) => {
                    const option = document.createElement("option");
                    option.value = modelo;
                    option.textContent = modelo;
                    modeloSelect.appendChild(option);
                });
            } else {
                modeloSelect.innerHTML = "<option value=''>Selecciona una marca primero</option>";
            }
        }

        function CargaData(data) {
            // Accede a los elementos del DOM y asigna los valores del objeto JSON
            document.getElementById("nombre").value = data.customer_name;
            document.getElementById("email").value = data.customer_email;
            document.getElementById("telefono").value = data.customer_phone;
            document.getElementById("direccion").value = data.customer_address;
            document.getElementById("rut").value = data.customer_rut;
            document.getElementById("marca").value = data.vehicle_make;
            document.getElementById("anio").value = data.vehicle_year;
            document.getElementById("fecha_in").value = data.vehicle_date_in;
            document.getElementById("patente").value = data.vehicle_patente;
            document.getElementById("razon").value = data.vehicle_reason_visit;
            // Crea un evento "change"
            var actionInput = document.getElementById("marca");
            var changeEvent = new Event("change");
            actionInput.dispatchEvent(changeEvent);
            document.getElementById("modelo").setAttribute("value", data.vehicle_model);
            document.getElementById("action").setAttribute("value", "edit");
            document.getElementById("id").setAttribute("value", data.vehicle_id);
            document.getElementById("customer_id").setAttribute("value", data.vehicle_customer_id);
        }
    </script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>