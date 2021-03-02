<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom House Barber | index</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/index1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include("header/header.php"); ?>
    <?php include("banner/banner.php"); ?>
    <!-- <br><br>
  <center>
    <h1>ปฏิทินคิวของร้าน</h1>
    <br><br>
  <?php
    //echo $minicalendar;
    ?>
  <br><br>
  <a class="booking-link" href="index.php/Login_Con/login">จองเลย!</a>
  </center>
  <br><br> -->
    <?php include("non_cus_hair_style.php"); ?>
    <?php include("footer/footer.php"); ?>
</body>

</html>