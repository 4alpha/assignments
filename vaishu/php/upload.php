
<?php
$_FILES['upload'];
      
      $file_name = $_FILES['upload']['name'];
      $file_size = $_FILES['upload']['size'];
      $file_type = $_FILES['upload']['type'];
      echo $_FILES['upload']['name']."<br>"; 
      echo $_FILES['upload']['size']."<br>";
      echo $_FILES['upload']['type']."<br>";
      
      if(move_uploaded_file($_FILES['upload']['tmp_name'], '/home/developer/code/assignments/vaishu/php/'
      . $_FILES['upload']['name']))
      {
            echo"sucess";
      }
      
?>













