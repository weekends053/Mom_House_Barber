<nav class="navbar">
  <div class="content">
    <div class="logo">
      <img class="header-logo" src="<?php echo base_url(); ?>/img/Logo.png">
      <a href="http://localhost/Mom_House_Barber/index.php/Login_Con/customer_page">Mom House Barber</a>
    </div>
    <ul class="menu-list">
      <div class="icon cancel-btn">
        <i class="fas fa-times"></i>
      </div>
      <li><a class="item" href="#">Booking</a></li>
      <li><a class="item" href="http://localhost/Mom_House_Barber/index.php/Customer_Con/customer_look_all_barber">Barber</a></li>
      <li><a class="item" href="http://localhost/Mom_House_Barber/index.php/Page_Con/customer_hair_page">HairStyle</a></li>
      <li><a class="item" href="#">My booking</a></li>
      <li>
        <p>|</p>
      </li>
      <li>

        <a class="item button username" href="http://localhost/Mom_House_Barber/index.php/Customer_Con/get_profile_customer">Hi ' <?php echo $this->session->userdata('Username'); ?></a>
      </li>
      <?php
      $classLogout1 = array('class' => 'item');
      $classLogout2 = array('class' => 'button');
      $classLogout3 = array('class' => 'logout');
      ?>
      <li><?php echo anchor('Login_Con/logout', 'Log out', $classLogout1, $classLogout2, $classLogout3); ?></li>
    </ul>
    <div class="icon menu-btn">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</nav>

<script>
  const body = document.querySelector("body");
  const navbar = document.querySelector(".navbar");
  const menu = document.querySelector(".menu-list");
  const menuBtn = document.querySelector(".menu-btn");
  const cancelBtn = document.querySelector(".cancel-btn");
  menuBtn.onclick = () => {
    menu.classList.add("active");
    menuBtn.classList.add("hide");
    cancelBtn.classList.add("show");
    body.classList.add("disabledScroll");
  }
  cancelBtn.onclick = () => {
    menu.classList.remove("active");
    menuBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    body.classList.remove("disabledScroll");
  }

  window.onscroll = () => {
    this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
  }
</script>