<?php

class Provider extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('provider_model');
    }

    public function index() {
        $data['title'] = "Your Application Title";
        $this->load->layout('services/index', $data);
    }

    public function settings() {
        $data['title'] = "Business Settings";
        $data['cancellationReasons'] = $this->getCancellationReasons();
        $data['referralSources'] = $this->getReferralSources();
        $data['payment_types'] = $this->getPosPaymentTypes();
        //$data['taxes'] = $this->getPosTaxes();
        $query = $this->db->get_where("businesstax");
        $data['taxes'] = $query->result_array();
        
        $this->load->layout('provider/business_settings', $data);
    }

    public function getPosPaymentTypes() {
        $returnArr['title'] = "Pos Payment Types";
        $returnArr['data'] = $this->provider_model->getPosPaymentTypes();
        return $returnArr;
    }

    public function getPosTaxes() {
        $returnArr['title'] = "Pos Taxes";
        $returnArr['data'] = $this->provider_model->getPosTaxes();
        return $returnArr;
    }

    public function editPosPaymentTypes() {
        $id = $_GET['id'];

        $data['data'] = $this->provider_model->getCancellationReasons($id);
        $data['mode'] = 'edit';

        $this->load->view('provider/add_cancellations_reason');
    }

    public function deletePosPaymentTypes() {
        
    }

    public function getCancellationReasons() {
        $returnArr['title'] = "Cancellation Reasons";
        $returnArr['data'] = $this->provider_model->getCancellationReasons();
        return $returnArr;
    }

    public function editCancellationReasons() {
        $id = $_GET['id'];

        $data['data'] = $this->provider_model->getCancellationReasons($id);
        $data['mode'] = 'edit';

        $this->load->view('provider/add_cancellations_reason');
    }

    public function deleteCancellationReason() {
        
    }

    public function getReferralSources() {
        $returnArr['title'] = "Referral Sources";
        $returnArr['data'] = $this->provider_model->getReferralSources();
        return $returnArr;
    }

    public function editReferralSources() {
        $id = $_GET['id'];

        $data['data'] = $this->provider_model->getCancellationReasons($id);
        $data['mode'] = 'edit';

        $this->load->view('provider/add_cancellations_reason');
    }

    public function deleteReferralSources() {
        
    }

    public function newTax() {
        $data=array();
        if(!empty($_GET['id'])) {
            $query = $this->db->get_where('businesstax', array('id' => $_GET['id']));
            $data['tax'] = $query->row_array();
        }
        $this->load->view('pointsale/add_tax', $data);
    }
    
    public function addTax() {
        $tax = array(
            'taxname' => $_POST['name'],
            'rate' => $_POST['rate']
        );
        if(!empty($_POST['tax_id'])) {
            $this->db->update('businesstax', $tax, array('id' => $_POST['tax_id']));
        }else {
            $this->db->insert('businesstax', $tax);
        }        
        $res['success'] = true;
        echo json_encode($res);
    }

}
