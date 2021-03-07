<?php
foreach ($CUSTOMER as $row) {
?>
  <section class="profile_arrea">
    <div class="container-profile">
      <div class="profile">
        <div class="profile_image">
          <img class="profile_image_img" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
        </div>
        <div class="profile_info">
          <div class="profile_info_top">
            <h1 class="profile_info_top-h1"><?php echo $row->Username . br(1); ?></h1>
          </div>
          <div class="profile_info_center">
          <?php
          echo form_open('Customer_Con/save_profile');
          echo form_hidden('C_ID', set_value('C_ID', $row->C_ID));

          echo form_label('ชื่อเล่น', 'C_Nickname') . br(1);
          echo form_input('C_Nickname', set_value('C_Nickname', $row->C_Nickname)) . br(1);

          echo form_label('ชื่อจริง', 'C_Name') . br(1);
          echo form_input('C_Name', set_value('C_Name', $row->C_Name)) . br(1);

          echo form_label('นามสกุล', 'C_Lname') . br(1);
          echo form_input('C_Lname', set_value('C_Lname', $row->C_Lname)) . br(1);

          echo form_label('เพศ', 'C_Sex') . br(1);
          echo form_input('C_Sex', set_value('C_Sex', $row->C_Sex)) . br(1);

          echo form_label('เบอร์โทร', 'C_Phone') . br(1);
          echo form_input('C_Phone', set_value('C_Phone', $row->C_Phone)) . br(1);

          echo form_label('Facebook', 'C_Facebook') . br(1);
          echo form_input('C_Facebook', set_value('C_Facebook', $row->C_Facebook)) . br(1);

          echo form_submit('btnSave', 'บันทึก');
          echo form_close();
        }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>