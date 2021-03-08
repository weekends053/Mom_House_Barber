<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_Model', 'CM');
        $this->load->model('Barber_Model','BM');
        $this->load->model('Booking_Model','BKM');
    }
    function index() //ฟังก์ชั่น index
    {
        $this->load->view('index'); //เรีียกใช้งานหน้า index
    }
    function register() //ฟังก์ชั่น register
    {
        $this->load->view('register_view'); //เรียกใช้งานหน้า register
    }
    function insert_regis() //ฟังก์ชั่น insert customer
    {
        //สร้างกฏสำหรับ C_Name 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Name', 'ชื่อ', 'required');
        //สร้างกฏสำหรับ C_Lname 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Lname', 'นามสกุล', 'required');
        //สร้างกฏสำหรับ C_Sex 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Sex', 'เพศ', 'required');
        //สร้างกฏสำหรับ C_Phone 'required|is_natural|exact_length[10]'คือต้องไม่เป็นค่าว่าง หรือ เป็นตัวเลขจำนวนเต็ม หรือ และต้องตัวอักษรเท่ากับ 10
        $this->form_validation->set_rules('C_Phone', 'เบอร์โทร', 'required|is_natural|exact_length[10]');
        //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง หรือ มีตัวอักษรอย่างน้อย 6 ตัว หรือ ตัวอักษรและตัวเลข
        $this->form_validation->set_rules('Username', 'รหัสผู้ใช้', 'required|min_length[6]|alpha_numeric');
        //สร้างกฏสำหรับ Password 'required'คือต้องไม่เป็นค่าว่าง หรือ มีตัวอักษรอย่่างน้อย 6 ตัว
        $this->form_validation->set_rules('Password', 'รหัสผ่าน', 'required|min_length[6]');
        //ใช้กำหนดข้อผิดพลาดโดยรูปแบบในการแสดงข้อผิดพลาด เป็นตัวหนังสือสีแดง
        $this->form_validation->set_error_delimiters('<font color=red>', '</font>');
        if ($this->input->post('btnRegister')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            if ($this->form_validation->run()) { //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
                $id = $this->CM->GenerateId();
                $data = array(
                    'C_ID' => $id,
                    'Username' => $this->input->post("Username"),
                    'C_Name' => $this->input->post("C_Name"),
                    'C_Lname' => $this->input->post("C_Lname"),
                    'C_Sex' => $this->input->post("C_Sex"),
                    'C_Phone' => $this->input->post("C_Phone"),
                );
                $data1 = array(
                    'Username' => $this->input->post("Username"),
                    'Password' => $this->input->post("Password"),
                    'S_ID' => $this->input->post("S_ID"),
                );
                $this->CM->register_login($data1);   //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                $this->CM->register($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล

                redirect('Page_Con/index','refresh');
            } else { //กรอกข้อมูลไม่ถูกต้องตามกฏ
                $this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลครบค่ะ !');
                $this->load->view('register_view');
            }
        } else { //กลับไปหน้าล็อคอิน
            redirect('Customer_Con/register_view');
        }
    }

    function show_profile() //ฟังก์ชั่นดู โปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->CM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('profile_view', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
    }

    function edit_profile() //ฟังก์ชั่น แก้ไขโปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->CM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('edit_view', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
    }

    function save_profile() //ฟังก์ชั่น update customer
    {
        $data = array(
            'C_ID' => $this->input->post("C_ID"),
            'C_Name' => $this->input->post("C_Name"),
            'C_Lname' => $this->input->post("C_Lname"),
            'C_Sex' => $this->input->post("C_Sex"),
            'C_Phone' => $this->input->post("C_Phone"),
            'C_Facebook' => $this->input->post("C_Facebook"),
            'C_Img' => $this->input->post("C_Img"),
        );
        $this->CM->setProfile($data);
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data1['CUSTOMER'] = $this->CM->getProfile($sess);
        $this->load->view('profile_view', $data1);
    }

    function show_barber(){ //ฟังก์ชั่น show_barber
        $data['Barber'] = $this->BM->getBarber(); //ดึงข้อมูลมาจาก Admin_Model จากนั้นเรียกใช้ฟังก์ชั่น getBarberAll ใน Admin_Model
        $this->load->view('selecting_Barber_view', $data); //เรียกใช้หน้า selecting_Barber_view แล้วส่งค่าไปยังหน้า selecting_Barber_view
    }

    function detail_profilebarber($id){ //ฟังก์ชั่น detail_profilebarber โดยรับ object $id มาจาก show_barber
        $data['ID'] = $this->CM->getBarberByCustomer($id); //เรียกใช้งานฟังก์ชั่น getBarberByCustomer มาจาก Admin_Model จากนั้นส่ง พารามิเตอร์ $id ไป
        $this->load->view('barber_profile', $data); //เรียกใช้งานหน้า barber_profile แล้วนำข้อมูล data ที่เก็บไว้ โดยชื่อว่า ID ไปที่หน้า barber_profile
    }
    function show_bookingqueue($c_id){
        $data['BOOKING'] = $this->CM->getBookingQueue($c_id);
         $this->load->view('showbookingqueue_view', $data);
         
    } 
    function del_booking($id){
        $check = $this->CM->cancelBooking($id);
        if($check){
            echo "<script language=\"JavaScript\">";
			echo "alert('ลบคิวที่คุณจองเรียบร้อยแล้วค่ะ')";
			echo "</script>";
         redirect('Login_Con/Customer_page','refresh');   
        }else{
            echo "<script language=\"JavaScript\">";
			echo "alert('ไม่สามารถลบข้อมูลได้ค่ะ !')";
			echo "</script>";
        }
        
    } 
}
