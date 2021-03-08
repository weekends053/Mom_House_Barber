<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Customer All Data</title>
	<!--using FontAwesome-->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	
</head>
<body>
<table style="width:100%" border="1">
        <tr>
        <th>รหัสลูกค้า</th>
        <th>ชื่อผู้ใช้</th>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>ชื่อเล่น</th>
        <th>เพศ</th>
        <th>เบอร์โทร</th>
        <th>Facebook</th>
        </tr>
<?php
    foreach($CUSTOMER as $row){  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
?>
        <tr>
        <td><?php echo $row -> C_ID;?></td>
        <td><?php echo $row -> Username;?></td>
        <td><?php echo $row -> C_Name;?></td>
        <td><?php echo $row -> C_Lname;?></td>
        <td><?php echo $row -> C_Nickname;?></td>
        <td><?php echo $row -> C_Sex;?></td>
        <td><?php echo $row -> C_Phone;?></td>
        <td><?php echo $row -> C_Facebook;?></td>     
        <br/>
        </tr>

<?php
    }
?>
</body>
</html>