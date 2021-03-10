<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Booking Queue</title>
	<!--using FontAwesome-->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body>

	<?php
	if($this->session->flashdata('msg_error'))
	{
		echo '<p><font color=red>';
		echo $this->session->flashdata('msg_error');
		echo '</font></p>';
	}
	echo form_open('Booking_Con/ins_Booking');
	foreach ($CUSTOMER as $row) {
		echo form_hidden('C_ID', set_value('C_ID', $row->C_ID));
	}

	echo form_label('ปี', 'BK_Year') . nbs(2);
	echo form_error('BK_Year','<span style="color:red;float:none;">','</span>');
	echo form_dropdown('BK_Year', $YEAR, set_value('BK_Year')) . br(2);

	echo form_label('เดือน', 'BK_Month') . nbs(2);
	echo form_dropdown('BK_Month', $MONTH, set_value('BK_Month')) . br(2);

	echo form_label('วัน', 'BK_Day') . nbs(2);
	echo form_dropdown('BK_Day', $DAY, set_value('BK_Day')) . br(2);

	echo form_label('เลือกช่วงเวลา', 'ST_ID') . nbs(2);
	echo form_dropdown('ST_ID', $TIME_SLOT, set_value('ST_ID')) . br(2);

	echo form_label('เลือกช่างตัดผม', 'B_ID') . nbs(2);
	echo form_dropdown('B_ID', $BARBER, set_value('B_ID')) . br(2);

	echo form_submit('btnBooking', 'จองคิว');
	echo form_close();

	?>
	<a class="register" href="../Page_Con/index">ยกเลิก</a>
</body>

</html>