<?php
$fileName = $_POST['view'];
$controller = "Controller\\" . $fileName;
$obj = new $controller();
if (isset ($_REQUEST['submit'])) {
  $action = $_REQUEST['submit']; 
  $result = $obj->{$action}($_REQUEST);
}
?>
