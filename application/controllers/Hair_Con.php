<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hair_Con extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model', 'AM');
	}
	public function show_data_hair()
	{
		$result['HS'] = $this->AM->get_HairStyle();
		$this->load->view('hair_view', $result);
	}
}
