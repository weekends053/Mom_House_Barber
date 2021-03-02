<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/profileMes.css">
  <!--using FontAwesome-->
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php include("header/customer_navbar.php"); ?>
  <?php include("banner/all_banner.php"); ?>

  <?php
  foreach ($CUSTOMER as $row) {
  ?>

  <section class="profile_arrea">
    <div class="container">
      <div class="profile">
        <div class="profile_image">
          <img class="profile_image_img" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
        </div>

        
        <div class="profile_info">
          <div class="profile_info_top">
            <h1 class="profile_info_top-h1"><?php echo $row->C_Name . br(1); ?></h1>
            <?php echo anchor('Customer_Con/edit_profile', 'แก้ไขข่อมูลส่วนตัว', 'class="edit"') . br(1); ?>
            <a href="#" class="gear"><i class="fas fa-cogs"></i></a>
        </div>

          <div class="profile_info_center">
            <div><font size=3>ชื่อ-นามสกุล :</font><?php echo $row->C_Name . br(0); ?> <?php echo $row->C_Lname . br(1); ?> </div>
            <div><font size=3>เพศ :</font><?php echo $row->C_Sex . br(1); ?></div>
            <div><font size=3>เบอร์โทร :</font><?php echo $row->C_Phone . br(1); ?></div>
            <div><font size=3>Facebook :</font><?php echo $row->C_Facebook . br(1); ?></div>
          </div>
        <div class="profile_info_bottom">
          <?php echo anchor('Customer_Con/edit_profile', 'Facebook', 'class="edit_button"') . br(1); ?>

        </div>

      <?php
  }
      ?>
      </div>
      </section>

      <section class="tabs-area">
        <div class="container">

            <div class="tabs">
                <div class="tab-item"><i class="fas fa-th"></i><strong>รูป</strong></div>
                <div class="tab-item active"><i class="fas fa-bookmark"></i><strong>การจองของฉัน</strong></div>
                
            </div>
         </div>
         <div id="tb_2" class="tabs-content-item tb_2">
                    <i class="fal fa-tv"></i>
                    <p>ประวัติการจองของฉัน</p>
                    <a href="#" class="tb_2btn">เริ่มจอง</a>
                </div>
      </section> 

      <?php include("footer/footer.php"); ?>

</body>

</html>