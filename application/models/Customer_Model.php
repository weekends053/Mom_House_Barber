<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_Model extends CI_Model
{

	function GenerateId()
	{
		$query = $this->db->select('C_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
			->from('customer') //จากตาราง customer
			->order_by('C_ID', "ASC") //เรียงจากน้อยไปมาก
			->get();	//เลือกหรือค้น
		$row = $query->last_row();	//นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
		if ($row) {	//เมื่อ row สำเร็จ
			$idPostfix = (int)substr($row->C_ID, 1) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด C_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
			$nextId = 'C' . STR_PAD((string)$idPostfix, 5, "0", STR_PAD_LEFT); //เติมตัว C เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 5 ตำแหน่งจากฝั่งซ้าย
		} else {
			$nextId = 'C00001';
		} //ถ้าไม่ใช่ ให้เริ่มต้นที่ C00001
		return $nextId;	//คืนค่า nextId
	}

	function register($data)
	{

		$query = $this->db->insert('customer', $data);
		if ($query) //เมื่อ query สำเร็จ
		{

			echo "<script language=\"JavaScript\">";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
			echo "</script>";
		} else {
			echo "<script language=\"JavaScript\">";
			echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
			echo "</script>";
		}
	}

	function register_login($data1)
	{

		$query = $this->db->insert('login', $data1);
		if ($query) //เมื่อ query สำเร็จ
		{

			echo "<script language=\"JavaScript\">";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
			echo "</script>";
		} else {
			echo "<script language=\"JavaScript\">";
			echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
			echo "</script>";
		}
	}

	function getProfile($sess)
	{

		$this->db->select('*')
			->from('customer')
			->join('login', 'login.Username = customer.Username', 'left')
			->where('customer.Username', $sess);

		$query = $this->db->get();
		return $query->result();
	}

	function setProfile($data)
	{
		$sess =  $this->session->userdata('Username'); //นำข้อมูล session เก็บไว้ในตัวแปร $id
		$query = $this->db->where('customer.Username', $sess) //ค้นหาจาก C_ID ถ้าตรงกับ $id ให้เก็บค่าไว้ใน $query
			->update('customer', $data); //จากนั้นอัปเดรตข้อมูล
		if ($query) //เมื่อ query สำเร็จ
		{
			echo "<script language=\"JavaScript\">";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
			echo "</script>";
		} else {
			echo "<script language=\"JavaScript\">";
			echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
			echo "</script>";
		}
	}
	function getBarberByCustomer($id) //ฟังก์ชั่น getBarberByCustomer โดยรับค่าพารามิเตอร์ $id มาจาก Customer_Con
	{
		$query = $this->db->where('B_ID', $id) //จากนั้นทำการค้นหาแบบกำหนดเงื่อนไขจากฟิลด์ B_ID ถ้า $id ที่รับมาตรงกับ B_ID
						  ->get('barber'); //ให้ทำการค้นหาจากตาราง barber
		return $query->row(); //จากนั้นนำค่า $query ส่งค่าเป็น object โดยจะส่งข้อมูลออกมาเพียง เรคอร์ดเดียว กลับไปที่ Customer_Con
	}
}
