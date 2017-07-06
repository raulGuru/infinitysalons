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
            //$invoices[$i]['invoicenumber'] = strtotime($checkout[$i]['timestamp']) . '-I' . $invoiceid . '-A' . $checkout[$i]['appointmentid'] . '-C' . $checkout[$i]['clientid'];
            $invoices[$i]['invoicenumber'] = $checkout[$i]['invoicenumber'];

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

    function getServiceSales($fromDate, $toDate) {

        $from = date("Y-m-d", $fromDate);
        $to = date("Y-m-d", $toDate);
        $where = "WHERE a.invoicedate >= '" . $from . "' and a.invoicedate <= '" . $to . "'";

        $query = $this->db->query("SELECT b.serviceid, c.name, SUM(b.quantity) AS quantity, sum(b.price) as salevalue
                                    FROM checkout a 
                                    INNER JOIN checkoutservices b ON a.id = b.checkoutid
                                    INNER JOIN services c ON b.serviceid = c.id
                                    $where
                                    GROUP BY b.serviceid, c.name
                                    ORDER BY c.name");

        $data['result'] = $query->result_array();
        $data['fromDate'] = $from;
        $data['toDate'] = $to;

        return $data;
    }

    function getStaffSales($fromDate, $toDate) {

        $from = date("Y-m-d", $fromDate);
        $to = date("Y-m-d", $toDate);
        $where = "WHERE a.invoicedate >= '" . $from . "' and a.invoicedate <= '" . $to . "'";

        $query = $this->db->query("SELECT b.staffid, CONCAT(c.first_name, ' ', c.last_name) as staffname, SUM(b.quantity) AS quantity, SUM(b.price) as salevalue
                                    FROM checkout a
                                    INNER JOIN checkoutservices b ON a.id = b.checkoutid
                                    INNER JOIN staff c ON b.staffid = c.id
                                    $where
                                    GROUP BY b.staffid, staffname
                                    ORDER BY staffname");

        $data['result'] = $query->result_array();
        $data['fromDate'] = $from;
        $data['toDate'] = $to;

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
            $where = " where checkout.invoicedate > '" . date('Y-m-d') . "' and checkout.invoicedate <= '" . date('Y-m-d') . "'";
            //$where = "where checkout.invoicedate > '2017-03-18' and checkout.invoicedate <= '2017-03-19'";

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

    function getDailySales($fromDate, $toDate) {

        $from = date("Y-m-d", $fromDate);
        $to = date("Y-m-d", $toDate);
        $where = "WHERE checkoutinvoice.invoicedate >= '" . $from . "' and checkoutinvoice.invoicedate <= '" . $to . "'";

        $q1 = $this->db->query("SELECT invoicedate, SUM(totalprice) AS totalprice, SUM(sale) AS price
                                FROM `checkoutinvoice` 
                                $where 
                                GROUP BY invoicedate");
        $q1_r = $q1->result_array();

        $q2 = $this->db->query("SELECT checkoutinvoice.invoicedate, COUNT(checkoutservices.serviceid) AS services
                                FROM checkoutinvoice
                                INNER JOIN checkoutservices ON checkoutinvoice.checkoutid = checkoutservices.checkoutid
                                $where
                                GROUP BY checkoutinvoice.invoicedate
                                ORDER BY checkoutinvoice.invoicedate");
        $q2_r = $q2->result_array();

        foreach ($q1_r as $k) {
            foreach ($q2_r as $k1 => $v1) {
                $q1_r[$k1]['services'] = $v1['services'];
            }
        }
        $data['result'] = $q1_r;
        $data['fromDate'] = $from;
        $data['toDate'] = $to;

        return $data;
    }

}
