<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom House Barber | Customer</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styleCust.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include("header/customer_navbar.php");
    include("banner/all_banner.php");
    include("customer_get_barber_profile.php");
    include("footer/footer.php");
    ?>

</body>

</html>