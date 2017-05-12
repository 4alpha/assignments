<?php
error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $file = $_POST['View'];
  $controller = "Controller\\" . $file . "Controller";
  $obj = new $controller();
  
  if (isset($_REQUEST['submit'])) {
    $action = $_REQUEST['submit'];
    echo $action;
    $result = $obj->{$action}($_REQUEST);
    }
  
?>