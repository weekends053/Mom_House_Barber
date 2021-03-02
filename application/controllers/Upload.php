<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
	function __constractor()
	{
		parent::__construct();
	}
	public function index()
	{
		$data = array('error' => '');
		$this->load->view('form_view', $data); //แสดงฟอร์มสำหรับอัพโหลดไฟล์
	}
	public function do_upload()	//ฟังก์ชั่น Upload ไฟล์เดียว
	{
		$config['upload_path']          = 'uploads'; //โฟลเดอร์สำหรับอัปโหลดอยู่ที่ C:\Appserv\www\Test\uploads
		$config['allowed_types']        = 'gif|jpg|png|jpeg'; //กำหนดชนิดของไฟล์ที่อัปโหลดได้ 
		$config['max_size']             = 10024; //กำหนดขนาดสูงสุดของไฟล์ที่อัปโหลดจากตัวอย่าง 10MB
		$config['max_width']            = 6000;  //กำหนดขนาดของความกว้าง
		$config['max_height']           = 6000;	 //กำหนดขนาดของความสูง


		$this->load->library('upload', $config); //โหลดไลบรารี File Upload

		if (!$this->upload->do_upload()) //ไฟล์ที่อัปโหลดมีค่าไม่ถูกต้อง หรือ เกิดข้อผิดพลาดขึ้น
		{
			$error = array('error' => $this->upload->display_errors()); //เก็บข้อความผิดพลาด(Error)
			$this->load->view('form_view', $error); //แสดงข้อผิดพลาด (Error) ออกทางไฟล์ view		
		} else {	//ถูกต้องตามเงื่อนไชที่กำหนด
			$data = array('upload_data' => $this->upload->data()); //เก็บข้อมูลรายละเอียดของไฟล์ที่อัปโหลด
			$this->load->view('success_view', $data);	//ส่งค่ารายละเอียดของไฟล์ที่ได้ แสดงออกจากไฟล์ View
		}
	}




	public function index1()
	{
		$data = array('error' => '');
		$this->load->view('form1_view', $data); //แสดงฟอร์มสำหรับอัพโหลดไฟล์
	}
	public function up_multifile()
	{
		$config['upload_path']          = 'uploads'; //โฟลเดอร์สำหรับอัปโหลดอยู่ที่ C:\Appserv\www\Test\uploads
		$config['allowed_types']        = 'gif|jpg|png|jpeg'; //กำหนดชนิดของไฟล์ที่อัปโหลดได้ 
		$config['max_size']             = 10024; //กำหนดขนาดสูงสุดของไฟล์ที่อัปโหลดจากตัวอย่าง 10MB
		$config['max_width']            = 6000;  //กำหนดขนาดของความกว้าง
		$config['max_height']           = 6000;	 //กำหนดขนาดของความสูง
		$this->load->library('upload', $config); //โหลดไลบรารี File Upload
		$i = 0;
		$j = 0;
		for ($i = 0; $i < count($_FILES); $i++) {
			if (!$this->upload->do_upload('userfile' . $i)) {
				$i = $i + 1;
				echo 'Error message:' . $this->upload->display_errors() . '<br />';
			} else {
				$j = $j + 1;
			}
		}
		echo 'Upload' . $j . 'file(s) success,' . $i . 'file(s) failed. <br /><br />';
	}
}
