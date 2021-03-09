<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Barber Page</title>
	<!--using FontAwesome-->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body>
	<?php include("header/barber_navbar.php"); ?>
	<?php include("banner/b_banner.php"); ?>
	<center>
		<?php
		echo br(1).'ยินดีต้อนรับเข้าสู่ระบบ,' . $this->session->userdata('Username').br(2);
		echo anchor('Barber_Con/show_profilebarber', 'ดูโปรไฟล์') . br(2);
		echo '<br />' . anchor('Login_Con/logout', 'ออกจากระบบ');
		?>
	</center>
</body>

</html>