<div class="banner" style="background: url(<?php echo base_url(); ?>img/bgBarber.png) ; background-size: cover; background-position: center; ">
    <div class="banner-container">
        <img class="banner-container-logo" src="<?php echo base_url(); ?>/img/Logo.png">
        <div class="banner-left">
            <p class="banner-text">เห้ยย! อยากตัดผมว่ะ!</p>
            <a class="banner-link" href="#" id="banner-link">ก็จองดิวะ!</a>
        </div>
        <div class="banner-right">
            <img class="banner-logo" src="<?php echo base_url(); ?>/img/Logo.png">
        </div>
    </div>
</div>

<script>
    document.getElementById("banner-link").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";
    })
</script>