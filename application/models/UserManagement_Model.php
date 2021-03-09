<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement_Model extends CI_Model
{

	function createBarber($data)
	{
		$query = $this->db->insert('barber', $data);
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
	function createBarberlogin($data1)
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
	function GenerateId()
	{
		$query = $this->db->select('B_ID') //เลือกฟิลด์ B_ID โดยเก็บคำสั่งไว้ในตัวแปร query
			->from('barber') //จากตาราง barber
			->order_by('B_ID', "ASC") //เรียงจากน้อยไปมาก
			->get();	//เลือกหรือค้น
		$row = $query->last_row();	//นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
		if ($row) {	//เมื่อ row สำเร็จ
			$idPostfix = (int)substr($row->B_ID, 1) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด B_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
			$nextId = 'B' . STR_PAD((string)$idPostfix, 5, "0", STR_PAD_LEFT); //เติมตัว B เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 5 ตำแหน่งจากฝั่งซ้าย
		} else {
			$nextId = 'B00001';
		} //ถ้าไม่ใช่ ให้เริ่มต้นที่ C00001
		return $nextId;	//คืนค่า nextId
	}

	function deleteBarber($id)
	{    //ฟังชั่น deleteBarber จากนั้น รับตัวแปร $id มา
		$query = $this->db->where('B_ID', $id) // เรียกใช้ฟังชั่น where จากนั้น กำหนดเงื่อนไขจากฟิล B_ID แล้วทำการเช็กตัวแปร $id ว่าตรงกับข้อมูลในฟิลไหม
			->delete('barber'); // เรียกใชฟังชั่น delete โดยลบจากตาราง barber
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function selecting_OneBarberEdit($id)
	{
		$this->db->select('*')
			->from('barber')
			->where('B_ID', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function setBarber($data)
	{
		$query = $this->db->where('B_ID',$data['B_ID'])
			->update('barber',$data);
		if($query){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function selecting_OneBookingEdit($id)
	{
		$this->db->select('*')
			->from('booking')
			->where('BK_ID', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function setBooking($data){
		$query = $this->db->where('BK_ID',$data['BK_ID'])
			->update('booking',$data);
		if($query){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}
