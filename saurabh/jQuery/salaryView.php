<!DOCTYPE html>
<html>
  <head>
    <title> salary </title>
  </head>
  <body style="text-align: center">
    <form method="POST">
      <input type="hidden" name="filename" value="Salary_view.php">
      Enter emp_no :
      <input type="number" name="emp_no"><br><br>
      Enter Basic Salary : 
      <input type="text" name="basic"><br><br>
      Enter DA : 
      <input type="text" name="da"><br><BR>
      Enter MA :
      <input type="text" name="ma"><BR><BR>
      Enter OT :
      <input type="text" name="ot"><BR><BR>
      Enter HRA :
      <input type="text" name="hra"><BR><BR>
      Enter CA :
      <input type="text" name="ca"><BR><BR>
      <input type="submit" name="getRow" value="getRows()"/>
      <input type="submit" name="addRow" value="addRow()"/>
      <input type="submit" name="updateRow" value="updateRow()"/>
      <input type="submit" name="deleteRow" value="deleteRow()"/>
      <br><br>
    </form>
  </body>
</html>

<?php
  include_once 'Controller.php';
    
  if(isset($_POST['getRow'])) {
    echo $result;
  }
  
  if(isset($_POST['addRow'])) {
    echo $result;
  }
  
  if(isset($_POST['updateRow'])) {
    echo $result;
  }
  
  if(isset($_POST['deleteRow'])) {
    echo $result;
  }
?>