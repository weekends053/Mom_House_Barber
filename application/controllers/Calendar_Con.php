<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Calendar_Con extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function calendar()
	{
		$config = array(
			'start_day' => 'monday', //เริ่มวันต้น วันจันทร์
			'month_type' => 'long', //ขนาดของชื่อเต็มเดือน long = ความยาว
			'day_type' => 'long', //ขนาดของชื่อเต็มเดือน //long = ความยาว
			'show_next_prev' => TRUE, //มีลูกศพให้กดในการเชื่อมโยงเดือน
			'next_prev_url' => site_url('Calendar_Con/calendar') //เลื่อนเดือนหรือย้อนหลังกลับไป
		);
		$events = array(
			1 => base_url() . 'index.php/Login_Con/login', //มีการเชื่อมโยงหน้าเวลากดที่วันที่
			10 => base_url() . 'index.php/Login_Con/login', //มีการเชื่อมโยงหน้าเวลากดที่วันที่
		);
		$this->load->library('calendar', $config); //เรียกใช้งาน calendar ใน library
		//รองรับ parameterแรกที่เป็น URI Segment
		$data['minicalendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);
		$this->load->view('calendar_view', $data);
	}
}
