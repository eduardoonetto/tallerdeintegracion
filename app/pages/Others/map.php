<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
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
              <form>
              <div class="row">
                <div class="col-2">
                  <div class="input-group  input-group-static mb-4">
                    <label >Fecha Ingreso</label>
                    <input type="date" name="patente" class="form-control ">
                  </div>
                </div>
              </div>
              <h5>Datos Vehiculo:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4  col">
                      <label class="form-label">Patente</label>
                      <input type="text" name="patente" class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Marca</label>
                      <select class="form-control" id="marca" onchange="cambiarModelos()">
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
                      
                      <select class="form-control" id="modelo">
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
                      <input type="text" name="patente" class="form-control ">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                      <label class="form-label">RUT</label>
                      <input type="text" id="rut" name="patente" class="form-control ">
                      <p id="mensaje"></p>
                    </div>
                  </div>
                </div>
                <h5>Razon de visita:</h5>
                <div class="row">
                  <div class="col-2">
                    <div class="input-group input-group-static mb-4 mt-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Razon</label>
                      <select class="form-control" id="razon" name="razon">
                        <option value="">Selecciona una razon</option>
                        <option value="Toyota">Desabolladura</option>
                        <option value="Honda">Pintura</option>
                        <option value="Ford">Desabolladura y Pintura</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
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
    </script>
  <script>
    // Initialize the vector map
    var map = new jsVectorMap({
      selector: "#vector-map",
      map: "world_merc",
      zoomOnScroll: false,
      zoomButtons: false,
      selectedMarkers: [1, 3],
      markersSelectable: true,
      markers: [{
          name: "USA",
          coords: [40.71296415909766, -74.00437720027804]
        },
        {
          name: "Germany",
          coords: [51.17661451970939, 10.97947735117339]
        },
        {
          name: "Brazil",
          coords: [-7.596735421549542, -54.781694323779185]
        },
        {
          name: "Russia",
          coords: [62.318222797104276, 89.81564777631716]
        },
        {
          name: "China",
          coords: [22.320178999475512, 114.17161225541399],
          style: {
            fill: '#E91E63'
          }
        }
      ],
      markerStyle: {
        initial: {
          fill: "#e91e63"
        },
        hover: {
          fill: "E91E63"
        },
        selected: {
          fill: "E91E63"
        }
      },


    });
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