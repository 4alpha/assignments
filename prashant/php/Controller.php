<?php
error_reporting(E_ALL);
ini_set('dispaly_errors',1);
  $fileName = $_POST['view'];
  $controller = "Controller\\" . $fileName . "Controller";
  $obj = new $controller();
  if (isset($_REQUEST['operation'])) {
    $action = $_REQUEST['operation'];
    $result = $obj->{$action}($_REQUEST);
    echo $result;
  }
?>  