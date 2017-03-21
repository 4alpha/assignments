<?php
  use Controller\AddressController;
  use Controller\EmployeeController;

  $viewName = $_POST['View'];
  $controllerName = "Controller\\". $viewName."Controller";
  $controller = new $controllerName();
 
  if(isset($_POST['operation'])) {
    $action = $_POST['operation'];
    $result = $controller->{$action}();
    return $result;
  }
?>