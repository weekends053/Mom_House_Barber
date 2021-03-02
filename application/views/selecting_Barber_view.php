<html>

<head>
    <title> </title>

</head>

<body>
    <?php
    foreach ($Barber as $row) {
    ?>
        <tr>
            <td><?php echo $row->B_Name;?></td>
            <td><?php echo $row->B_Lname;?></td>
            <td><?php echo $row->B_Nickname;?></td>
            <td><?php echo anchor('Customer_Con/detail_profilebarber/'.$row->B_ID,'โปรไฟล์').br(1);?></td>
        </tr>
    <?php
    }
    ?>
</body>

</html>