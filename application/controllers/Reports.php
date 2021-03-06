<?php

class Reports extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->model('reports_model');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    function index() {
//        Common::checkUserHasAccess('calendar');

        $this->load->layout('reports/index');
    }

    function invoices() {
        $data['title'] = "Invoices";
        $data['invoices'] = $this->reports_model->getInvoices();
        $this->load->layout('reports/invoices', $data);
    }

    function serviceSales() {
        if (!empty($_POST)) {
            $fromDate = strtotime($_POST['date_from']);
            $toDate = strtotime($_POST['date_to']);
        }else{
            $fromDate = strtotime("now");
            $toDate = strtotime("now");
        }
        $data['servicesales'] = $this->reports_model->getServiceSales($fromDate, $toDate);
        $this->load->layout('reports/service_sales', $data);
    }

    function staffSales() {
        if (!empty($_POST)) {
            $fromDate = strtotime($_POST['date_from']);
            $toDate = strtotime($_POST['date_to']);
        }else{
            $fromDate = strtotime("now");
            $toDate = strtotime("now");
        }
        $data['staffsales'] = $this->reports_model->getStaffSales($fromDate, $toDate);
        $this->load->layout('reports/staff_sales', $data);
    }

    function clientSales() {
        $fromDate = $toDate = '';

        if (!empty($_POST)) {
            $fromDate = strtotime($_POST['date_from']);
            $toDate = strtotime($_POST['date_to']);
        }

        $data['title'] = "Client Sales";
        $data['clientsales'] = $this->reports_model->getClientSales($fromDate, $toDate);
        $this->load->layout('reports/clients_sales', $data);
    }
    
    function dailySales() {
        if (!empty($_POST)) {
            $fromDate = strtotime($_POST['date_from']);
            $toDate = strtotime($_POST['date_to']);
        }else{
            $fromDate = strtotime("now");
            $toDate = strtotime("now");
        }
        $data['dailysales'] = $this->reports_model->getDailySales($fromDate, $toDate);
        $this->load->layout('reports/daily_sales', $data);
    }
}
