<?php
use Controller\EmployeeController as EmployeeController;
use Controller\DepartmentController as DepartmentController;
error_reporting(E_ALL);
ini_set('display_errors',1);  

$fileName = $_POST['view'];
$controller = "Controller\\" . $fileName;
$obj = new $controller();
if (isset($_POST['submit'])) {
  $action = $_POST['submit'];       
  $result = $obj->{$action}($_REQUEST);
}
?>
