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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_navs.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <nav class="navbar">
    <div class="content">
      <div class="logo">
        <img class="header-logo" src="<?php echo base_url(); ?>/img/Logo.png">
        <a href="/Mom_House_Barber">Mom House Barber</a>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a class="item" href="http://localhost/Mom_House_Barber/index.php/Calendar_Con/calendar">Calendar</a></li>
        <li><a class="item" href="http://localhost/Mom_House_Barber/index.php/Page_Con/hair_page">HairStyle</a></li>
        <li><a class="item button login" id="button" href="#">Log in</a></li>
        <li><a class="item button regis" id="button-reg" href="#">Sign Up</a></li>
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <div class="popup">
    <div class="popup-content">
      <img class="close" src="<?php echo base_url(); ?>img/error.png" alt="close">
      <div class="popup-left">
        <img class="popup-left-logo" src="<?php echo base_url(); ?>/img/Logo.png">
        <h1>Mom_House_Barber</h1>
      </div>
      <div class="wrapper">
        <div class="in-wrapper">
          <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
          </div>
          <div class="form-container">
            <div class="slide-controls">
              <input class="radio-slide" type="radio" name="slide" id="login" checked>
              <input class="radio-slide" type="radio" name="slide" id="signup">
              <label for="login" class="slide login">Login</label>
              <label for="signup" class="slide signup" id="label-signup">Signup</label>
              <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
              <form action="http://localhost/Mom_House_Barber/index.php/Login_Con/check_login" class="login" method="post">
                <div class="field">
                  <input type="text" name="Username" placeholder="Username" required>
                </div>
                <div class="field">
                  <input type="password" name="Password" placeholder="Password" required>
                </div>
                <div class="pass-link"><a href="#">
                    <!-- Forgot password? -->
                  </a></div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" name="btnLogin" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="">Signup now</a></div>
              </form>
              <form action="http://localhost/Mom_House_Barber/index.php/Customer_Con/insert_regis" class="signup" method="post">
                <div class="field">
                  <input type="text" name="C_Name" placeholder="First name" required>
                </div>
                <div class="field">
                  <input type="text" name="C_Lname" placeholder="Last name" required>
                </div>
                <div class="raido-sex-button">
                  <div class="sex-radio-container">
                    <label class="input-sex" for="Sex">Sex :</label>
                    <input class="radio-sex" type="radio" name="C_Sex" value="ชาย" id="option-1" checked>
                    <input class="radio-sex" type="radio" name="C_Sex" value="หญิง" id="option-2">
                    <label for="option-1" class="option option-1">
                      <div class="sex-dot"></div>
                      <span>Male</span>
                    </label>
                    <label for="option-2" class="option option-2">
                      <div class="sex-dot"></div>
                      <span>Female</span>
                    </label>
                  </div>
                </div>
                <div class="field">
                  <input type="text" name="C_Phone" placeholder="Phone" required>
                </div>
                <div class="field">
                  <input type="text" name="Username" placeholder="Username (At least 6)" required>
                </div>
                <div class="field">
                  <input type="password" name="Password" placeholder="Password" required>
                </div>
                <div class="field s_id">
                  <input type="text" name="S_ID" value="3" required>
                </div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" name="btnRegister" value="Signup">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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

  <script>
    document.getElementById("button").addEventListener("click", function() {
      document.querySelector(".popup").style.display = "flex";
    })

    document.querySelector(".close").addEventListener("click", function() {
      document.querySelector(".popup").style.display = "none"
    })


    document.getElementById("button-reg").addEventListener("click", function() {
      document.querySelector(".popup").style.display = "flex";
      time = 0;
      interval = setInterval(function() {
        time--;
        document.getElementById('label-signup').innerHTML = "" + "" + " Signup"
        if (time == -1) {
          // stop timer
          clearInterval(interval);
          // click
          document.getElementById("label-signup").click();
        }
      }, 50)
      
    })
  </script>
  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
      signupBtn.click();
      return false;
    });
  </script>

</body>

</html>