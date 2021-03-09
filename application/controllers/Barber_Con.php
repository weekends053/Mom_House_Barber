<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barber_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Barber_Model','BM');
		$this->load->helper('url');
	}
	function show_profilebarber() //ฟังก์ชั่นดู โปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('profilebarber_view', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
    }

}
