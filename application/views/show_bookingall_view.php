<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<table style="width:100%" border="1">
        <tr>
        <th>รหัสการจอง</th>
        <th>รหัสลูกค้า</th>
        <th>รหัสช่าง</th>
        <th>ปี</th>
        <th>เดือน</th>
        <th>วัน</th>
        <th>รอบ</th>
        </tr>
<?php
    foreach($BOOKING as $row){  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
?>
        <tr>
        <td><?php echo $row -> BK_ID;?></td>
        <td><?php echo $row -> C_ID;?></td>
        <td><?php echo $row -> B_ID;?></td>
        <td><?php echo $row -> BK_Year;?></td>
        <td><?php echo $row -> BK_Month;?></td>
        <td><?php echo $row -> BK_Day;?></td>
        <td><?php echo $row -> ST_ID;?></td>
        <td><?php echo anchor('UserManagement_Con/admin_editqueue/'.$row->BK_ID,'Edit',array('onclick' => "return confirm('คุณต้องการแก้ไขข้อมูลช่างหรือไม่ ?')")).br(1);?></td>
        <td><?php echo anchor('UserManagement_Con/del_barber/'.$row->BK_ID,'Delete',array('onclick' => "return confirm('คุณต้องการลบช่างคนนี้หรือไม่ ?')")).br(1);?></td>        
        <br/>
        </tr>

<?php
    }
?>

