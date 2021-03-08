<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<table style="width:100%" border="1">
        <tr>
        <th>รหัสช่างตัดผม</th>
        <th>ชื่อ</th>
        <th>ชื่อเล่น</th>
        <th>เพศ</th>
        <th>เบอร์โทร</th>
        <th>ที่อยู่</th>
        </tr>
<?php
    foreach($BARBER as $row){  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
?>
        <tr>
        <td><?php echo $row -> B_ID;?></td>
        <td><?php echo $row -> B_Name;?></td>
        <td><?php echo $row -> B_Nickname;?></td>
        <td><?php echo $row -> B_Sex;?></td>
        <td><?php echo $row -> B_Phone;?></td>
        <td><?php echo $row -> B_Address;?></td>
        <td><?php echo anchor('UserManagement_Con/admin_editbarber/'.$row->B_ID,'Edit',array('onclick' => "return confirm('คุณต้องการแก้ไขข้อมูลช่างหรือไม่ ?')")).br(1);?></td>
        <td><?php echo anchor('UserManagement_Con/del_barber/'.$row->B_ID,'Delete',array('onclick' => "return confirm('คุณต้องการลบช่างคนนี้หรือไม่ ?')")).br(1);?></td>        
        <br/>
        </tr>

<?php
    }
?>
