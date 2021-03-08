<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>เพิ่มช่างตัดผม</title>
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
	
	echo form_open('UserManagement_Con/insert_barber');
	//echo form_input('C_ID', set_value('C_ID')).'<br />';

	//echo form_hidden('C_ID',set_value('C_ID'));
	

	echo form_label('ชื่อ','B_Name'). '<br />';
	echo form_error('B_Name', '<font color=red>','</font><br />');
	echo form_input('B_Name', set_value('B_Name')).'<br />';

	echo form_label('นามสกุล','B_Lname'). '<br />';
	echo form_error('B_Lname', '<font color=red>','</font><br />');
	echo form_input('B_Lname', set_value('B_Lname')).'<br />';

    echo form_label('ชื่อเล่น','B_Nickname'). '<br />';
	echo form_error('B_Nickname', '<font color=red>','</font><br />');
	echo form_input('B_Nickname', set_value('B_Nickname')).'<br />';

	echo form_label('เพศ','B_Sex'). '<br />';
	echo form_error('B_Sex', '<font color=red>','</font><br />');
	echo form_radio('B_Sex', 'ชาย').'ชาย';
	echo form_radio('B_Sex', 'หญิง').'หญิง'.'<br />';

	echo form_label('เบอร์โทร','B_Phone'). '<br />';
	echo form_error('B_Phone', '<font color=red>','</font><br />');
	echo form_input('B_Phone', set_value('B_Phone')).'<br />';
    
	echo form_label('ที่อยู่','B_Address'). '<br />';
	echo form_error('B_Address', '<font color=red>','</font><br />');
	echo form_input('B_Address', set_value('B_Address')).'<br />';
	
	echo form_submit('btnRegister','เพิ่มช่าง');
	echo form_close();
	
	?>
	<a class="register" href="../Page_Con/index">ยกเลิก</a>
</body>
</html>