<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin Page</title>
	<!--using FontAwesome-->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body>
	<?php include("header/admin_navbar.php"); ?>
	<?php include("banner/all_banner.php"); ?>
	<center>
		<?php
		echo anchor('UserManagement_Con/admin_seecustomerall', 'ดูลูกค้าทั้งหมด') . br(2);
		echo anchor('UserManagement_Con/create_barber', 'เพิ่มช่างตัดผม') . br(2);
		echo anchor('UserManagement_Con/admin_seebarberall', 'จัดการช่าง') . br(2);
		echo anchor('UserManagement_Con/admin_seebookingqueueall', 'จัดการคิว') . br(2);
		echo anchor('Login_Con/logout', 'ออกจากระบบ');
		?>
	</center>
</body>

</html>