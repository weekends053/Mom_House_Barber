<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_Model extends CI_Model
{
    function GenerateId()
    {
        $query = $this->db->select('BK_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
            ->from('booking') //จากตาราง customer
            ->order_by('BK_ID', "ASC") //เรียงจากน้อยไปมาก
            ->get();    //เลือกหรือค้น
        $row = $query->last_row();    //นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
        if ($row) {    //เมื่อ row สำเร็จ
            $idPostfix = (int)substr($row->BK_ID, 2) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด B_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
            $nextId = 'BK' . STR_PAD((string)$idPostfix, 6, "0", STR_PAD_LEFT); //เติมตัว BK เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 6 ตำแหน่งจากฝั่งซ้าย
        } else {
            $nextId = 'BK000001';
        } //ถ้าไม่ใช่ ให้เริ่มต้นที่ BK00001
        return $nextId;    //คืนค่า nextId
    }


    function getTimeSlot()
    {
        $query = $this->db->select('ST_ID,ST_Time')->get('slot_time')-> result_array(); 
     
            $arr1 = array(); 
            foreach($query as $row) { 
                $arr1[$row['ST_ID']] = $row['ST_Time']; 
            } 
            $arr1[''] = '---Select Time Slot---'; 
            return $arr1; 
    }
    function checkTimeBarber($day,$month,$time,$barber)
    {
       $query = $this->db->where('BK_Day', $day)
                 ->where('BK_Month', $month)
                 ->where('ST_ID', $time)
                 ->where('B_ID', $barber)
                 ->count_all_results('booking');
                 return $query;
    }

    function createBookingQueueByCustomer($data)
    {
        $query = $this->db->insert('booking', $data);
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

    function getBookingQueueByCustomer()
    {
    }

    function cancelBookingQueueByCustomer()
    {
    }

    function checkStatus($Status)
    {
    }

    function setStatus($Status)
    {
    }

    function getStatus()
    {
    }

    function getBookingByMonth()
    {
        // $this->db->query("SELECT * FROM `booking` WHERE `BK_Year` = $year && `BK_Month` = $month");
        $query = $this->db->select('BK_Year,BK_Month,BK_Day')
            ->get('booking');
        return $query->result();
    }
    function selectBarber()
	{
            $query = $this->db->select('B_ID,B_Nickname')->get('barber')-> result_array(); 
     
            $arr = array(); 
            foreach($query as $row) { 
                $arr[$row['B_ID']] = $row['B_Nickname']; 
            } 
            $arr[''] = '---Select Barber---'; 
            return $arr; 
	}
    function selectMonth()
	{
            $query = $this->db->select('M_ID,M_Th_Name')->get('month')-> result_array(); 
     
            $arr = array(); 
            foreach($query as $row) { 
                $arr[$row['M_ID']] = $row['M_Th_Name']; 
            } 
            $arr[''] = '---Select Month---'; 
            return $arr; 
	}
}
