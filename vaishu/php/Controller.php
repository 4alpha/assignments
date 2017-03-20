<?php
  
  $file = $_POST['View'];
  $controller = "Controller\\" . $file . "Controller";
  $obj = new $controller();
  if (isset($_POST['submit'])) {
    $action = $_POST['submit'];       
    $result = $obj->{$action}($_REQUEST);
  }
?>