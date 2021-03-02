<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Total_Control extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Barber_Model', 'BM');
		$this->load->model('OffWork_Model', 'OWM');
		$this->load->model('Admin_Model', 'AM');
	}
	//<------------------------------------Start Barber--------------------------------------------------------->

	public function insert_Barber()
	{
		$result = array(
			'B_ID' => $this->input->post("B_ID"),
			'B_Name' => $this->input->post("B_Name"),
			'B_Lname' => $this->input->post("B_Lname"),
			'B_Nickname' => $this->input->post("B_Nickname"),
			'B_Sex' => $this->input->post("B_Sex"),
			'B_Phone' => $this->input->post("B_Phone"),
			'B_Address' => $this->input->post("B_Address"),
			'B_Skill' => $this->input->post("B_Skill"),
			'B_Percent' => $this->input->post("B_Percent"),
			'B_Salary' => $this->input->post("B_Salary"),
		);
		if ($this->input->post("B_Name") != "" && $this->input->post("B_ID") !== "") {
			$this->BM->insert_Barber_Model($result);
			$result['res'] = $this->BM->Barber();
			$this->load->view('view_Barber', $result);
		} else {
			echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ !";
		}
	}

	//<------------------------------------End Barber--------------------------------------------------------->


	//<------------------------------------Start offWork--------------------------------------------------------->
	public function create_OffWork()
	{
		$data['DOW'] = $this->AM->dataJustSelect();
		$this->load->view('view_CreateBarberOffwork', $data);
	}
	public function ChangeValue()
	{
		if ($this->input->post('submit')) {
		}
		$data = array(
			'B_Name' => $this->input->post("B_Name"),
			'B_Lname' => $this->input->post("B_Lname"),
			'B_ID' => $this->input->post("B_ID"),
		);

		$this->AM->Update_DataBarber($data);
		//$data1['DOW'] = $this->AM->dataJustSelect($id);
		redirect('view_CreateBarberOffwork', 'refresh');
	}

	public function insert_offWork()
	{
		$result5 = array(
			'starting_Date' => $this->input->post("starting_Date"),
			'ending_Date' => $this->input->post("ending_Date"),
		);
		if ($this->input->post("starting_Date") != "" && $this->input->post("ending_Date") !== "") {
			$this->OWM->create_offWork_Model($result5);
		} else {
			echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ !";
		}
	}
	public function getOffWork()
	{
		$data['DOW'] = $this->AM->dataOffWork();
		$this->load->view('view_BarberOffWork', $data);
	}
	//<------------------------------------End Work--------------------------------------------------------->
	public function index()
	{
		$this->load->view('login_view');
	}
}
