<?php
$name=$_POST['name1'];
setcookie("cookiename",$name);
?>
<html>
  <body>
    <form method="post" action="my.php">
      <input type="text" name="hiii" >
      <input type="submit"  value="submit">
    </form>
  </body>
  </html>