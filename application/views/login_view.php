<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>กรุณาเข้าสู่ระบบ</title>
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
	echo form_open('Login_Con/check_login');
	echo form_label('รหัสผู้ใช้','Username'). '<br />';
	echo form_error('Username', '<font color=red>','</font><br />');
	echo form_input('Username', set_value('Username')).'<br />';

	echo form_label('รหัสผ่าน','Password'). '<br />';
	echo form_error('Password', '<font color=red>','</font><br />');
	echo form_password('Password', set_value('Password')).'<br />';
	echo form_submit('btnLogin','เข้าสู่ระบบ');
	echo form_close();
	?>
	<a class="register" href="../Login_Con/index">สมัครสมาชิก</a>
</body>
</html>
