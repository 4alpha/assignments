<?php
  
  use ControllerFiles\AddressController ;
  use ControllerFiles\EmployeeController;

  $viewName = $_POST['View'];
  $controllerName = "ControllerFiles\\". $viewName."Controller";
  $controller = new $controllerName();

  if($action = $_POST['operation']) {
    $result = $controller->{$action}();
    return $result;
  }
?>