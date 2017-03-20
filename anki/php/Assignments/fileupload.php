<html>
  <head>
    <title>
      SUPER GLOBAL VARIABLES
    </title>
  </head>
  <body>
    <form method="POST" action="fileupload.php" enctype="multipart/form-data">
      <label>FILE UPLOAD :</label>
      <input type="file" name="file"><br>
      <input type="submit" value="SUBMIT" name="submit">
    </form>
  </body>
</html>

<?php
  if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"]) . "<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("/home/developer/gitdemo/assignments/anki/php/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],"/home/developer/gitdemo/assignments/anki/php/" . $_FILES["file"]["name"]);
      echo "Saved as: " . "/home/developer/gitdemo/assignments/anki/php/" . $_FILES["file"]["name"];
    }
  }
?> 

  

