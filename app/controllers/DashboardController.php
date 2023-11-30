<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/UserModel.php');
    require_once('../models/WorkOrdersModel.php');
    require_once('../models/InsuranceModel.php');
    require_once('../config/config.php');

    class DashboardController {
    private $config;
    private $User;
    private $WorkOrders;
    private $Insurance;

    public function __construct() {
        $this->User = new UserModel();
        $this->WorkOrders = new WorkOrdersModel();
        $this->Insurance = new InsuranceModel();
    }

    public function count_users() {
        
        $userData = $this->User->count_users();
        
        if($userData){
            return $userData;
        }else{
            return [];
        }
    }

    public function count_work_orders() {
        
        $workOrderData = $this->WorkOrders->count_work_orders();
        
        if($workOrderData){
            return $workOrderData;
        }else{
            return [];
        }
    }

    public function count_work_orders_by_status($status) {
        
        $workOrderData = $this->WorkOrders->count_work_orders_by_status($status);
        
        if($workOrderData){
            return $workOrderData;
        }else{
            return [];
        }
    }

    public function list_work_orders_by_status($status) {
        
        $workOrderData = $this->WorkOrders->list_work_orders_by_status($status);
        
        if($workOrderData){
            return $workOrderData;
        }else{
            return [];
        }
    }

    public function count_sum_total_amount() {
        
        $workOrderData = $this->WorkOrders->count_sum_total_amount();
        
        if($workOrderData){
            return $workOrderData;
        }else{
            return [];
        }
    }

    public function count_insurances_vigentes() {
        
        $insuranceData = $this->Insurance->count_insurances_vigentes();
        
        if($insuranceData){
            return $insuranceData;
        }else{
            return [];
        }
    }

    public function close_connection() {
        $this->User->close_connection();
        $this->WorkOrders->close_connection();
        $this->Insurance->close_connection();
    }

    




}