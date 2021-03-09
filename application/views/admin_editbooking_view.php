<html>

<head>
    <meta charset="utf-8">
    <title>Edit Barber</title>
    <!--using FontAwesome-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    foreach ($BOOKING as $row) {

    ?>

    <?php echo form_open('UserManagement_Con/save_booking');
         echo form_label('รหัสการจอง', 'BK_ID') . br(1);
         echo form_input(array('name'=>'BK_ID','value'=>$row->BK_ID,'class','readonly'=>'true')) . br(1);

        echo form_label('รหัสลูกค้า', 'C_ID') . br(1);
        echo form_input(array('name'=>'C_ID','value'=>$row->C_ID,'class','readonly'=>'true')) . br(1);

        echo form_label('รหัสช่างตัดผม', 'B_ID') . br(1);
        echo form_input(array('name'=>'B_ID','value'=>$row->B_ID,'class','readonly'=>'true')) . br(1);

        echo form_label('ปีที่จอง', 'BK_Year') . br(1);
        echo form_input('BK_Year', set_value('BK_Year', $row->BK_Year)) . br(1);

        echo form_label('เดือนที่จอง', 'BK_Month') . br(1);
        echo form_input('BK_Month', set_value('BK_Month', $row->BK_Month)) . br(1);

        echo form_label('วันที่จอง', 'BK_Day') . br(1);
        echo form_input('BK_Day', set_value('BK_Day', $row->BK_Day)) . br(1);

        echo form_label('รอบที่จอง', 'ST_ID') . br(1);
        echo form_input('ST_ID', set_value('ST_ID', $row->ST_ID)) . br(1);

        echo form_submit('btnSave', 'บันทึก');
        echo form_close();
    }
    ?>
</body>

</html>