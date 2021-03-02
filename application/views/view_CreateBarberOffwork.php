<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Create Barber Offwork</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  <!--using FontAwesome-->
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(function() {
      $('#B_ID').change(function() {
        alert('เลือก' + this.value);
      });
    });
  </script>
</head>

<body>
  <?php include("header.php"); ?>
  <?php include("banner.php"); ?>

  <center>
    <h1 class="regh1">วันลาหยุด</h1>
  </center>
  <center>
    <form method="post" action="../Total_Control/ChangeValue">
      <table class="data">
        <tr>
          <td>รหัสช่างตัดผม</td>
          <td><select name="B_ID" id="B_ID">
              <?php foreach ($DOW->result() as $row) { ?>
                <option value="<?php echo $row->B_ID ?>"><?php echo $row->B_ID ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <?php foreach ($DOW->result() as $row) { ?>
          <input class="input" type="text" name="OW_ID" value="<?php echo $row->OW_ID ?>" <?php } ?> <tr>
          <td>ชื่อ</td>
          <td> <input class="input" type="text" name="B_Name" value="<?php echo $row->B_Name ?>" </td>
            </tr>

            <tr>
              <td>นามสกุล</td>
              <td> <input class="input" type="text" name="B_Lname" value="<?php echo $row->B_Lname ?>" </td>
            </tr>
            <tr>
              <td>ตั้งแต่วันที่</td>
              <td></label><input type="date" name="starting_Date" /></td>
            </tr>
          <td>ถึงวันที่</td>
          <td></label><input type="date" name="ending_Date" /></td>
          </tr>
      </table>
      <br><br>
      <div class="reg_button">
        <a href="../Alumni/index">ย้อนกลับ</a>
        <input class="button" name="submit" type="submit" value="บันทึก" />
      </div>
    </form>
  </center>
  <br>
</body>

</html>