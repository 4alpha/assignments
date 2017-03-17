<!DOCTYPE html>
<html>
  <head>
    <title>EMPLOYEE OPERATION</title>
  </head>
  <body>
    <form method="POST">
      <h2>EMPLOYEE INFORMATION</h2>
      <center>
        <input type="submit" value="add" name="submit">
        <input type="submit" value="update" name="submit">
        <input type="submit" value="delete" name="submit">
        <input type="submit" value="getrow" name="submit">
        <br><br>
        Employee No. :<input type="text" name="empno"><br><br>
        Employee FirstName :<input type="text" name="fname"><br><br>
        Employee LastName :<input type="text" name="lname"><br><br>
        Employee BirthDate :<input type="date" name="bdate"><br><br>
        Emlpoyee Gender :<input type="text" name="gender"><br><br>
        Employee Hiredate :<input type="text" name="hiredate"><br><br>
      </center>
    </form>
  </body>
</html>
<?php
$_POST['view'] = "EmployeeController"; 
require_once 'Config.php';
require 'controller.php';
function __autoload($classesExceptions) {
  $classesExceptions = str_replace("\\", "/", $classesExceptions. ".php");
  include_once $classesExceptions;
}

if($_POST['submit'] == 'add') {
  print_r($result);
}

if($_POST['submit'] == 'update') {
  print_r($result);
}

if($_POST['submit'] == 'delete') {
  print_r($result);
}
 
if($_POST['submit'] == 'getrow') {
  print_r($result);
}

?>