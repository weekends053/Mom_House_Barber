<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    function getCustomer()
	{
		$this->db->select('*');
		$query = $this->db->get('customer');
		return $query->result();
	}

    function getBarber()
	{
		$this->db->select('*');	//ค้นหาจากฟิลด์ทั้งหมด
		$query = $this->db->get('barber');	//โดยค้นจากตาราง barber จากนั้นให้ $query เก็บฟังก์ชั่นไว้
		return $query->result(); //จากนั้นนำ $query ส่งค่าเป็น object ซึ่งอยู่ในรูปแบบ array กลับไปที่ Customer_Con
	}
	
	function getBooking()
	{
		$this->db->select('*');
		$query = $this->db->get('booking');
		return $query->result();
	}

    function get_HairStyle()
    {
        $this->db->select('*'); //เลือกจากตารางทั้งหมด
        $result = $this->db->get('hair_style');   //result เก็บค่าที่ get หรือ select จากตาราง hair_style ไว้
        return $result;
    }
}
