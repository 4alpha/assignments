<!DOCTYPE html>
<html>
  <head>
    <title> FileUpload </title>
  </head>
  <body>
    <form action = "uploadfile.php" method = "POST" enctype = "multipart/form-data">
      Upload your file : 
      <input type = "file" name = "file" id = "file">
      <input type = "submit" >
    </form>
  </body>
</html>

<?php

  $file = $_FILES['file'];
        // print 'File Name: ' . $_FILES['fileName']['name']."<br>";
        // print 'File Type: ' . $_FILES['fileName']['type']."<br>";
        // print 'File Size: ' . $_FILES['fileName']['size']."<br>";
  
  $name = $file['name'];
  $path = "/home/developer/git/assignments/saurabh/php/" . basename($name);
  if(move_uploaded_file($file['tmp_name'],$path)) {
    echo 'file upload successfull';
  } else {
    echo 'unsuccessfull';
  }
  echo $_SERVER['PHP_SELF'];
  echo "<br>";
  echo $_SERVER['SERVER_NAME'];
  echo "<br>";
  echo $_SERVER['HTTP_HOST'];
  echo "<br>";
  echo $_SERVER['HTTP_REFERER'];
  echo "<br>";
  echo $_SERVER['HTTP_USER_AGENT'];
  echo "<br>";
  echo $_SERVER['SCRIPT_NAME'];
  setcookie("user","saurabh",time()+60);
  if(isset($_POST['submit'])) {
    display();
  }
  function display() {
    echo 'hello';
  }

?>