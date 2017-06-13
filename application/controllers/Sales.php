<?php

class Sales extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->model('sales_model');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    function newSale() {

        $query = $this->db->get_where('products', array('quantity !=' => '0'));
        $data['products'] = $query->result_array();
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $this->load->view('sales/new_sale', $data);
    }

    function newServiceSale() {

        $data['services'] = $this->db->order_by("name", "asc")->get("services")->result_array();
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $this->load->view('sales/new_service_sale', $data);
    }

    function addSale() {

        $sale = $_POST['sale'];

        if (!empty($sale['items_attributes'])) {
            $items = $sale['items_attributes'];
            foreach ($items as $item) {
                if (empty($item['staff-id'])) {
                    return;
                }
            }
        }

        $this->load->library('session');
        //$this->session->unset_userdata();
        $ses['sale'] = $sale;
        $this->session->set_userdata($ses);

        $data['sale'] = $sale;

        $data['sale_type'] = $sale['type'];

        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();

        $querytax = $this->db->get("businesstax");
        $data['taxes'] = $querytax->result_array();

        $querybusinesspayments = $this->db->get_where('businesspayments', array('active' => '1'));

        $data['businesspayments'] = $querybusinesspayments->result_array();

        //$this->load->view('sales/apply_payment', $data);
        $this->load->view('sales/apply_payment_new', $data);
    }

    function appointmentSale() {

        $appointment_id = $_POST['appid'];
        if (empty($appointment_id))
            return;

        $appointmentdetails = Common::getAppointmentDetails($appointment_id);
        $appointment = $appointmentdetails[0];
        $data['appointment'] = $appointment;
        $data['services'] = $appointment['services'];

        $query = $this->db->get_where('products', array('quantity !=' => '0'));
        $data['products'] = $query->result_array();

        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();

        $querysdiscounts = $this->db->get_where('discounts', array('enabled_for_services' => '1'));
        $data['servicediscounts'] = $querysdiscounts->result_array();

        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();

        $this->load->view('sales/new_sale', $data);
    }

    public function appointmentServiceSale() {

        $appointment_id = $_POST['appid'];
        if (empty($appointment_id))
            return;

        $appointmentdetails = Common::getAppointmentDetails($appointment_id);
        $appointment = $appointmentdetails[0];
        $data['appointment'] = $appointment;
        //$data['appservices'] = $appointment['services'];

        $data['services'] = $this->db->order_by("name", "asc")->get("services")->result_array();

        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();

        $querysdiscounts = $this->db->get_where('discounts', array('enabled_for_services' => '1'));
        $data['servicediscounts'] = $querysdiscounts->result_array();

        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();

        $this->load->view('sales/new_service_sale', $data);
    }

    function addPayment() {

        $sale = $this->session->userdata('sale');
        $payment = $_POST;

        /*do {
            $duplicateid = TRUE;
            $invoicenumber = random_string('numeric', 9);
            $query = $this->db->get_where('checkout', array('invoicenumber' => $invoicenumber));
            if($query->num_rows() == 0)
            {
                $duplicateid = FALSE;
            }
        } while ($duplicateid == FALSE);*/

        $wflag = TRUE;
        while($wflag == TRUE)
        {
            $invoicenumber = random_string('numeric', 9);      //mt_rand(100000000,999999999);
            $query = $this->db->get_where('checkout', array('invoicenumber' => $invoicenumber));
            if($query->num_rows() == 0)
            {
                $wflag = FALSE;
            }
        }

        $invoicedate = date('Y-m-d H:i:s', strtotime($sale['invoice_date']));

        $appointmentid = $sale['appointmentid'];
        $checkoutins = array(
            'invoicenumber' => $invoicenumber,
            'appointmentid' => $appointmentid,
            'clientid' => (!empty($sale['customer_id'])) ? $sale['customer_id'] : 0,
            'userid' => $this->user_id,
            'invoicedate' => $invoicedate
        );
        $this->db->insert("checkout", $checkoutins);
        $checkoutid = $this->db->insert_id();

        $this->db->update('appointmentstatus', array('status' => 'paid', 'userid' => $this->user_id), array('appointmentid' => $appointmentid));

        $checkoutinvoice = array(
            'checkoutid' => $checkoutid,
            'invoicedate' => $invoicedate,
            'totalprice' => Common::parseMoney($payment['grand-total']),
            'sale' => Common::parseMoney($payment['sale-total']),
            'tax' => ($payment['include_tax']) ? '1' : '0',
            'status' => '1'
        );
        $this->db->insert("checkoutinvoice", $checkoutinvoice);

        $payments = $payment['payments'];
        $paymentamounts = $payments['amounts'];
        $paymenttypes = $payments['types'];
        for ($i = 0; $i < count($paymentamounts); $i++) {
            $pay = array(
                'checkoutid' => $checkoutid,
                'amount' => $paymentamounts[$i],
                'paymenttypeid' => $paymenttypes[$i]
            );
            $this->db->insert("checkoutpayments", $pay);
        }

        if (!empty($sale['items_attributes'])) {
            /*
              $products = $sale['items_attributes'];
              foreach($products as $product) {
              $qnt = (!empty($product['quantity'])) ? $product['quantity'] : 0;
              $productid = $product['item_id'];
              $insp = array(
              'checkoutid' => $checkoutid,
              'productid' => $productid,
              'staffid' => $product['staff-id'],
              'quatity' => $qnt,
              'price' => Common::parseMoney($product['special_price']),
              'fullprice' => Common::parseMoney($product['full_price']),
              'discountid' => (!empty($product['discount_id'])) ? $product['discount_id'] : NULL
              );
              $this->db->insert("checkoutproducts", $insp);

              $this->db->query("UPDATE `products` SET quantity = quantity-$qnt WHERE id=$productid");
              }
             * now sale items are services, so adding them after app services
             */
        }

        if (!empty($sale['service'])) {
            $services = $sale['service'];
            foreach ($services as $service) {
                $checkoutservices = array(
                    'checkoutid' => $checkoutid,
                    'serviceid' => $service['item-id'],
                    'staffid' => $service['staff-id'],
                    'quantity' => $service['quantity'],
                    'price' => Common::parseMoney($service['special_price']),
                    'fullprice' => Common::parseMoney($service['full_price']),
                    'discountid' => (!empty($service['discount_id'])) ? $service['discount_id'] : NULL
                );
                $this->db->insert("checkoutservices", $checkoutservices);
            }
        }

        if (!empty($sale['items_attributes'])) {
            $services = $sale['items_attributes'];
            foreach ($services as $service) {
                $checkoutservices = array(
                    'checkoutid' => $checkoutid,
                    'serviceid' => $service['item_id'],
                    'staffid' => $service['staff-id'],
                    'quantity' => $service['quantity'],
                    'price' => Common::parseMoney($service['special_price']),
                    'fullprice' => Common::parseMoney($service['full_price']),
                    'discountid' => (!empty($service['discount_id'])) ? $service['discount_id'] : NULL
                );
                $this->db->insert("checkoutservices", $checkoutservices);
            }
        }

        if (!empty($payment['tip-amount'])) {
            $checkoutstafftip = array(
                'checkoutid' => $checkoutid,
                'staffid' => $payment['tip-staff-id'],
                'price' => $payment['tip-amount']
            );
            $this->db->insert("checkoutstafftip", $checkoutstafftip);
        }

        /*
         * send invoice mail
         * */
        $this->sendInvoiceMail($checkoutid);

        $res['success'] = true;
        $res['checkoutid'] = $checkoutid;
        echo json_encode($res);

//        $data['checkoutid'] = $checkoutid;
//        $this->load->view('sales/sale_completed',$data);
    }

    public function addEditedPayment() {

        $sale = $this->session->userdata('sale');
        $payment = $_POST;

        // first delete existing data
        $invoiceid = $sale['invoiceid'];
        $appointmentid = $sale['appointmentid'];
        if($appointmentid != 0) {

            $this->db->delete('appointment', array('id' => $appointmentid));

            $apptables = array('appointmentservices', 'appointmentstatus');
            $this->db->where('appointmentid', $appointmentid);
            $this->db->delete($apptables);
        }

        $this->db->delete('checkout', array('id' => $invoiceid));

        $checkouttables = array('checkoutinvoice', 'checkoutpayments', 'checkoutservices', 'checkoutstafftip');
        $this->db->where('checkoutid', $invoiceid);
        $this->db->delete($checkouttables);
        // delete completed

        // add newly edited data as new checkout ignoring appointment
        $invoicedate = date('Y-m-d H:i:s', strtotime($sale['invoice_date']));

        $checkoutins = array(
            'invoicenumber' => $sale['invoicenumber'],
            'appointmentid' => '0',
            'clientid' => (!empty($sale['customer_id'])) ? $sale['customer_id'] : 0,
            'userid' => $this->user_id,
            'invoicedate' => $invoicedate
        );
        $this->db->insert("checkout", $checkoutins);
        $checkoutid = $this->db->insert_id();

        $checkoutinvoice = array(
            'checkoutid' => $checkoutid,
            'invoicedate' => $invoicedate,
            'totalprice' => Common::parseMoney($payment['grand-total']),
            'sale' => Common::parseMoney($payment['sale-total']),
            'tax' => ($payment['include_tax']) ? '1' : '0',
            'status' => '1'
        );
        $this->db->insert("checkoutinvoice", $checkoutinvoice);

        $payments = $payment['payments'];
        $paymentamounts = $payments['amounts'];
        $paymenttypes = $payments['types'];
        for ($i = 0; $i < count($paymentamounts); $i++) {
            $pay = array(
                'checkoutid' => $checkoutid,
                'amount' => $paymentamounts[$i],
                'paymenttypeid' => $paymenttypes[$i]
            );
            $this->db->insert("checkoutpayments", $pay);
        }

        if (!empty($sale['service'])) {
            $services = $sale['service'];
            foreach ($services as $service) {
                $checkoutservices = array(
                    'checkoutid' => $checkoutid,
                    'serviceid' => $service['item-id'],
                    'staffid' => $service['staff-id'],
                    'quantity' => $service['quantity'],
                    'price' => Common::parseMoney($service['special_price']),
                    'fullprice' => Common::parseMoney($service['full_price']),
                    'discountid' => (!empty($service['discount_id'])) ? $service['discount_id'] : NULL
                );
                $this->db->insert("checkoutservices", $checkoutservices);
            }
        }

        if (!empty($sale['items_attributes'])) {
            $services = $sale['items_attributes'];
            foreach ($services as $service) {
                $checkoutservices = array(
                    'checkoutid' => $checkoutid,
                    'serviceid' => $service['item_id'],
                    'staffid' => $service['staff-id'],
                    'quantity' => $service['quantity'],
                    'price' => Common::parseMoney($service['special_price']),
                    'fullprice' => Common::parseMoney($service['full_price']),
                    'discountid' => (!empty($service['discount_id'])) ? $service['discount_id'] : NULL
                );
                $this->db->insert("checkoutservices", $checkoutservices);
            }
        }

        if (!empty($payment['tip-amount'])) {
            $checkoutstafftip = array(
                'checkoutid' => $checkoutid,
                'staffid' => $payment['tip-staff-id'],
                'price' => $payment['tip-amount']
            );
            $this->db->insert("checkoutstafftip", $checkoutstafftip);
        }

        $res['success'] = true;
        $res['checkoutid'] = $checkoutid;
        echo json_encode($res);
    }

    function saleCompleted() {

    }

    function editInvoice() {

        $checkoutid = $_POST['invoiceid'];
        $querycheckoutinvoice = $this->db->get_where('checkout', array('id' => $checkoutid));
        $checkoutinvoice = $querycheckoutinvoice->row_array();
        $appointment_id = $checkoutinvoice['appointmentid'];
        $appointment = array();
        $appointment['appointment_id'] = $appointment_id;

        $appointment['clientid'] = $checkoutinvoice['clientid'];
        $query = $this->db->query("SELECT firstname, lastname, mobile, notes 
                                        FROM clients WHERE id = ".$checkoutinvoice['clientid']." ");
        $c_array = $query->row_array();
        $appointment['fname_c'] = $c_array['firstname'];
        $appointment['lname_c'] = $c_array['lastname'];
        $appointment['mobile'] = $c_array['mobile'];
        $appointment['notes'] = $c_array['notes'];

        $queryservices = $this->db->query("SELECT a.serviceid AS service_id, a.quantity AS quantity, a.price AS price, a.discountid, b.special_price AS special_price,
                                    b.name AS service,
                                    c.id AS staff_id, c.first_name AS fname_s, c.last_name AS lname_s
                                    FROM checkoutservices a
                                    INNER JOIN services b ON a.serviceid = b.id
                                    INNER JOIN staff c ON a.staffid = c.id
                                    AND a.checkoutid='$checkoutid'");
        $servicedetails = $queryservices->result_array();
        $appointment['services'] = $servicedetails;

        $appointment['invoicedate'] = $checkoutinvoice['invoicedate'];

        $data['appointment'] = $appointment;

        $data['services'] = $this->db->order_by("name", "asc")->get("services")->result_array();

        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();

        $querysdiscounts = $this->db->get_where('discounts', array('enabled_for_services' => '1'));
        $data['servicediscounts'] = $querysdiscounts->result_array();

        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();

        $data['invoiceid'] = $checkoutid;
        $data['invoicenumber'] = $checkoutinvoice['invoicenumber'];
        $this->load->view('sales/edit_service_sale', $data);
    }

    public function sendInvoiceMail($checkoutid) {

        $data = Common::getInvoiceDetailsById($checkoutid);
        $c_email = $data['client']['email'];
        if(!empty($c_email)) {

            $msg = $this->load->view('invoice/mail_invoice', $data, true);
            $c_name = $data['client']['firstname'];

            require_once __DIR__ . '/../../vendor/autoload.php';

            $mail = new PHPMailer;

            /*$mail->isSMTP();
            $mail->Host = 'rely-hosting.secureserver.net';
            $mail->Username = 'info@infinitysalons.com';
            $mail->Password = 'k*aecLd0!cIX';
            $mail->Port = 25;
            $mail->SMTPAuth = false;
            //$mail->SMTPSecure = 'ssl';
            $mail->SMTPDebug = 2;*/

            $mail->From = EMAIL_FROM;
            $mail->FromName = EMAIL_FROM_NAME;
            $mail->addReplyTo(EMAIL_REPLY_TO, EMAIL_REPLY_TO_NAME);
            $mail->addAddress($c_email, $c_name);
            //$mail->addCC("cc@example.com");
            //$mail->addBCC("bcc@example.com");

            $mail->isHTML(true);
            $mail->Subject = "Invoice of Infinity Salon";
            $mail->Body = $msg;
            //$mail->AltBody = "This is the plain text version of the email content";

            if(!$mail->send())
            {
                echo '<pre>',print_r($mail->ErrorInfo),'</pre>'; exit();
            }
            else
            {
                //echo "Message has been sent successfully";
            }
        }
    }

}