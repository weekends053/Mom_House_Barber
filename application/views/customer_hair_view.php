<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom House Barber | index</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/index.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <title> </title>
    <style>
        .container-box {
            padding: 50px 175px;
        }

        .tr-hair-style {
            display: flex;
            justify-content: center;
            padding: 20px 3%;
        }

        .i-hair-style {
            width: 300px;
            padding: 10px;
        }

        .p-hair-style {
            line-height: 12pt;
            text-align: right;
        }

        .name-hair-style {
            font-size: 24px;
            font-weight: 600;
        }

        .detail1-hair-style,
        .detail2-hair-style,
        .detail3-hair-style {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?php include("header/customer_navbar.php"); ?>
    <?php include("banner/banner.php"); ?>
    <?php
    foreach ($HS->result_array() as $row) {
    ?>
        <div class="container-box">
            <tr>
                <td>
                    <div class="p-hair-style name-hair-style"><?= $row['H_Name'] ?></div>
                </td> <br />
                <td>
                    <div class="p-hair-style detail1-hair-style"><?= $row['H_Detail1'] ?></div>
                </td> <br />
                <td>
                    <div class="p-hair-style detail2-hair-style"><?= $row['H_Detail2'] ?></div>
                </td> <br />
                <td>
                    <div class="p-hair-style detail3-hair-style"><?= $row['H_Detail3'] ?></div>
                </td> <br />
                <div class="tr-hair-style">
                    <td><img class="i-hair-style" src="<?php echo base_url(); ?>img/<?= $row['H_Img1']; ?>"></td>
                    <td><img class="i-hair-style" src="<?php echo base_url(); ?>img/<?= $row['H_Img2']; ?>"></td>
                    <td><img class="i-hair-style" src="<?php echo base_url(); ?>img/<?= $row['H_Img3']; ?>"></td>
                    <td><img class="i-hair-style" src="<?php echo base_url(); ?>img/<?= $row['H_Img4']; ?>"></td>
                </div>
            </tr>
            <br /><br />
        </div>
    <?php
    }
    ?>
    <script src="script/headers.js"></script>
</body>

</html>