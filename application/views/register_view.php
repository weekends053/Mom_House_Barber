<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
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
	
	echo form_open('Customer_Con/insert_regis');
	//echo form_input('C_ID', set_value('C_ID')).'<br />';

	//echo form_hidden('C_ID',set_value('C_ID'));
	

	echo form_label('ชื่อ','C_Name'). '<br />';
	echo form_error('C_Name', '<font color=red>','</font><br />');
	echo form_input('C_Name', set_value('C_Name')).'<br />';

	echo form_label('นามสกุล','C_Lname'). '<br />';
	echo form_error('C_Lname', '<font color=red>','</font><br />');
	echo form_input('C_Lname', set_value('C_Lname')).'<br />';

	echo form_label('เพศ','C_Sex'). '<br />';
	echo form_error('C_Sex', '<font color=red>','</font><br />');
	echo form_radio('C_Sex', 'ชาย').'ชาย';
	echo form_radio('C_Sex', 'หญิง').'หญิง'.'<br />';

	echo form_label('เบอร์โทร','C_Phone'). '<br />';
	echo form_error('C_Phone', '<font color=red>','</font><br />');
	echo form_input('C_Phone', set_value('C_Phone')).'<br />';

	echo form_label('รหัสผู้ใช้','Username'). '<br />';
	echo form_error('Username', '<font color=red>','</font><br />');
	echo form_input('Username', set_value('Username')).'<br />';

	echo form_label('รหัสผ่าน','Password'). '<br />';
	echo form_error('Password', '<font color=red>','</font><br />');
	echo form_password('Password', set_value('Password')).'<br />';
	
	echo form_hidden('S_ID',set_value('S_ID','3'));
	echo form_submit('btnRegister','สมัครสมาชิก');
	echo form_close();
	
	?>
	<a class="register" href="../Page_Con/index">ยกเลิก</a>
</body>
</html>