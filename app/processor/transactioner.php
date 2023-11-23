<?php

// Crear instancia:
include '../controllers/AuthController.php';  
include '../controllers/VehicleController.php';
include '../controllers/InsuranceController.php';
include '../controllers/InventoryController.php';
include '../controllers/CustomerController.php';
include '../controllers/workerController.php';
$auth = new AuthController();
$vehicle = new VehicleController();
$insurance = new InsuranceController();
$inventory = new InventoryController();
$customer = new CustomerController();
$worker = new WorkerController();


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
}