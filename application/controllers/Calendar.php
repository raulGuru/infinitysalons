<?php
class Calendar extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('calendar_model');
        $this->user_id = $this->config->item('user_id');
    }
    
    function index() {
        
        $events = array();
        $e = 0;
        $appointmentdetails = Common::getAppointmentDetails();
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
        $this->load->layout('calendar/index', $data);
    }
    
    public function newBooking() {
        
        if(!empty($_GET['sd'])) {
            $data['sd'] = $_GET['sd'];
            $data['st'] = $_GET['st'];
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
                'isrepeat' => '0'
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
                    'time' => $combinedDT,
                    'duration' => $service['duration_value']
                );
                $this->db->insert('appointmentservices', $appointmentservices);                
            }
            
            /*
            $app_t = $booking['time_start_field'];            
            $combinedDT = date('Y-m-d H:i:s', strtotime("$app_d $app_t"));
            
            $appointmentservices = array(
                'appointmentid' => $appointmentid,
                'serviceid' => $booking['service_pricing_level_id'],
                'staffid' => $booking['employee_id'],
                'time' => $combinedDT,
                'duration' => $booking['duration_value']
            );
            if(!empty($appointment_id)) {
                $this->db->update('appointmentservices', $appointmentservices, array('appointmentid' => $appointment_id));
            }else {
                $this->db->insert('appointmentservices', $appointmentservices);
            }
            */
            
            $appointmentstatus = array(
                'appointmentid' => $appointmentid,
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
    
    /*
    private function getAppointmentDetailsnew($appointment_id){
        
        $where = "WHERE t.status != 'canc' AND t.status != 'paid' ";
        if(!empty($appointment_id)) {
            $where = ' AND a.id='.$appointment_id.'';
        }
        
        $query = $this->db->query("SELECT a.id AS appointment_id, a.clientid AS clientid, a.date AS appointment_date, a.notes AS booking_notes, t.status, t.cancelid, c.firstname AS fname_c, c.lastname AS lname_c, c.mobile, c.notes 
                        FROM appointment a
                        INNER JOIN appointmentstatus t ON a.id = t.appointmentid
                        INNER JOIN clients c ON a.clientid = c.id $where");
        $appointment_array = $query->result_array();
        
        $appointments = array();
        foreach($appointment_array as $key => $appointment) {
            
            $appointments[$key] = $appointment;
            
            $services = array();
            $squery = $this->db->query("SELECT s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
                        FROM appointmentservices s 
                        INNER JOIN services v ON s.serviceid = v.id 
                        INNER JOIN staff f ON s.staffid = f.id
                        WHERE s.appointmentid = '".$appointment['appointment_id']."' ");
            $ser_array = $squery->result_array();
            foreach($ser_array as $k => $ser) {
                $services[$k] = $ser;
                
                $start_t = $ser['appointment_time'];  
                $end_t = date("Y-m-d H:i:s", (strtotime($start_t)+(60*$ser['duration'])));
                $services[$k]['start_time'] = $start_t; 
                $services[$k]['end_time'] = $end_t;
                $services[$k]['app_t_format'] = date('h:ia', strtotime($start_t)) ." - ".date('h:ia', strtotime($end_t));
            }
            $appointments[$key]['services'] = $services;
            $appointments[$key]['reference_id'] = 'REFAPP'.$appointment['appointment_id'].'CL'.$appointment['clientid'];
        }
        return $appointments;        
    }
    
    private function getAppointmentDetails($appointment_id) {
        
        $where = "WHERE t.status != 'canc' AND t.status != 'paid' ";
        if(!empty($appointment_id)) {
            $where = ' AND a.id='.$appointment_id.'';
        }
        
        $query = $this->db->query("SELECT a.id AS appointment_id, a.clientid AS clientid, a.date AS appointment_date, a.notes AS booking_notes, s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, t.status, t.cancelid, c.firstname AS fname_c, c.lastname AS lname_c, c.mobile, c.notes, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
                                FROM appointment a
                                INNER JOIN appointmentservices s ON a.id = s.appointmentid
                                INNER JOIN appointmentstatus t ON a.id = t.appointmentid
                                LEFT JOIN clients c ON a.clientid = c.id
                                INNER JOIN services v ON s.serviceid = v.id
                                INNER JOIN staff f ON s.staffid = f.id $where");
        $appointment_array = $query->result_array();
        $appointments = array();
        foreach($appointment_array as $key => $appointment) {
            $appointments[$key] = $appointment;
            $start_t = $appointment['appointment_time'];  
            $end_t = date("Y-m-d H:i:s", (strtotime($start_t)+(60*$appointment['duration'])));
            $appointments[$key]['start_time'] = $start_t; 
            $appointments[$key]['end_time'] = $end_t;
            $appointments[$key]['app_t_format'] = date('h:ia', strtotime($start_t)) ." - ".date('h:ia', strtotime($end_t));
            $appointments[$key]['reference_id'] = 'REFAPP'.$appointment['appointment_id'].'CL'.$appointment['clientid'];
        }
        return $appointments;
    }
    */
    
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
