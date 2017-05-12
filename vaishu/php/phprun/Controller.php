<?php
  require_once 'Config.php';
  include_once 'AutoLoader.php';
  
  $file = $_POST['View'];
  $controller = "Controller\\" . $file . "Controller";
  $obj = new $controller();
  
  if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    $result = $obj->{$action}($_REQUEST);
    }
  
?>