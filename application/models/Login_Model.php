<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Model extends CI_Model
{

    //คำสั่ง Check Login
    function check_Login($Username, $Password)
    { //ตรวจสอบชื่อผู้ใช้งานและรหัสผ่าน
        $query = $this->db->where('Username', $Username) //ค้นหาจากฟิลด์ Username
            ->where('Password', $Password) //ค้นหาจากฟิลด์ Password
            ->count_all_results('login'); //นับเรคอร์ดทั้งหมดที่เกิดจากคำสั่ง SQL ใช้กับ Where,Like เป็นต้น ค้นหาจากตาราง login
        return $query > 0 ? True : FALSE;   //คืนค่าที่ได้ถ้ามากกว่า 0 คืนค่าเป็น True ถ้ามีค่าเป็น 0 คืนค่า False
    }
    function check_StatusByUsername($Username)
    { //ตรวจสอบชื่อผู้ใช้งานและรหัสผ่าน
        //$query = $this->db->query("SELECT `S_ID` FROM `login` WHERE `Username` = '$Username'");
        $this->db->select('S_ID') //เลือกตาราง S_ID
            ->where('Username', $Username) //ค้นหาจาก Username
            ->from('login'); //จากตาราง login
        $query = $this->db->get(); //เป็นฟังก์ชั่นค้นหาข้อมูลหรือ Select ใน SQL จะใช้คำสั่่งว่า Select
        return $query->row(); //row(); เป็นฟังก์ชั่นดึงข้อมูลเพียงเรคอร์ดเดียว
    }
}
