<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Booking_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_Model', 'BKM');
        $this->load->model('Customer_Model', 'CM');
        $this->load->model('Admin_Model', 'AM');
    }
    function select_day()
    {
        $days = array(0 => '---Select Days---');
        for ($d = 1; $d <= 31; $d++) {
            $days[] = $d;
        }
        return $days;
    }
    function select_month()
    {
        $month = array(
            0 => '---Select Month---', 1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤกภาคม', 6 => 'มิถุนายน',
            7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
        );
        for ($m = 13; $m <= 12; $m++) {
            $month[] = $m;
        }
        return $month;
    }
    function select_year()
    {
        $year = array(0 => '---Select Year---', 2021 => '2021');
        for ($y = 2021; $y < 2021; $y++) {

            $year[] = $y;
        }
        return $year;
    }

    function getNumberOfDays($month, $year)
    {
        $numday = 31;
        if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
            $numday = 30;
        } else if ($month == 2) {
            $numday = $year % 4 != 0 || ($year % 100 == 0 && $year % 400 != 0) ? $numday = 28 : 29;
        }
        return $numday;
    }

    function Booking()
    {
        $sess =  $this->session->userdata('Username');
        $data['CUSTOMER'] = $this->CM->getProfile($sess);
        $data['BARBER'] = $this->BKM->selectBarber();
        $data['YEAR'] = $this->select_year();
        $data['MONTH'] = $this->select_month();
        $data['DAY'] = $this->select_day();
        $data['TIME_SLOT'] = $this->BKM->selectTimeSlot();
        $this->load->view('booking_view', $data);
    }
   

    function ins_Booking()
    {
        $customer = $this->input->post('C_ID');
        $year = $this->input->post('BK_Year');
        $month = $this->input->post('BK_Month');
        $day = $this->input->post('BK_Day');
        $time = $this->input->post('ST_ID');
        $barber = $this->input->post('B_ID');
        if ($this->input->post('btnBooking')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            $checkBookingDuplicate = $this->BKM->checkBookingDuplicate($customer);
            $checkBooking = $this->BKM->checkTimeBarber($year,$month,$day,$time,$barber);
                if($this->input->post('BK_Year') == 0 || $this->input->post('BK_Month') == 0 || $this->input->post('BK_Day') == 0 || $this->input->post('ST_ID') == 0 || $this->input->post('B_ID') == '')
                {
                    echo "<script language=\"JavaScript\">";
                    echo "alert('กรุณาเลือกข้อมูลทั้งหมดให้ถูกต้องด้วยค่ะ !')";
                    echo "</script>";
                    redirect('Booking_Con/Booking','refresh');
                }else if($checkBookingDuplicate == 1){ //เช็คว่าลูกค้าคนเดิมจองคิวซ้ำไหม
                    echo "<center><font color='red'><h1>คุณมีการจองคิวอยู่แล้วค่ะ</h1></font></center>";
                    $data['BOOKING'] = $this->CM->getBookingQueue($customer);
                    $this->load->view('showbookingqueue_view',$data);
                }else if($checkBooking == 1){ //เช็คว่าในวันเดือนช่างและรอบนั้นลูกค้าจองซ้ำไหม 
                    echo "<center><font color='red'><h1>การจองไม่สำเร็จ ! วันเดือนปีและเวลาที่คุณเลือกช่างตัดผมมีคิวลูกค้าท่านอื่นแล้วค่ะ</h1></font></center>";
                    $data['TIMESLOT'] = $this->BKM->getTimeSlot();
                    $this->load->view('showtimeslot_view',$data);  
                }else{
                $id = $this->BKM->GenerateId();
                $data = array(
                    'BK_ID' => $id,
                    'C_ID' => $this->input->post('C_ID'),
                    'B_ID' => $this->input->post('B_ID'),
                    'BK_Day' => $this->input->post('BK_Day'),
                    'BK_Month' => $this->input->post('BK_Month'),
                    'BK_Year' => $this->input->post('BK_Year'),
                    'ST_ID' => $this->input->post('ST_ID'),
                );
                $this->BKM->createBookingQueueByCustomer($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                $c_id = $this->input->post('C_ID');
                $data['BOOKING'] = $this->BKM->getBookingQueueByCustomer($c_id);
                $this->load->view('showbookingqueue_view', $data);
                
            }
        }
    }
}
