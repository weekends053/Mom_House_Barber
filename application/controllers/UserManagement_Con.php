<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement_Con extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserManagement_Model', 'UMM');
        $this->load->model('Admin_Model', 'AM');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('index');
    }
    function create_barber() //ฟังก์ชั่น เพิมชาง
    {
        $this->load->view('crebarber_view'); //เรียกใช้งานหน้า เพิมชาง
    }
    function insert_barber()
    {
        //สร้างกฏสำหรับ C_Name 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Name', 'ชื่อ', 'required');
        //สร้างกฏสำหรับ C_Lname 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Lname', 'นามสกุล', 'required');
        //สร้างกฏสำหรับ C_Sex 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Nickname', 'ชื่อเล่น', 'required');
        //สร้างกฏสำหรับ C_Sex 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Sex', 'เพศ', 'required');
        //สร้างกฏสำหรับ C_Phone 'required|is_natural|exact_length[10]'คือต้องไม่เป็นค่าว่าง หรือ เป็นตัวเลขจำนวนเต็ม หรือ และต้องตัวอักษรเท่ากับ 10
        $this->form_validation->set_rules('B_Phone', 'เบอร์โทร', 'required|is_natural|exact_length[10]');
        //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง หรือ มีตัวอักษรอย่างน้อย 6 ตัว หรือ ตัวอักษรและตัวเลข
        $this->form_validation->set_rules('B_Address', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('Username', 'รหัสผู้ใช้', 'required|min_length[6]'); //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('Password', 'รหัสผ่าน', 'required|min_length[6]');
        $this->form_validation->set_error_delimiters('<font color=red>', '</font>');
        if ($this->input->post('btnRegister')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            if ($this->form_validation->run()) { //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
                $id = $this->UMM->GenerateId();
                $data = array(
                    'B_ID' => $id,
                    'B_Name' => $this->input->post("B_Name"),
                    'B_Lname' => $this->input->post("B_Lname"),
                    'B_Nickname' => $this->input->post("B_Nickname"),
                    'B_Sex' => $this->input->post("B_Sex"),
                    'B_Phone' => $this->input->post("B_Phone"),
                    'B_Address' => $this->input->post("B_Address"),
                    'Username' => $this->input->post("Username"),
                );
                $data1 = array(
                    'Username' => $this->input->post("Username"),
                    'Password' => $this->input->post("Password"),
                    'S_ID' => $this->input->post("S_ID"),
                );
                $this->UMM->createBarberlogin($data1);
                $this->UMM->createBarber($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                $this->load->view('admin_view');
            } else { //กรอกข้อมูลไม่ถูกต้องตามกฏ
                $this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลครบค่ะ !');
                $this->load->view('crebarber_view');
            }
        } else { //กลับไปหน้าล็อคอิน
            redirect('UserManagement_Con/crebarber_view');
        }
    }
    public function admin_seecustomerall()
    {
        $data['CUSTOMER'] = $this->AM->getCustomer();
        $this->load->view('show_customerall_view', $data);
    }
    public function admin_seebarberall()
    {
        $data['BARBER'] = $this->AM->getBarber();
        $this->load->view('show_barberall_view', $data);
    }
    public function admin_seebookingqueueall()
    {
        $data['BOOKING'] = $this->AM->getBooking();
        $this->load->view('show_bookingall_view', $data);
    }

    function admin_editbarber($id)
    {
        $data['BARBER'] = $this->UMM->selecting_OneBarberEdit($id);
        $this->load->view('admin_editbarber_view', $data);
    }

    function save_barber()
    {
        $data = array(
            'B_ID' => $this->input->post("B_ID"),
            'B_Name' => $this->input->post("B_Name"),
            'B_Lname' => $this->input->post("B_Lname"),
            'B_Sex' => $this->input->post("B_Sex"),
            'B_Phone' => $this->input->post("B_Phone"),
            'B_Address' => $this->input->post("B_Address"),
        );
        $check = $this->UMM->setBarber($data);
        if ($check == TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
            echo "</script>";
           $data1['BARBER'] = $this->AM->getBarber();
            $this->load->view('show_barberall_view', $data1); 
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
            echo "</script>";
            redirect('UserManagement_Con/admin_editbarber');
        }
        
    }

    public function del_barber($id)
    {
        $data['BARBER'] = $this->UMM->deleteBarber($id);
        redirect('UserManagement_Con/admin_seebarberall','refresh');
    }

    public function admin_editqueue($id)
    {
        $data['BOOKING'] = $this->UMM->selecting_OneBookingEdit($id);
        $this->load->view('admin_editbooking_view', $data);

    }
    function save_booking()
    {
        $data = array(
            'BK_ID' => $this->input->post("BK_ID"),
            'C_ID' => $this->input->post("C_ID"),
            'B_ID' => $this->input->post("B_ID"),
            'BK_Year' => $this->input->post("BK_Year"),
            'BK_Month' => $this->input->post("BK_Month"),
            'BK_Day' => $this->input->post("BK_Day"),
            'ST_ID' => $this->input->post("ST_ID"),
        );
        $check = $this->UMM->setBooking($data);
        if ($check == TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว')";
            echo "</script>";
           $data1['BOOKING'] = $this->AM->getBooking();
            $this->load->view('show_bookingall_view', $data1); 
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
            echo "</script>";
            redirect('UserManagement_Con/admin_editbooking_view');
        }
        
    }
    
}
