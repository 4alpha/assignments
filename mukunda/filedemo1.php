<!DOCTYPE html>
<html>
    <body>

<form action="filedemo1.php" method="POST" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload">
    <input type="submit" value="submit" name="submit">
</form>

</body>
</html>


<?php
 
$target_dir = "/home/developer/code/assignments/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

if(isset($_POST["submit"])) {
                   
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                               echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                      } else {
                      echo "Sorry, there was an error uploading your file.";
                    }
     
}
?>

