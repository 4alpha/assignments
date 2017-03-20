<?php
$name=$_POST['name'];
$address=$_POST['addr'];
$contact=$_POST['cont'];

setcookie("cookiename",$name);
setcookie("cookieaddress",$address);
setcookie("cookiecontact",$contact);
?>

<html>
  <body>
    <form method="POST" action="superGlobal.php">
      <label>Add Company Details :</label>
      <br>
      Comany Name:<input type="text" name="compname"><br>
      Company Address :<input type="text" name="compaddr"><br>
      <input type="submit" value="Display">
    </form>
  </body>
</html>