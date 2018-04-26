<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once ('assets\razorpay-php\Razorpay.php');
// require_once(b('assets\razorpay-php\Razorpay.php'));
require_once APPPATH."third_party/razorpay-php/Razorpay.php";
use Razorpay\Api\Api as RazorpayApi;

// use Rhumsaa\Uuid\Uuid;
// use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class Payment extends CI_Controller {

		function __construct () {
				parent::__construct ();
		}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data = array();
		// $this->load->view('agentDashboardView',$data);
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		// log_message('info','$stu_id'.$data['stu_id']);	
        $data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
            $this->load->view('stuPaymentForm', $data);
		}else{
            $this->load->view('stuLoginView');
        } 
        
        // $data = array();
		// $this->load->view('agentDashboardView',$data);
		// if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
        //     $data = $this->session->all_userdata();
            // log_message('info','$stu_id'.$data['stu_id']);	
        //     $data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
        // }
        // $this->load->view('stuPaymentForm', $data);
        //$this->user();
        
	}

	public function rp_cust()
	{   
        $data = array();
		// $this->load->view('agentDashboardView',$data);
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		// log_message('info','$stu_id'.$data['stu_id']);	
        $data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
        $stu_id = $data['stu_id'];

		//$msb_customer = array();
		
		//Razorpay API
		//Copy Paste the MaRRs Razorpay account key here instead
		$api = new RazorpayApi('rzp_test_w24skZJGArPSvr', 'dNwUhAAi0JxwpFuISvuAV8jL');
		$params = array(
		    'count' => 2,
		    'skip'  => 1,
		    'from'  => 1400826740
		);

		// getting post data		
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		$msb_customer['name'] = $name;
		$msb_customer['email'] = $email;
		//setting plan name
		$msb_customer['plan_id'] = $this->input->post('plan_id');
		// creating customer and getting response in rp_customer
		$rp_customer = $api->customer->create(array('name' => $msb_customer['name'], 'email' => $msb_customer['email']));
		//saving customer id to session
        $this->session->set_flashdata('msb_customer_id', $rp_customer->id);
        $this->session->set_flashdata('msb_customer_plan_id', $msb_customer['plan_id']);
        log_message('info','cust_plan_id1'.$msb_customer['plan_id']);
		// adding to database if customer is created at razorpay
        if($rp_customer->id){
			//fetching customer id from razorpay
            $msb_customer['cust_rp_id'] = $rp_customer->id;
	        // Calling a modal function to insert to database
	        $result = $this->data->create_Customer($msb_customer, $stu_id);
            $response['data'] = $msb_customer;
            log_message('info',print_r($response,TRUE));
            echo json_encode ($response);
			return $result;
        }
    }else{
        $this->load->view('stuLoginView');
    } 
	}
	

 	public function subscr(){
        $data = array();
		// $this->load->view('agentDashboardView',$data);
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
            $data = $this->session->all_userdata();
            // log_message('info','$stu_id'.$data['stu_id']);	
            $data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
            $api = new RazorpayApi('rzp_test_w24skZJGArPSvr', 'dNwUhAAi0JxwpFuISvuAV8jL');

            $params = array(
                'count' => 2,
                'skip'  => 1,
                'from'  => 1400826740
            );
            //payment authorize and capture

            // fetching parameters
            $payments = $api->payment->all($params);
            $pid = $_POST["razorpay_payment_id"]; 
            $payment = $api->payment->fetch($pid);
            //getting customer id from session
            $cust_id = $this->session->flashdata('msb_customer_id'); 
            $cust_plan_id = $this->session->flashdata('msb_customer_plan_id'); 
            // log_message('info',print_r($payments,TRUE));
            
            // Capturing Payment
            $amount =  $payment->amount;
            $capture = $payment->capture(array('amount' => $amount));
            $status = $capture->status;
            if($status=="captured"){
                $current_timestamp = time();
                // Creating Subscription
                $subscription  = $api->subscription->create(array('plan_id' => $cust_plan_id, 'customer_notify' => 1, 'customer_id' => $cust_id, 'total_count' => 6, 'start_at' => $current_timestamp));
                log_message('info','cust_plan_id2'.$cust_plan_id);
            }	
            if($subscription->id){
                $subscribe['sub_id'] = $subscription->id;
                $subscribe['cust_rp_id'] = $cust_id;
                $result = $this->data->update_sub_Customer($subscribe);
                header('Location: http://machine.local:8888/marrs-stu/stu/');
            }
        }else{
            $this->load->view('stuLoginView');
        } 
    }
    public function fetchSubs(){
        $data = array();
		// $this->load->view('agentDashboardView',$data);
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
            $data = $this->session->all_userdata();
            // log_message('info','$stu_id'.$data['stu_id']);	
            $data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
            $api = new RazorpayApi('rzp_test_w24skZJGArPSvr', 'dNwUhAAi0JxwpFuISvuAV8jL');

            $params = array(
                'count' => 2,
                'skip'  => 1,
                'from'  => 1400826740
            );
            $subscription  = $api->subscription->fetch('sub_A3kx2gNchJHocu');
            echo json_encode ($subscription);
            log_message('info',print_r($subscription,TRUE));
        }else{
            $this->load->view('stuLoginView');
        } 
    }
}