<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model', 'AM');
    }

    public function index()
    {
        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS
		$this->load->view('index',$result);
    }

	public function non_cus_hair_style()
    {
        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS
		$this->load->view('non_cus_hair_style',$result);
    }

    public function header()
	{
		$this->load->view('header'); //เรียกใช้หน้า index
	}

	public function customer_navbar()
	{
		$result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS
		$this->load->view('customer_navbar',$result); //เรียกใช้หน้า index
	}

	public function all_banner()
	{
		$this->load->view('all_banner'); //เรียกใช้หน้า index
	}

	public function admin_navbar()
	{
		$this->load->view('admin_navbar'); //เรียกใช้หน้า index
	}

	public function non_customer_navbar()
	{
		$this->load->view('non_customer_navbar'); //เรียกใช้หน้า index
	}

	public function banner()
	{
		$this->load->view('banner'); //เรียกใช้หน้า index
	}

	public function calendar()
	{
		$config = array(
			'start_day' => 'monday',
			'month_type' => 'long',
			'day_type' => 'long',
			'show_next_prev' => TRUE,
			'next_prev_url' => site_url('Calendar_Con/calendar')
		);
		$events = array(
			1 => base_url() . 'index.php/Login_Con/login',
			10 => base_url() . 'index.php/Login_Con/login',
		);
		$this->load->library('calendar', $config);
		$data['minicalendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);
		$this->load->view('calendar', $data);
	}

    public function hair_page()
    {
        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS
        $this->load->view('hair_view', $result); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }
    
    public function customer_hair_page()
    {
        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS
		$this->load->view('customer_hair_view',$result); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }

	public function barber_haircut_history()
    {
		$this->load->view('barber_haircut_history'); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }

	public function barber_add_portfolio()
    {
		$this->load->view('barber_add_portfolio'); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }

	public function barber_view_admin()
    {
		$this->load->view('barber_view_admin'); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }

	public function test_login()
    {
		$this->load->view('test_login'); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }

	public function get_admin_queue()
	{
		$this->load->view('barber_admin_table');
	}

}
