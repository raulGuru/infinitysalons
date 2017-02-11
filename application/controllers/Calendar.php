<?php
class Calendar extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('calendar_model');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    function index() {
        
        Common::checkUserHasAccess('calender');
        
        $sesStaffid = $this->session->userdata['salon_user']['staffid'];
        
        $events = array();
        $e = 0;
        $calview = (!empty($_POST['calview'])) ? $_POST['calview'] : 'w';
        if(($sesStaffid != 0)) {
            $_POST['staffid'] = $sesStaffid;
        }
        //$_POST['staffid'] = 2;
        if(isset($_POST) && !empty($_POST['staffid'])) {
            $selstaffid = $_POST['staffid'];
            $appointmentdetails = Common::appointmentsByStaff($selstaffid);
        }else {
            $appointmentdetails = Common::getAppointmentDetails();
        }
        
        foreach($appointmentdetails as $appointment) {

            $services = $appointment['services'];
            foreach($services as  $k =>  $service) {
                
                $start_t = $service['appointment_time'];
                $end_t = date("Y-m-d H:i:s", (strtotime($start_t)+(60*$service['duration'])));
                
                $title = date('h:ia', strtotime($start_t)) ." - ".date('h:ia', strtotime($end_t));
                
                $events[$e]['title'] = $title;
                $events[$e]['start'] = $start_t;
                $events[$e]['end'] = $end_t;
                
                $status = $appointment['status'];
                switch ($status) {
                    case "strt":
                        $color = '#36EB60';
                        $st_lbl = 'Started';
                        break;
                    case "arv":
                        $color = '#DEDE52';
                        $st_lbl = 'Arrived';
                        break;
                    case "ns":
                        $color = '#E83420';
                        $st_lbl = 'No show';
                        break;
                    case "comp":
                        $color = '#C9C5AD';
                        $st_lbl = 'Completed';
                        break;
                    case "canc":
                        $color = '#E83420';
                        $st_lbl = 'Cancelled';
                        break;
                    default:
                        $color = '#36CDEB';
                        $st_lbl = 'New';
                        break;
                }
                $events[$e]['color'] = $color;
                
                $events[$e]['app_detail']['status_lbl'] = $st_lbl;
                $events[$e]['app_detail']['client_lbl'] = ($appointment['clientid'] == '0') ? 'Walk-In' : $appointment['fname_c'] .' '. $appointment['lname_c'];
                $events[$e]['app_detail']['service_lbl'] = $service['service'];
                $events[$e]['app_detail']['tofrom_lbl'] = $service['app_t_format'];
                $events[$e]['app_detail']['staff_lbl'] = $service['fname_s'] .' '. $service['lname_s'];
                $events[$e]['app_detail']['price_lbl'] = $service['price'];
                $events[$e]['app_detail']['sp_lbl'] = $service['special_price'];

                $events[$e]['service_id'] = $service['service_id'];
                $events[$e]['appointment_id'] = $appointment['appointment_id'];
                $e++;                
            }
        }
        $data['events'] = $events;
        $data['appointmentdetails'] = $appointmentdetails;
        
        $staff = $this->db->get_where('staff', array('active' => '1'));       
        $data['staffs'] = $staff->result_array();
        
        $data['selstaffid'] = $selstaffid;
        $data['calview'] = $calview;
        
        $data['sesStaffid'] = $sesStaffid;
        
