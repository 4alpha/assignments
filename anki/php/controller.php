<?php
include_once 'common.php';
use Controller\DepartmentController;
use Controller\EmployeeController;

$fileName = $_POST['view'];
$controller = "Controller\\" . $fileName;
$obj = new $controller();
if (isset ($_REQUEST['submit'])) {
  $action = $_REQUEST['submit']; 
  $result = $obj->{$action}($_REQUEST);
  echo $result;
}
?>
