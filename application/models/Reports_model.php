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
        $where = '';
        $data = array();

        $clientsQuery = $this->db->query("select clients.id as clientid, concat(clients.firstname, ' ', clients.lastname) as clientname, clients.gender, clients.timestamp
from clients");
        $clients = $clientsQuery->result_array();

        foreach ($clients as $client) {
            $clientid = $client['clientid'];
            $data['client'][$clientid] = $client;
//        $where = " where checkout.invoicedate > '" . date('Y-m-d') . "' and checkout.invoicedate <= '" . date('Y-m-d') . "'";
            $where = "where checkout.invoicedate > '2017-03-18' and checkout.invoicedate <= '2017-03-19'";

            if (!empty($fromDate) && !empty($toDate)) {
                $from = date("Y-m-d", $fromDate);
                $to = date("Y-m-d", $toDate);
                $where = "where checkout.invoicedate > '" . $from . "' and checkout.invoicedate <= '" . $to . "'";
            }
            $checkoutQuery = $this->db->query("
            select checkout.id as checkoutid, checkout.appointmentid, checkout.clientid, checkout.invoicedate
            from checkout $where");
            // where checkout.clientid = $clientid "
            $checkout = $checkoutQuery->result_array();

            for ($i = 0; $i <= count($checkout); $i++) {
                $appointmentid = $checkout[$i]['appointmentid'];
                $chk_clientid = $checkout[$i]['clientid'];

                if ($chk_clientid != 0 && $appointmentid != 0) {
                    $invoicedateFrom = $checkout[$i]['invoicedate'];
                    $invoicedateTo = $checkout[$i]['invoicedate'];

                    $appointmentsQuery = $this->db->query("select appointment.id as appointmentid,count(appointment.id) as appointments
            from appointment 
            where appointment.id = $appointmentid");
                    $appointments = $appointmentsQuery->row_array();

                    $servicesQuery = $this->db->query("select appointmentservices.appointmentid, count(appointmentservices.serviceid) as services
            from appointmentservices 
            where appointmentservices.appointmentid = $appointmentid");
                    $services = $servicesQuery->row_array();

                    $checkoutid = $checkout[$i]['checkoutid'];
                    $totalSalesQuery = $this->db->query("select checkoutinvoice.checkoutid, sum(checkoutinvoice.totalprice) as totalsales
            from checkoutinvoice 
            where checkoutinvoice.checkoutid = $checkoutid");
                    $totalSales = $totalSalesQuery->row_array();

                    if ($data['client'][$clientid]['clientid'] == $chk_clientid) {
                        $data['client'][$clientid]['checkout'] = $checkout[$i];
                    }
                    if ($data['client'][$clientid]['checkout']['appointmentid'] == $services['appointmentid']) {
                        $data['client'][$clientid]['services'] = $services['services'];
                    }
                    if ($data['client'][$clientid]['checkout']['appointmentid'] == $appointments['appointmentid']) {
                        $data['client'][$clientid]['appointments'] = $appointments['appointments'];
                    }
                    if ($data['client'][$clientid]['checkout']['checkoutid'] == $totalSales['checkoutid']) {
                        $data['client'][$clientid]['totalsales'] = $totalSales['totalsales'];
                    }
                }
            }
        }

        $data['fromDate'] = (!empty($from) ? date("m/d/Y", strtotime($from)) : '');
        $data['toDate'] = (!empty($to) ? date("m/d/Y", strtotime($to)) : '');

        return $data;
    }

    function getDailySales($fromDate = '', $toDate = '') {
        $where = '';
        $where = "WHERE checkoutinvoice.invoicedate >= '" . date('Y-m-d') . "' and checkoutinvoice.invoicedate <= '" . date('Y-m-d') . "'";
        if (!empty($fromDate) && !empty($toDate)) {
            $from = date("Y-m-d", $fromDate);
            $to = date("Y-m-d", $toDate);
            $where = "WHERE checkoutinvoice.invoicedate >= '" . $from . "' and checkoutinvoice.invoicedate <= '" . $to . "'";
        }

//        $where = "WHERE checkoutinvoice.invoicedate >= '2017-03-17' and checkoutinvoice.invoicedate <= '2017-03-18'";
//        echo '<pre>', print_r($query), '</pre>';
//        exit();
        $query = $this->db->query("SELECT checkoutinvoice.totalprice, count(checkoutservices.serviceid) as services, checkoutinvoice.invoicedate
FROM `checkoutinvoice` 
JOIN checkoutservices 
ON checkoutinvoice.checkoutid = checkoutservices.checkoutid
$where
GROUP by checkoutinvoice.invoicedate");

        $data['result'] = $query->result_array();
        $data['fromDate'] = (!empty($from) ? date("m/d/Y", strtotime($from)) : '');
        $data['toDate'] = (!empty($to) ? date("m/d/Y", strtotime($to)) : '');

        return $data;
    }

}
