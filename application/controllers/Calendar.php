<?php
class Calendar extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('calendar_model');
        $this->user_id = $this->config->item('user_id');
    }
    
    function index() {
        
//        $query = $this->db->query("SELECT a.id AS appointment_id, a.clientid AS clientid, a.date AS appointment_date, s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, t.status, t.cancelid, c.firstname AS fname_c, c.lastname AS lname_c, c.mobile, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
//                                FROM appointment a
//                                INNER JOIN appointmentservices s ON a.id = s.appointmentid
//                                INNER JOIN appointmentstatus t ON a.id = t.appointmentid
//                                LEFT JOIN clients c ON a.clientid = c.id
//                                INNER JOIN services v ON s.serviceid = v.id
//                                INNER JOIN staff f ON s.staffid = f.id");
//        $appointmentdetails = $query->result_array();
        
        $events = array();
        $appointmentdetails = $this->getAppointmentDetails();
        foreach($appointmentdetails as $k =>  $appointment) {
            //$appointmentdetails[$k]['app_start'] = $appointment['appointment_time'];
            //$appointmentdetails[$k]['app_end'] = date('Y-m-d H:i:s', strtotime("+".$appointment['duration']." minutes"));
//            $title = '';  
//            $title .= "<span>".date('h:ia', strtotime($appointment['appointment_time']))."</span>&nbsp;&nbsp;<span><b>".$appointment['fname_c']."</b></span>";
//            $title .= "<span>".$appointment['service']."</span>";
            
            $start_t = $appointment['appointment_time'];        
            $end_t = date("Y-m-d H:i:s", (strtotime($start_t)+(60*$appointment['duration'])));
            
            $title = date('h:ia', strtotime($start_t)) ." - ".date('h:ia', strtotime($end_t));
            
            $events[$k]['title'] = $title;
            $events[$k]['start'] = $start_t;
            $events[$k]['end'] = $end_t;
            
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
            $events[$k]['color'] = $color;
            
            $events[$k]['app_detail']['status_lbl'] = $st_lbl;
            $events[$k]['app_detail']['client_lbl'] = ($appointment['clientid'] == '0') ? 'Walk-In' : $appointment['fname_c'] .' '. $appointment['lname_c'];
            $events[$k]['app_detail']['service_lbl'] = $appointment['service'];
            $events[$k]['app_detail']['tofrom_lbl'] = $appointment['app_t_format'];
            $events[$k]['app_detail']['staff_lbl'] = $appointment['fname_s'] .' '. $appointment['lname_s'];
            $events[$k]['app_detail']['price_lbl'] = $appointment['price'];
            $events[$k]['app_detail']['sp_lbl'] = $appointment['special_price'];
            
            $events[$k]['appointment_id'] = $appointment['appointment_id'];
            
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
        $data['staffs'] = $this->db->get("staff")->result_array();
        $this->load->view('calendar/new_booking', $data);
    }
    
    public function addBooking() {
        
        if(!empty($_POST['booking'])) {
            $booking = $_POST['booking'];
            $appointment_id = $_POST['appointment_id'];
            
            $app_d = date('Y-m-d', strtotime($booking['date']));
            
            $appointment = array(
                'clientid' => (!empty($booking['customer_id']) ? $booking['customer_id'] : 0),
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
            
            $appointmentstatus = array(
                'appointmentid' => $appointmentid,
                'status' => 'cnf',
                'cancelid' => 0
            );
            if(!empty($appointment_id)) {
                $this->db->update('appointmentstatus', $appointmentstatus, array('appointmentid' => $appointment_id));
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
        
        $appointment_id = $_GET['id'];
        if(empty($appointment_id)) {
            return false;
        }
        $appointmentdetails = $this->getAppointmentDetails($appointment_id);
        $data['appointment'] = $appointmentdetails[0]; 
        $this->load->view('calendar/booking_detail', $data);
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
            
            $appointmentdetails = $this->getAppointmentDetails($appointment_id);
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
        $appointmentdetails = $this->getAppointmentDetails($appointment_id);
        $data['appointment'] = $appointmentdetails[0];        
        $data['services'] = $this->db->get("services")->result_array();
        $data['staffs'] = $this->db->get("staff")->result_array();
        $this->load->view('calendar/new_booking', $data);
    }
}
