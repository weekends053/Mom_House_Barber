<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!--using FontAwesome-->
<!-- <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script> -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <link rel = "stylesheet" type = "text/css" 
     href = "<?php //echo base_url(); 
              ?>css/headers.css">
              </head>
              <body>
                
                <nav>
                  <ul class="menu">
                    <li class="logo"><a href="/Test">Mom House Barber</a></li>
                    <li class="item"><a href="index.php/Calendar_Con/calendar">Calendar</a></li>
                    <li class="item"><a href="#">HairStyle</a></li>
                    
                    <li class="item button"><a href="index.php/Login_Con/login">Log in</a></li>
                    <li class="item button secondary"><a href="#">Sign Up</a></li>
                    <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
                  </ul>
                </nav>
              
              
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="scrict/header.js"></script>
              </body>
              </html> -->

<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!--using FontAwesome-->
  <!-- <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/all_navbar.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
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
        <li><a class="item" href="http://localhost/Mom_House_Barber/index.php/Customer_Con/show_barber">Barber</a></li>
        <li><a class="item" href="http://localhost/Mom_House_Barber/index.php/Page_Con/customer_hair_page">HairStyle</a></li>
        <li><a class="item" href="#">My booking</a></li>
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
</body>

</html>