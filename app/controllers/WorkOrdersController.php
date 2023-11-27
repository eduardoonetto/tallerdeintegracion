<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/WorkOrdersModel.php');
    require_once('../config/config.php');

    class WorkOrdersController {
    private $config;
    private $WorkOrder;

    public function __construct() {
        $this->WorkOrder = new WorkOrdersModel();
    }

    public function get_workOrder($id) {
        
        $WorkOrderData = $this->WorkOrder->get_ot_by_id($id);
        
        if($WorkOrderData){
            //crear session:
            return $WorkOrderData;
        }else{
            return [];
        }
    }

    
}