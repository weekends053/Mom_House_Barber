<html>

<head>
    <title></title>

</head>

<body>
<table style="width:100%" border="1">
        <tr>
        <th>เวลาที่ว่าง</th>
        
        </tr>
    <?php
    foreach ($TIMESLOT as $row) {
       
    ?>
        <tr>
            <td><?php echo $row->ST_Time;?></td>   
        </tr>
    <?php
    }
    ?>
</body>

</html>