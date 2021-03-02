<html>
<head>
        <title>Upload</title>
</head>
<body>
<?php
    echo isset($error) ? $error : '';
    echo form_open_multipart('Upload/do_upload');
    echo form_upload('userfile');
    echo form_submit("submit", "อัปโหลด!");
    echo form_close();
?>
</body>
</html>