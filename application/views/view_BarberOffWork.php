<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Barber Off Work</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/showtable.css">
    <!--using FontAwesome-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("banner.php"); ?>
    <center>
        <h1>Barber Off Work</h1>
        <table width="100%" border="1">
            <tr>
                <td>รหัสช่างตัดผม</td>
                <td>ชื่อ</td>
                <td>นามสกุล</td>
                <td>ตั้งแต่วันที่</td>
                <td>ถึงวันที่</td>
            </tr>
            <?php
            foreach ($DOW as $row) {
            ?>
                <tr>
                    <td colspan="1"><?= $row->B_ID; ?></td>
                    <td colspan="1"><?= $row->B_Name; ?></td>
                    <td colspan="1"><?= $row->B_Lname; ?></td>
                    <td colspan="1"><?= $row->starting_Date; ?></td>
                    <td colspan="1"><?= $row->ending_Date; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="container">
            <div class="box">
                <a class="search" href="../Total_Control/"></a>
            </div>
    </center>
</body>

</html>