        $this->load->layout('calendar/index', $data);
    }
    
    public function newBooking() {
        
        if(!empty($_GET['sd'])) {
            $data['sd'] = $_GET['sd'];
            $data['st'] = $_GET['st'];
        }
        if(!empty($_GET['selstaffid'])) {
            $data['selstaffid'] = $_GET['selstaffid'];
        }
        $data['services'] = $this->db->get("services")->result_array();
        
        $staffq = $this->db->query("SELECT a.id, a.first_name, a.last_name, b.*
                                    FROM staff a
                                    INNER JOIN staffroster b ON a.id = b.staffid");        
        $data['staffs'] = $staffq->result_array();
        
        $this->load->view('calendar/new_booking', $data);
    }
    
    public function addBooking() {
        
        if(!empty($_POST['booking'])) {
            $booking = $_POST['booking'];
            $appointment_id = $_POST['appointment_id'];
            
            $app_d = date('Y-m-d', strtotime($booking['date']));
            
            $appointment = array(
                'clientid' => (!empty($booking['customer_id']) ? $booking['customer_id'] : 1),
                'notes' => $booking['notes'],
                'date'  =>  $app_d,
                'isrepeat' => '0',
                'userid' => $this->user_id,
            );
            if(!empty($appointment_id)) {
                 $this->db->update('appointment', $appointment, array('id' => $appointment_id));
                 $appointmentid = $appointment_id;
            }else {
                $this->db->insert('appointment', $appointment);
                $appointmentid = $this->db->insert_id();
            }
            
            if(!empty($appointment_id)) {
                $this->db->delete('appointmentservices', array('appointmentid' => $appointment_id));
            }            
            $services = $booking['services'];
            foreach($services as $service) {
                $app_t = $service['time_start_field'];
                $combinedDT = date('Y-m-d H:i:s', strtotime("$app_d $app_t"));
                
                $appointmentservices = array(
                    'appointmentid' => $appointmentid,
                    'serviceid' => $service['serviceid'],
                    'staffid' => $service['employee_id'],
                    'userid' => $this->user_id,
                    'time' => $combinedDT,
                    'duration' => $service['duration_value']
                );
                $this->db->insert('appointmentservices', $appointmentservices);                
            }
            
            $appointmentstatus = array(
                'appointmentid' => $appointmentid,
                'userid' => $this->user_id,
                'status' => 'cnf',
                'cancelid' => 0
            );
            if(!empty($appointment_id)) {
                //$this->db->update('appointmentstatus', $appointmentstatus, array('appointmentid' => $appointment_id));
            }else {
                $this->db->insert('appointmentstatus', $appointmentstatus);
            }
            
            $q = 'true';            
            if($q == 'true'){
                $res['success'] = true;
            }else{
                $res['error'] = $q;
            }
            echo json_encode($res);          
        }
    }
    
    public function bookingDetail() {
        
        $appointment_id = $_GET['aid'];
        if(empty($appointment_id)) {
            return false;
        }
        $appointmentdetails = Common::getAppointmentDetails($appointment_id);
        $appointment = $appointmentdetails[0];
        $service = array();
        foreach($appointment['services'] as $services) {
            if( $services['service_id'] == $_GET['sid'] ) {
                $service = $services;
            }       
        }
        $data['appointment'] = $appointment;
        $data['service'] = $service;
        $this->load->view('calendar/booking_detail', $data);
    }
    
    public function changeStatus() {
        $id = $_GET['id'];
        $status = $_GET['status'];
        if(!empty($id) && !empty($status)) {
            $this->db->update('appointmentstatus', array('status' => $status), array('appointmentid' => $id));
            redirect('calendar/');
        }            
        else
            $this->load->view('errors/html/error_404');           
    }
    
    public function cancelBooking() {
        
        $appointment_id = $_GET['id'];
        if(!empty($appointment_id)) {
            
            $appointmentdetails = Common::getAppointmentDetails($appointment_id);
            $data['appointment'] = $appointmentdetails[0];
            
            $query = $this->db->get_where('businesscancels', array('active' => '1'));
            $data['cancelreasons'] = $query->result_array();
            
            $this->load->view('calendar/cancel_booking', $data);
        }else {
            $this->load->view('errors/html/error_404');   
        }        
    }
    
    public function cancelReason(){
        
        $this->db->update('appointmentstatus', array('status' => 'canc', 'cancelid' => $_POST['cancellation_reason_id']), array('appointmentid' => $_POST['appointment_id']));
        $res['success'] = true;
        echo json_encode($res);
    }
    
    public function editBooking() {
        
        $appointment_id = $_GET['id'];
        if(empty($appointment_id)) {
            return false;
        }
        $appointmentdetails = Common::getAppointmentDetails($appointment_id);
        $data['appointment'] = $appointmentdetails[0];        
        
        $data['services'] = $this->db->get("services")->result_array();
        
        $staffq = $this->db->query("SELECT a.id, a.first_name, a.last_name, b.*
                                    FROM staff a
                                    INNER JOIN staffroster b ON a.id = b.staffid");        
        $data['staffs'] = $staffq->result_array();
        
        $this->load->view('calendar/new_booking', $data);
    }
}
