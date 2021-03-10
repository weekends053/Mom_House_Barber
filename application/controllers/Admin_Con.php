<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Admin_Model','AM');
		$this->load->helper('url');
	}
	
    public function admin_seecustomerall(){
        $data['CUSTOMER'] = $this->AM->getCustomer();
        $this->load->view('show_customerall_view',$data);
    }

    public function admin_seebarberall(){
        $data['BARBER'] = $this->AM->getBarber();
        $this->load->view('show_barberall_view',$data);
    }

    public function admin_seebookingqueueall()
    {
        $data['BOOKING'] = $this->AM->getBooking();
        $this->load->view('show_bookingall_view', $data);
    }

}
