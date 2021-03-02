<html>

<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/editprofileMe.css">
  <!--using FontAwesome-->
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php include("header/customer_navbar.php"); ?>
  <?php include("banner/all_banner.php"); ?>


    <?php
        foreach($CUSTOMER as $row){

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
            
        </div>

          <div class="profile_info_center">
          <?php echo form_open('Customer_Con/save_profile');
                echo form_hidden('C_ID',set_value('C_ID',$row->C_ID));

           echo form_label('ชื่อ', 'C_Name').br(1);
                echo form_input('C_Name', set_value('C_Lname',$row->C_Name)).br(1);

           echo form_label('นามสกุล', 'C_Lname').br(1);
                echo form_input('C_Lname', set_value('C_Lname',$row->C_Lname)).br(1);
                 
           echo form_label('เพศ', 'C_Sex').br(1);
                echo form_input('C_Sex', set_value('C_Lname',$row->C_Sex)).br(1);
     
           echo form_label('เบอร์โทร', 'C_Phone').br(1);
                echo form_input('C_Phone', set_value('C_Phone',$row->C_Phone)).br(1);
 
           echo form_label('Facebook', 'C_Facebook').br(1);
                 echo form_input('C_Facebook', set_value('C_Facebook',$row->C_Facebook)).br(1);

         echo form_submit('btnSave', 'บันทึก');
           echo form_close();
        }
    ?> 
          </div>
      </div>
      </section>
      <?php include("footer/footer.php"); ?>
</body>

</html>