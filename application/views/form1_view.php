<html>

<head>
    <title>Upload</title>
</head>

<body>
    <?php
    echo isset($error) ? $error : '';
    echo form_open_multipart('Upload/up_multifile');
    echo form_upload('userfile0') . '<br />';
    echo form_upload('userfile1') . '<br />';
    echo form_upload('userfile2');
    echo form_submit("submit", "อัปโหลด!");
    echo form_close();
    ?>
</body>

</html>