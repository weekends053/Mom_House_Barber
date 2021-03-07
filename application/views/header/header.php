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

      <div class="close">
        <i class="fas fa-times"></i>
      </div>
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
                <div class="field C_Name Display-non">
                  <input type="text" name="C_Name" value="ไม่มีข้อมูล" placeholder="First name" required>
                </div>
                <div class="field C_Lname Display-non">
                  <input type="text" name="C_Lname" value="ไม่มีข้อมูล" placeholder="Last name" required>
                </div>
                <div class="field C_Nickname">
                  <input type="text" name="C_Nickname" placeholder="Nickname" required>
                </div>
                <div class="raido-sex-button C_Sex Display-non">
                  <div class="sex-radio-container">
                    <label class="input-sex" for="Sex">Sex :</label>
                    <input class="radio-sex" type="radio" name="C_Sex" value="ไม่มีข้อมูล" id="option-1" checked>
                    <input class="radio-sex" type="radio" name="C_Sex" value="ชาย" id="option-2">
                    <input class="radio-sex" type="radio" name="C_Sex" value="หญิง" id="option-3">
                    <input class="radio-sex" type="radio" name="C_Sex" value="ไม่ต้องการระบุ" id="option-4">
                    <label for="option-1" class="option option-1">
                      <div class="sex-dot"></div>
                      <span>No data</span>
                    </label>
                    <label for="option-2" class="option option-2">
                      <div class="sex-dot"></div>
                      <span>Male</span>
                    </label>
                    <label for="option-3" class="option option-3">
                      <div class="sex-dot"></div>
                      <span>Female</span>
                    </label>
                    <label for="option-4" class="option option-4">
                      <div class="sex-dot"></div>
                      <span>Don't want to specify</span>
                    </label>
                  </div>
                </div>
                <div class="field C_Phone">
                  <input type="text" name="C_Phone" placeholder="Phone" required>
                </div>
                <div class="field C_Facebook Display-non">
                  <input type="text" name="C_Facebook" value="ไม่มีข้อมูล" placeholder="Facebook" required>
                </div>
                <div class="field C_Img Display-non">
                  <input type="text" name="C_Img" value="img_user_placeholder.jpg" placeholder="CusImg" required>
                </div>
                <div class="field">
                  <input type="text" name="Username" placeholder="Username (At least 6)" required>
                </div>
                <div class="field">
                  <input type="password" name="Password" placeholder="Password" required>
                </div>
                <div class="field s_id Display-non">
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