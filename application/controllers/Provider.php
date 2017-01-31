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

    public function newCancellation() {
        $this->load->view('cancellations/add_cancellation');
    }

    public function getCancellationReasons($id = '') {
        $returnArr['title'] = "Cancellation Reasons";
        $returnArr['data'] = $this->provider_model->getCancellationReasons($id);
        return $returnArr;
    }

    public function editCancellationReasons() {
        $id = $_GET['id'];

        $cancellationReasons = $this->provider_model->getCancellationReasons($id);
        $data['mode'] = 'edit';
        $data['cancellationReasons'] = $cancellationReasons[0];
//        echo '<pre>';print_r($data); //die;

        $this->load->view('cancellations/add_cancellation', $data);
    }

    public function addCancellationReasons() {
        $referral_source = $_POST['referral_source'];
        $referral_id = $_POST['referral_id'];

        $values = array(
//            'id' => $referral_id,
            'referralname' => $referral_source['name'],
            'active' => $referral_source['active'],
            'date' => date('Y-m-d H:i:s'),
        );

        if (!empty($referral_id)) {
            $q = $this->provider_model->updateReferralSources($referral_id, $values);
        } else {
            $q = $this->provider_model->insertReferralSources($values);
        }

        if ($q == 'true') {
            $res['success'] = true;
        } else {
            $res['error'] = $q;
        }
        echo json_encode($res);
    }

    public function deleteCancellationReason() {
        
    }

    public function newReferral() {
        $this->load->view('referrals/add_referral');
    }

    public function getReferralSources($id = '') {
        $returnArr['title'] = "Referral Sources";
        $returnArr['data'] = $this->provider_model->getReferralSources($id);
        return $returnArr;
    }

    public function editReferralSources() {
        $id = $_GET['id'];

        $referralSources = $this->provider_model->getReferralSources($id);
        $data['mode'] = 'edit';
        $data['referralSources'] = $referralSources[0];
//        echo '<pre>';print_r($data); die;
        $this->load->view('referrals/add_referral', $data);
    }

    public function addReferralSources() {
        $referral_source = $_POST['referral_source'];
        $referral_id = $_POST['referral_id'];

        $values = array(
//            'id' => $referral_id,
            'referralname' => $referral_source['name'],
            'active' => $referral_source['active'],
            'date' => date('Y-m-d H:i:s'),
        );

        if (!empty($referral_id)) {
            $q = $this->provider_model->updateReferralSources($referral_id, $values);
        } else {
            $q = $this->provider_model->insertReferralSources($values);
        }

        if ($q == 'true') {
            $res['success'] = true;
        } else {
            $res['error'] = $q;
        }
        $res['success'] = true;
        echo json_encode($res);
    }

    public function newTax() {
        $data = array();
        if (!empty($_GET['id'])) {
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
        if (!empty($_POST['tax_id'])) {
            $this->db->update('businesstax', $tax, array('id' => $_POST['tax_id']));
        } else {
            $this->db->insert('businesstax', $tax);
        }
        $res['success'] = true;
        echo json_encode($res);
    }

}
