<?php

class Reports_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    function getInvoices() {
//        if (isset($id) && !empty($id)) {
//            $this->db->where('id', $id);
//        }
        $query = $this->db->get('checkout');
        $checkout = $query->result_array();

        $invoices = array();
        for ($i = 0; $i < count($checkout); $i++) {

            $invoiceid = $checkout[$i]['id'];

            $invoices[$i]['invoiceid'] = $invoiceid;

            $invoices[$i]['invoicenumber'] = strtotime($checkout[$i]['timestamp']) . '-I' . $invoiceid . '-A' . $checkout[$i]['appointmentid'] . '-C' . $checkout[$i]['clientid'];

            $invoices[$i]['invoicedate'] = $checkout[$i]['invoicedate'];

            $invoices[$i]['appointmentid'] = $checkout[$i]['appointmentid'];

            $invoices[$i]['clientid'] = $checkout[$i]['clientid'];
            if ($checkout[$i]['clientid'] != 0) {
                $queryClients = $this->db->select('id, firstname, lastname')->get_where('clients', array('id' => $checkout[$i]['clientid']));
                $client = $queryClients->result_array();
                $invoices[$i]['client'] = $client[0];
            }

            $querycheckoutinvoice = $this->db->get_where('checkoutinvoice', array('checkoutid' => $invoiceid));
            $checkoutinvoice = $querycheckoutinvoice->row_array();
            $invoices[$i]['totalprice'] = $checkoutinvoice['totalprice'];
        }
        return $invoices;
    }

    function getStaffSales($fromDate = '', $toDate = '') {
        $where = '';
        $where = "WHERE checkoutinvoice.invoicedate > '" . date('Y-m-d') . "' and checkoutinvoice.invoicedate <= '" . date('Y-m-d') . "'";
        if (!empty($fromDate) && !empty($toDate)) {
            $from = date("Y-m-d", $fromDate);
            $to = date("Y-m-d", $toDate);
            $where = "WHERE checkoutinvoice.invoicedate > '" . $from . "' and checkoutinvoice.invoicedate <= '" . $to . "'";
        }

        $query = $this->db->query("SELECT checkoutservices.staffid, concat(staff.first_name, ' ', staff.last_name) as staffname, sum(checkoutservices.quantity) as quantity, sum(checkoutservices.price) as salevalue FROM `checkoutservices` join staff on checkoutservices.staffid = staff.id join checkoutinvoice on checkoutservices.checkoutid = checkoutinvoice.checkoutid 
$where
group by staffid order by staffname");

        $data['result'] = $query->result_array();
        $data['fromDate'] = (!empty($from) ? date("m/d/Y", strtotime($from)) : '');
        $data['toDate'] = (!empty($to) ? date("m/d/Y", strtotime($to)) : '');

        return $data;
    }

    function getServiceSales($fromDate = '', $toDate = '') {
        $where = '';
        $where = "WHERE checkout.invoicedate > '" . date('Y-m-d') . "' and checkout.invoicedate <= '" . date('Y-m-d') . "'";
        if (!empty($fromDate) && !empty($toDate)) {
            $from = date("Y-m-d", $fromDate);
            $to = date("Y-m-d", $toDate);
            $where = "WHERE checkout.invoicedate > '" . $from . "' and checkout.invoicedate <= '" . $to . "'";
        }

        $query = $this->db->query("SELECT checkoutservices.serviceid, services.name, services.price, services.special_price, sum(checkoutservices.quantity) as quantity, sum(checkoutservices.price) as salevalue, checkout.invoicedate
FROM `checkoutservices` 
JOIN services 
JOIN checkout 
ON checkoutservices.serviceid = services.id AND checkoutservices.checkoutid = checkout.id
$where
GROUP BY checkoutservices.serviceid
order by checkout.invoicedate,services.name");

        $data['result'] = $query->result_array();
        $data['fromDate'] = (!empty($from) ? date("m/d/Y", strtotime($from)) : '');
        $data['toDate'] = (!empty($to) ? date("m/d/Y", strtotime($to)) : '');

        return $data;
    }

    function getClientSales($fromDate = '', $toDate = '') {

        $query = $this->db->query("select clients.id, concat(clients.firstname, ' ', clients.lastname) as clientname, clients.gender, clients.timestamp from clients where clients.id <> 1");
        $clients = $query->result_array();
        $i = 0;
        foreach ($clients as $client) {
            $apntWhere = "where clientid =" . $client['id'];
            $apntQuery = $this->db->query("select id,count(id) as appointments from appointment $apntWhere GROUP BY clientid");
            $appointments = $apntQuery->row_array();

            $serviceWhere = "where appointmentid =" . $appointments['id'];
            $serviceWhere .= " and checkout.invoicedate > '" . date('Y-m-d') . "' and checkout.invoicedate <= '" . date('Y-m-d') . "'";
            if (!empty($fromDate) && !empty($toDate)) {
                $from = date("Y-m-d", $fromDate);
                $to = date("Y-m-d", $toDate);
                $serviceWhere .= " and checkout.invoicedate > '" . $from . "' and checkout.invoicedate <= '" . $to . "'";
            }
            $q = "select count(serviceid) as services, time from appointmentservices $serviceWhere";
            echo '<pre>', print_r($q), '</pre>';
            exit();
            $serviceQuery = $this->db->query("");
            $services = $serviceQuery->row_array();

            $saleWhere = " and appointmentid=" . $appointments['id'] . " and clientid=" . $client['id'];
            $saleQuery = $this->db->query("select checkout.appointmentid, checkout.clientid, checkoutinvoice.invoicedate, sum(checkoutinvoice.totalprice) as totalsales from checkout, checkoutinvoice where checkout.id=checkoutinvoice.checkoutid $saleWhere");
            $totalsales = $saleQuery->row_array();

            $data['result'][$i]['id'] = $client['id'];
            $data['result'][$i]['clientname'] = $client['clientname'];
            $data['result'][$i]['gender'] = $client['gender'];
            $data['result'][$i]['dateAdded'] = $client['timestamp'];
            $data['result'][$i]['appointments'] = $appointments['appointments'];
            $data['result'][$i]['services'] = $services['services'];
            $data['result'][$i]['lastAppointment'] = $services['time'];
            $data['result'][$i]['totalsales'] = $totalsales['totalsales'];
            $i++;
        }
//        echo '<pre>', print_r($data), '</pre>';
//        exit();
        $data['fromDate'] = (!empty($from) ? date("m/d/Y", strtotime($from)) : '');
        $data['toDate'] = (!empty($to) ? date("m/d/Y", strtotime($to)) : '');

        return $data;
    }

}
