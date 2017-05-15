<?php
  include_once 'BusinessService.php';
  departmentService();
  $file = $_POST['View'];
  $controller = "Controller\\" . $file . "Controller";
  $obj = new $controller();

  if (isset($_REQUEST['submit'])) {
    $action = $_REQUEST['submit'];
    $result = $obj->{$action}($_REQUEST);
    }
  
?>