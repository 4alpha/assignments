<?php
  $fileName = $_POST['View']; 
  $controller = "Controller\\" . $fileName . "Controller";
  $obj = new $controller();
  if (isset($_POST['operation'])) {
    $action = $_POST['operation'];     
    $result = $obj->{$action}($_REQUEST);
  }
?>  