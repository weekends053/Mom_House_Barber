<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barber_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Barber_Model','BM');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('index');
	}
	
	public function get_barber_queue()
	{
		$this->load->view('barber_queue_table');
	}

	function barber_profile() //ฟังก์ชั่นดู โปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->BM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('barber_get_profile', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
    }

    function get_profile_barber() //ฟังก์ชั่นดู โปรไฟล์ customer 
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->BM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('barber_profile', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า customer_get_profile
    }

}
