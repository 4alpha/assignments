<?php
  use Controller\EmployeeController as EmployeeController;
  use Controller\DepartmentController as DepartmentController;

  $hide = $_POST['hide'];
  $model = explode ('_',$hide);
  $controller = 'Controller\\' .$model[0]. "Controller";
  $object = new $controller();
  $action = $_POST['submit'];
  $result = $object->{$action}();
?>