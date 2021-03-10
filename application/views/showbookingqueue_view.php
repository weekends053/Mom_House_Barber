<html>

<head>
    <title></title>

</head>

<body>
<table style="width:100%" border="1">
        <tr>
        <th>ชื่อเล่น</th>
        <th>เบอร์โทร</th>
        <th>วันที่</th>
        <th>เดือน</th>
        <th>ปี</th>
        <th>รอบ</th>
        </tr>
    <?php
    foreach ($BOOKING as $row) {
       
    ?>
        <tr>
            <td><?php echo $row->C_Nickname;?></td>
            <td><?php echo $row->C_Phone;?></td>
            <td><?php echo $row->BK_Day?></td>
            <td><?php echo $row->BK_Month;?></td>
            <td><?php echo $row->BK_Year;?></td>
            <td><?php echo $row->ST_Time;?></td>
            <td><?php echo anchor('Customer_Con/del_booking/'.$row->BK_ID,'ยกเลิกคิวที่จอง',array('onclick' => "return confirm('คุณต้องการยกเลิกคิวที่จองใช่หรือไม่ ?')")).br(1);?></td>
        </tr>
    <?php
    }
    ?>
</body>

</html>