<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model', 'LM');
        $this->load->model('Admin_Model', 'AM');
        $this->load->library(array('session', 'form_validation'));
    }
    public function index()
    {
        if (!$this->session->userdata('logged')) //ยังไม่มีการล็อคอิน
        {
            redirect('Login_Con/login'); //กลับไปหน้าล็อคอิน
        } else {
            $this->load->view('Login_Con/customer_page'); //แสดงหน้าหลัก
        }
    }
    public function login()
    {
        $this->load->view('login_view'); //แสดงฟอร์มล็อคอิน
    }
    //
    public function check_login()
    {
        $this->form_validation->set_rules('Username', 'รหัสผู้ใช้', 'required|min_length[6]'); //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('Password', 'รหัสผ่าน', 'required|min_length[6]');  //สร้างกฏสำหรับ Password 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_error_delimiters('<font color=red>', '</font>');
        if ($this->input->post('btnLogin')) //มีหารคลิกปุ่ม เข้าสู่ระบบ
        {
            $Username = $this->input->post('Username'); //รับค่า Username จากฟอร์ม
            $Password = $this->input->post('Password'); //รับค่า Password จากฟอร์ม
            if ($this->form_validation->run()) { //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
                $check = $this->LM->check_Login($Username, $Password); //ตรวจสอบชื่อผู้ใช้และรหัสผ่าน
                if ($check) { //Username และ Password ถูกต้อง
                    $status = $this->LM->check_StatusByUsername($Username); //ตรวจสอบ status โดยอ้างอิงตำแหน่งตาม Username
                    if ($status->S_ID == 1) {     //ถ้าสเตตัส = 1
                        $data = array('Username' => $Username, 'S_ID' => $status, 'logged' => TRUE); //$data เก็บค่า Usermae และ Status เป็น array
                        $this->session->set_userdata($data); //สร้างตัวแปร session
                        redirect('Login_Con/admin_page'); //ไปหน้า admin_view
                    } else if ($status->S_ID == 2) {
                        $data = array('Username' => $Username, 'S_ID' => $status, 'logged' => TRUE); //$data เก็บค่า Usermae และ Status เป็น array
                        $this->session->set_userdata($data); //สร้างตัวแปร session
                        redirect('Login_Con/barber_page'); //ไปหน้า barber_view
                    } else {
                        $data = array('Username' => $Username, 'S_ID' => $status, 'logged' => TRUE); //$data เก็บค่า Usermae และ Status เป็น array
                        $this->session->set_userdata($data); //สร้างตัวแปร session
                        redirect('Login_Con/customer_page'); //ไปหน้า customer_view
                    }
                } else {
                    $this->session->set_flashdata('msg_error', 'รหัสผ่านไม่ถูกต้องกรุณาตรวจสอบอีกครั้งค่ะ !');
                    $this->load->view('login_view'); //แสดงหน้าล็อคอิน
                }
            } else { //กรอกข้อมูลไม่ถูกต้องตามกฏ
                $this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลให้ครบค่ะ !');
                $this->load->view('login_view'); //กลับไปหน้า login
            }
        } else { //กลับไปหน้าล็อคอิน
            redirect('Login_Con/login');
        }
    }
    function logout() //ฟังก์ชั่นออกจากระบบ
    {
        $this->session->sess_destroy();
        $result['HS'] = $this->AM->get_HairStyle(); //ล้างค่าตัวแปร session
        $this->load->view('index', $result);
    }
    function admin_page()
    {
        $this->load->view('admin_view'); //เรียกใช้งานหน้า admin
    }
    function barber_page()
    {
        $this->load->view('barber_view'); //เรียกใช้งานหน้า barber
    }
    function customer_page()
    {
        $this->load->view('customer_view'); //เรียกใช้งานหน้า customer
    }
}
