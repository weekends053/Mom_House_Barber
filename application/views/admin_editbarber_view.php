<html>

<head>
    <meta charset="utf-8">
    <title>Edit Barber</title>
    <!--using FontAwesome-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    foreach ($BARBER as $row) {

    ?>

    <?php echo form_open('UserManagement_Con/save_barber');
        echo form_hidden('B_ID', set_value('B_ID', $row->B_ID));

        echo form_label('ชื่อ', 'B_Name') . br(1);
        echo form_input('B_Name', set_value('B_Lname', $row->B_Name)) . br(1);

        echo form_label('นามสกุล', 'B_Lname') . br(1);
        echo form_input('B_Lname', set_value('B_Lname', $row->B_Lname)) . br(1);

        echo form_label('เพศ', 'B_Sex') . br(1);
        echo form_input('B_Sex', set_value('B_Lname', $row->B_Sex)) . br(1);

        echo form_label('เบอร์โทร', 'B_Phone') . br(1);
        echo form_input('B_Phone', set_value('B_Phone', $row->B_Phone)) . br(1);

        echo form_label('ที่อยู่', 'B_Address') . br(1);
        echo form_input('B_Address', set_value('B_Address', $row->B_Address)) . br(1);

        echo form_submit('btnSave', 'บันทึก');
        echo form_close();
    }
    ?>
</body>

</html>