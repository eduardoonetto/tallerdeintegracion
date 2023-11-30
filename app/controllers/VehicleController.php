<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/VehicleModel.php');
    require_once('../models/CustomerModel.php');
    require_once('../models/WorkOrdersModel.php');
    require_once '../utils/RequestUtils.php';
    require_once('../config/config.php');

    class VehicleController {
    private $config;
    private $Vehicle;
    private $Customer;

    public function __construct() {
        $this->Vehicle = new VehicleModel();
        $this->Customer = new CustomerModel();
        $this->WorkOrders = new WorkOrdersModel();
    }

    public function get_vehicles() {
        
        $vehicleData   = $this->Vehicle->get_vehicles();
        if($vehicleData){
            //crear session:
            return $vehicleData;
        }else{
            return [];
        }
    }

    public function get_vehicles_customers() {
        $vehicleData   = $this->Vehicle->get_vehicles_customers();
        if($vehicleData){
            //crear session:
            return $vehicleData;
        }else{
            return [];
        }
    }

    public function new_vehicle($post) {
        $campos_vacios = array(); // Almacenar campos vacíos
    
        // Itera a través de $_POST para verificar todos los campos
        foreach ($post as $clave => $valor) {
            if (empty($valor) and $clave != 'id' and $clave != 'customer_id') {
                $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
            }
        }
    
        if (!empty($campos_vacios)) {
            // Al menos un campo está vacío
            header("Location: ../pages/vehicles?error=1&campos_vacios=". implode(", ", $campos_vacios));
        }

        $fecha_in   = $post['fecha_in'];
        $patente    = $post['patente'];
        $marca      = $post['marca'];
        $modelo     = $post['modelo'];
        $anio       = $post['anio'];
        $nombre     = $post['nombre'];
        $rut        = $post['rut'];
        $telefono   = $post['telefono'];
        $email      = $post['email'];
        $direccion  = $post['direccion'];
        $razon      = $post['razon'];
        $description    = $post['description'];

        $customerDataId   = $this->Customer->insert_customer($nombre, $rut, $email, $telefono, $direccion);
        if($customerDataId){
            $vehicleDataId   = $this->Vehicle->insert_vehicle($fecha_in, $patente, $marca, $modelo, $anio, $razon, $customerDataId);
            if($vehicleDataId){
                //insertar OT:
                $otData   = $this->WorkOrders->insert_ot($vehicleDataId, $fecha_in,  $razon, $description, 'Pendiente');
                if($otData){
                    header("Location: ../pages/ots?success=1");
                }
            }
        }
        if(!$customerDataId or !$vehicleDataId or !$otData){
            header("Location: ../pages/vehicles?error=2");
        }
    }

    public function edit_vehicle($post) {

        $campos_vacios = array(); // Almacenar campos vacíos
    
        // Itera a través de $_POST para verificar todos los campos
        foreach ($post as $clave => $valor) {
            if (empty($valor) and $clave != 'id') {
                $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
            }
        }
    
        if (!empty($campos_vacios)) {
            // Al menos un campo está vacío
            header("Location: ../pages/vehicles?error=1&campos_vacios=". implode(", ", $campos_vacios));
        }

        $id             = $post['id'];
        $id_customer    = $post['customer_id'];
        $fecha_in       = $post['fecha_in'];
        $patente        = $post['patente'];
        $marca          = $post['marca'];
        $modelo         = $post['modelo'];
        $anio           = $post['anio'];
        $nombre         = $post['nombre'];
        $rut            = $post['rut'];
        $telefono       = $post['telefono'];
        $email          = $post['email'];
        $direccion      = $post['direccion'];
        $razon          = $post['razon'];
        
        
        $customerDataId   = $this->Customer->edit_customer($id_customer, $nombre, $rut, $email, $telefono, $direccion);
        
        if($customerDataId){
            $vehicleData   = $this->Vehicle->edit_vehicle($id, $fecha_in, $patente, $marca, $modelo, $anio, $razon, $id_customer);
            if($vehicleData){
                //crear session:
                header("Location: ../pages/vehicles?success=1");
            }else{
                header("Location: ../pages/vehicles?error=2");
            }
        }else{
            header("Location: ../pages/vehicles?error=2");
        }
    }

    public function delete_vehicle($get) {
        $id = $get['id'];
        $vehicleData    = $this->Vehicle->delete_vehicle($id);
        if($vehicleData){
            header("Location: ../pages/vehicles?success=1");
        }else{
            header("Location: ../pages/vehicles?error=2");
        }
    }

}