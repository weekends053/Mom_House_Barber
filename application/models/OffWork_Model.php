<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffWork_Model extends CI_Model {
    
	function create_offWork_Model($result5){
        $query = $this->db->insert('offwork',$result5);
        if($query){
			echo"<script language=\"JavaScript\">";
			echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
			echo"</script>";
		   }
		   else{
			echo"<script language=\"JavaScript\">";
			echo"alert('ไม่สามารถบันทึกข้อมูลได้ค่ะ')";
			echo"</script>";
		   }
    }
	function get_BarberByID($id)
	{
		$this->db->query("SELECT `B_ID`,`B_Name`,`B_Lname` FROM `barber` WHERE `B_ID` ='$id'");
		$query = $this->db->get();
		return $query->result();

	}
	function get_DataByID($data)
        {
            $this->db->select('B_Name,B_Lname');
            $this->db->where('B_ID',$data);
            $this->db->from('barber');
            $query = $this->db->get();    
            return $query->result();
		}
}
