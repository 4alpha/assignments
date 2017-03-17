<!DOCTYPE html>
<html>
  <head>
    <title>DEPARTMENT OPERATION</title>
  </head>
  <body>
    <form method="POST">
      <h2>DEPARTMENT INFORMATION</h2>
      <center>
        <input type="submit" value="add" name="submit">
        <input type="submit" value="update" name="submit">
        <input type="submit" value="delete" name="submit">
        <input type="submit" value="getrow" name="submit">
        <!--<input type="hidden" name="control" value="Department_View.php">-->
        <br><br>
        Department No. :<input type="text" name="deptno"><br><br>
        Department Name :<input type="text" name="deptname"><br><br>
      </center>
    </form>
  </body>
</html>

<?php
$_POST['view'] = "DepartmentController"; 
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