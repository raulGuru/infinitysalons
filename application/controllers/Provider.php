<?php

class Provider extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('provider_model');
        
        Common::checkUserHasAccess('setup');
    }

//    public function index() {
//        $data['title'] = "Your Application Title";
//        $this->load->layout('services/index', $data);
//    }

    public function index() {
        
        Common::checkUserHasAccess('setup');
        
        $data['title'] = "Business Settings";
        $data['cancellationReasons'] = $this->getCancellationReasons();
        $data['referralSources'] = $this->getReferralSources();
        $data['payment_types'] = $this->getPosPaymentTypes();
        $data['taxes'] = $this->getPosTaxes();

        $this->load->layout('provider/business_settings_new', $data);
    }

    public function getCancellationReasons($id = '') {
        $returnArr['title'] = "Cancellation Reasons";
        $returnArr['data'] = $this->provider_model->getCancellationReasons($id);
        return $returnArr;
    }

    public function newCancellation() {
        $this->load->view('cancellations/add_cancellation');
    }

    public function editCancellationReasons() {
        $id = $_GET['id'];

        $cancellationReasons = $this->provider_model->getCancellationReasons($id);
        $data['mode'] = 'edit';
        $data['cancellationReasons'] = $cancellationReasons[0];

        $this->load->view('cancellations/add_cancellation', $data);
    }

    public function addCancellationReasons() {
        $cancellationReasons = $_POST['cancellation_reason'];
        $cancellation_id = $_POST['cancellation_id'];

        $values = array(
//            'id' => $referral_id,
            'cancelreason' => $cancellationReasons['name'],
            'active' => '1',
            'date' => date('Y-m-d H:i:s'),
        );

        if (!empty($cancellation_id)) {
            $q = $this->provider_model->updateCancellationReasons($cancellation_id, $values);
        } else {
            $q = $this->provider_model->insertCancellationReasons($values);
        }

        if ($q == 'true') {
            $res['success'] = true;
        } else {
            $res['error'] = $q;
        }
        echo json_encode($res);
    }

    public function deleteCancellationReason() {
        $this->db->delete('businesscancels', array('id' => $this->input->post('id')));
        echo 'true';
    }

    public function getReferralSources($id = '') {
        $returnArr['title'] = "Referral Sources";
        $returnArr['data'] = $this->provider_model->getReferralSources($id);
        return $returnArr;
    }

    public function newReferral() {
        $this->load->view('referrals/add_referral');
    }

    public function editReferralSources() {
        $id = $_GET['id'];

        $referralSources = $this->provider_model->getReferralSources($id);
        $data['mode'] = 'edit';
        $data['referralSources'] = $referralSources[0];

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
        echo json_encode($res);
    }

    public function deleteReferralSource() {
        $this->db->delete('businessreferral', array('id' => $this->input->post('id')));
        echo 'true';
    }

    public function getPosTaxes() {
        $returnArr['title'] = "Pos Taxes";
        $returnArr['data'] = $this->provider_model->getPosTaxes();

        return $returnArr;
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

    public function getPosPaymentTypes($id = '') {
        $returnArr['title'] = "Pos Payment Types";
        $returnArr['data'] = $this->provider_model->getPosPaymentTypes();
        return $returnArr;
    }
    
    public function newPayment() {
        $this->load->view('paymentmethods/add_payment');
    }
    
    public function editPaymentMethod() {
        $id = $_GET['id'];

        $paymentMethods = $this->provider_model->getPosPaymentTypes($id);
        $data['mode'] = 'edit';
        $data['paymentMethod'] = $paymentMethods[0];
        $this->load->view('paymentmethods/add_payment', $data);
    }
    
    public function addPaymentMethod() {
        $paymentMethod = $_POST['paymentMethod'];
        $payment_id = $_POST['payment_id'];

        $values = array(
//            'id' => $referral_id,
            'type' => $paymentMethod['type'],
            'active' => $paymentMethod['active'],
//            'date' => date('Y-m-d H:i:s'),
        );
        
        if (!empty($payment_id)) {
            $q = $this->provider_model->updatePaymentMethod($payment_id, $values);
        } else {
            $q = $this->provider_model->insertPaymentMethod($values);
        }
        
        if ($q == 'true') {
            $res['success'] = true;
        } else {
            $res['error'] = $q;
        }
        echo json_encode($res);
    }

    public function deletePaymentMethods() {
        $this->db->delete('businessreferral', array('id' => $this->input->post('id')));
        echo 'true';
    }
    
    public function taxes() {
        $returnArr['taxes'] = $this->provider_model->getPosTaxes();
        $this->load->layout('taxes/index', $returnArr);
    }

    public function referral_sources() {
        $returnArr['referralSources'] = $this->provider_model->getReferralSources();
        $this->load->layout('referrals/index', $returnArr);
    }

    public function cancellations() {
        $returnArr['cancellationReasons'] = $this->provider_model->getCancellationReasons();
        $this->load->layout('cancellations/index', $returnArr);
    }
    
    public function paymentmethods() {
//        echo 'paymentmethods';
        $returnArr['paymentMethods'] = $this->provider_model->getPosPaymentTypes();
        $this->load->layout('paymentmethods/index', $returnArr);
    }

}
