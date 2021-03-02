<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Customer Page</title>
	<!--using FontAwesome-->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body>
	<?php include("header/customer_navbar.php"); ?>
	<?php include("banner/banner.php"); ?>
	<center>
		<?php
		echo anchor('Customer_Con/show_barber', 'ดูโปรไฟล์ช่าง') . br(2);
		echo anchor('Customer_Con/show_profile', 'ดูโปรไฟล์') . br(2);
		echo anchor('Login_Con/logout', 'ออกจากระบบ');
		?>
	</center>
</body>

</html>