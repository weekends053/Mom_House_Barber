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
        $data['TIME_SLOT'] = $this->BKM->getTimeSlot();
        $this->load->view('booking_view', $data);
    }
    function check_timebarber()
    {
        $check = $this->BKM->checkTimeBarber();
        if (count($check == 1)) {
            echo "<script language=\"JavaScript\">";
            echo "alert('การจองไม่สำเร็จช่วงเวลาที่คุณเลือกช่างตัดผมติดคิวลูกค้าอยู่ค่ะ !')";
            echo "</script>";
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('จองคิวสำเร็จ')";
            echo "</script>";
        }
    }

    function ins_Booking()
    {
        $day = $this->input->post('BK_Day');
        $month = $this->input->post('BK_Month');
        $time = $this->input->post('ST_ID');
        $barber = $this->input->post('B_ID');
        if ($this->input->post('btnBooking')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            $check = $this->BKM->checkTimeBarber($day, $month, $time, $barber);
            if ($check == 1) {
                echo "<script language=\"JavaScript\">";
                echo "alert('การจองไม่สำเร็จช่วงเวลาที่คุณเลือกช่างตัดผมติดคิวลูกค้าอยู่ค่ะ !')";
                echo "</script>";
                $this->load->view('customer_view');
                }else if($this->input->post('BK_Year') == 0 || $this->input->post('BK_Month') == 0 || $this->input->post('BK_Day') == 0){
                    echo "<script language=\"JavaScript\">";
                    echo "alert('กรุณาเลือก ช่างตัดผม หรือ  วัน/เดือน/ปี ให้ถูกต้องค่ะ !')";
                    echo "</script>";
                    $this->load->view('customer_view');
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
                $this->load->view('customer_view', $data);
                
            }
        }
    }
}
