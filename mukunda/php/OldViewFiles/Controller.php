<?php
  use Controller\AddressController;
  use Controller\EmployeeController;

  $viewName = $_POST['View'];
  $controllerName = "Controller\\". $viewName."Controller";
  $controller = new $controllerName();
  
  if(isset($_REQUEST['operation'])) {
    $action = $_REQUEST['operation'];
    $result = $controller->{$action}($_REQUEST);
    return $result;
  }
?>