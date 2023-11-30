<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/WorkOrdersModel.php');
    require_once('../models/MaterialsUsedModel.php');
    require_once('../config/config.php');

    class WorkOrdersController {
    private $config;
    private $WorkOrders;
    private $MaterialsUsed;

    public function __construct() {
        $this->WorkOrders = new WorkOrdersModel();
        $this->MaterialsUsed = new MaterialsUsedModel();
    }

    public function add_materialused_to_workoders($data) {

        
        $work_order_id = $data['id'];
        $inventories_id = $data['item'];
        $quantity_used = $data['cantidad'];
        $total = $data['total'];
        //recorrer items y agregarlos a la tabla materialsused
        //borrar previos:
        $this->MaterialsUsed->delete_materials_used_by_workorder_id($work_order_id);
        for ($i=0; $i < count($inventories_id); $i++) { 
            
            $inserted_id = $this->MaterialsUsed->insert_materials_used($inventories_id[$i], $quantity_used[$i], $total[$i], $work_order_id);
        }

        if($inserted_id){
            header('Location: ../pages/dashboard.php?status=success&message=Orden de trabajo creada correctamente');
        }else{
            return false;
        }
    }

    public function get_workOrder($id) {
        
        $WorkOrderData = $this->WorkOrders->get_ot_by_id($id);
        
        if($WorkOrderData){
            return $WorkOrderData;
        }else{
            return [];
        }
    }

    public function get_workOrderMaterialsUsed($id) {
        
        $WorkOrderData = $this->MaterialsUsed->get_materials_used_by_workorder_id($id);
        
        if($WorkOrderData){
            return $WorkOrderData;
        }else{
            return [];
        }
    }

    
}