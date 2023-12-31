<?php

// Crear instancia:
include '../controllers/AuthController.php';  
include '../controllers/VehicleController.php';
include '../controllers/InsuranceController.php';
include '../controllers/InventoryController.php';
include '../controllers/CustomerController.php';
include '../controllers/workerController.php';
include '../controllers/WorkOrdersController.php';
include '../controllers/UserController.php';
$auth = new AuthController();
$vehicle = new VehicleController();
$insurance = new InsuranceController();
$inventory = new InventoryController();
$customer = new CustomerController();
$worker = new WorkerController();
$WorkOrders = new WorkOrdersController();
$Users = new UserController();


// Llama al método login
switch ($_GET['tx']) {
    case 'login':
        $auth->login($_POST);
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'vehicle':
        if(isset($_POST['action']) and $_POST['action'] == 'new'){
            $vehicle->new_vehicle($_POST);
        }else if(isset($_POST['action']) and $_POST['action'] == 'edit' and isset($_POST['id'])){
            $vehicle->edit_vehicle($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $vehicle->delete_vehicle($_GET);
        }else{
            $vehicle->new_vehicle($_POST);
        }
        break;
    case 'insurance':
        if(isset($_POST['action']) and $_POST['action'] == 'new'){
            $insurance->new_insurance($_POST);
        }else if(isset($_POST['action']) and $_POST['action'] == 'edit' and isset($_POST['id'])){
            $insurance->edit_insurance($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $insurance->delete_insurance($_GET);
        }else{
            $insurance->new_insurance($_POST);
        }
        break;
    case 'inventory':
        if(isset($_POST['action']) and $_POST['action'] == 'new'){
            $inventory->new_inventory($_POST);
        }else if(isset($_POST['action']) and $_POST['action'] == 'edit' and isset($_POST['id'])){
            $inventory->edit_inventory($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $inventory->delete_inventory($_GET);
        }else{
            $inventory->new_inventory($_POST);
        }
        break;
    case 'customer':
        if(isset($_POST['action']) and $_POST['action'] == 'new'){
            $customer->new_customer($_POST);
        }else if(isset($_POST['action']) and $_POST['action'] == 'edit' and isset($_POST['id'])){
            $customer->edit_customer($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $customer->delete_customer($_GET);
        }else{
            $invencustomertory->new_customer($_POST);
        }
        break;
    case 'worker':
        if(isset($_POST['action']) and $_POST['action'] == 'new'){
            $worker->newWorker($_POST);
        }else if(isset($_POST['action']) and $_POST['action'] == 'edit' and isset($_POST['id'])){
            $worker->editWorker($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $worker->deleteWorker($_GET);
        }else{
            $worker->newWorker($_POST);
        }
        break;
    case 'ot':
        if(isset($_POST['action']) and $_POST['action'] == 'edit' and isset($_POST['id'])){
            $WorkOrders->add_materialused_to_workoders($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $WorkOrders->deleteWorker($_GET);
        }
        break;
    case 'completarOt':
        if(isset($_GET['id_ot'])){
            $WorkOrders->update_status($_GET['id_ot'], 'Completada');
        }
        break;
    case 'AnularOt':
        if(isset($_GET['id_ot'])){
            $WorkOrders->update_status($_GET['id_ot'], 'Anulada');
        }
        break;
    case 'users':
        if(isset($_POST['action']) and $_POST['action'] == 'new'){
            $Users->new_user($_POST);
        }else if(isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])){
            $Users->delete_user($_GET['id']);
        }
        break;

}