<?php
  include 'common.php';
  use Controller\AddressController;
  use Controller\EmployeeController;
  //echo "in controller";
  
  $viewName = $_POST['View'];
  //echo $viewName;
  $controllerName = "Controller\\". $viewName."Controller";
  //echo $controllerName;
  $controller = new $controllerName();
  if(isset($_REQUEST['operation'])) {
    $action = $_REQUEST['operation'];  
    $result = $controller->{$action}($_REQUEST);
    echo $result;
    return $result;
  }
?>