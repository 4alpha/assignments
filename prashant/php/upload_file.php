<?php
    $uploaddir = '/home/developer/Internship/assignments/prashant/php/';
    $uploadfile = $uploaddir . basename($_FILES['file_upload']['name']);
   /* if(is_uploaded_file($_FILES['file_upload']['tmp_name'])) {
        echo 'file uploaded successfully...';
    } else {
        echo 'file Not uploaded...';
    }*/

    if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }
    echo '<br>Here is some more debugging info:';
    print "<pre>";
    print_r($_FILES);
    print "</pre>";
?>