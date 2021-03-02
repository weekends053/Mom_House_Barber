<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Insert Barber</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  <!--using FontAwesome-->
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include("header.php"); ?>
  <?php include("banner.php"); ?>
  <center>
    <h1 class="regh1">เพิ่มช่างตัดผม</h1>
  </center>
  <center>
    <form method="post" action="../Total_Control/insert_Barber">
      <table class="data">
        <tr>
          <td>รหัสช่างตัดผม</td>
          <td><input name="B_ID" type="text" id="B_ID" size="30" maxlength="4" /></td>
        </tr>
        <tr>
          <td>ชื่อ-นามสกุล</td>
          <td><input name="B_Name" type="text" maxlength="50" /></td>
        </tr>
        <td>เบอร์โทรศัพท์</td>
        <td><label for="Tel"></label>
          <input name="B_Phone" type="text" maxlength="11" />
        </td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><label for=""></label><label for="textarea2"></label><textarea name="B_Address" maxlength="50" cols="45" rows="5"></textarea></td>
        </tr>
      </table>
      <br><br>
      <div class="reg_button">
        <a href="../Alumni/index">ย้อนกลับ</a>
        <input class="button" name="submit" type="submit" value="สมัครสมาชิก" />
      </div>
    </form>
  </center>
  <br>
</body>

</html>