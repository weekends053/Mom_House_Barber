<body>
<h1>Profile Barber</h1>
<?php
foreach($BARBER as $row){

?>
    <?php echo $row->B_Name . br(1); ?>
    <?php echo $row->B_Lname . br(1); ?>
    <?php echo $row->B_Nickname . br(1); ?>
    <?php echo $row->B_Sex . br(1); ?>
    <?php echo $row->B_Phone . br(1); ?>
    <?php echo $row->B_Address . br(1); ?>
    <?php echo $row->B_Skill . br(1); ?>
    <?php echo $row->B_Percent . br(1); ?>
    <?php echo $row->B_Salary . br(1); ?>
    <?php echo $row->B_Total . br(1); ?>
    <?php echo $row->B_Img . br(1); ?>
<?php } ?>
</body>