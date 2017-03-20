<!DOCTYPE html>
<html>
  <head>
    <title> ClassDemo </title>
  </head>
  <body style = "text-align: center">
    <h3> Handling database using class </h3>
    <form method = "POST">
      <input type="hidden" name="filename" value="Employee_view.php">
      emp no :
      <input type = 'number' name = 'emp_no' ><br><br>
      first name :
      <input type = 'text' name = 'firstName'><br><br>
      last name :
      <input type = 'text' name = 'lastName'><br><br>
      hire date :
      <input type = 'date' name = 'hireDate'><br><br>
      <input type = "submit" name = "getRow" value = "getRows()" />
      <input type = "submit" name = "addRow" value = "addRow()" />
      <input type = "submit" name = "updateRow" value = "updateRow()" />
      <input type = "submit" name = "deleteRow" value="deleteRow()" />
      <br> <br>
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