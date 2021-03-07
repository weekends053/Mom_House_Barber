<nav class="navbar">
  <div class="content">
    <div class="logo">
      <img class="header-logo" src="<?php echo base_url(); ?>/img/Logo.png">
      <a href="http://localhost/Mom_House_Barber/index.php/Login_Con/admin_page">Mom House Barber</a>
    </div>
    <ul class="menu-list">
      <div class="icon cancel-btn">
        <i class="fas fa-times"></i>
      </div>
      <li><a class="item" href="#">Booking</a></li>
      <li><a class="item" href="#">Customer</a></li>
      <li><a class="item" href="#">Barber</a></li>
      <li><a class="item" href="#">HairStyle</a></li>
      <li>
        <p>|</p>
      </li>
      <li>
        <a class="item button username" href="http://localhost/Mom_House_Barber/index.php/Customer_Con/show_profile">Hi ' <?php echo $this->session->userdata('Username'); ?></a>
      </li>
      <li><a class="item button logout" herf="#"><?php echo anchor('Login_Con/logout', 'Log out'); ?></a></li>
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