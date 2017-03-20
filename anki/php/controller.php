<?php
$fileName = $_POST['view'];
$controller = "Controller\\" . $fileName;
$obj = new $controller();
if (isset ($_POST['submit'])) {
  $action = $_POST['submit'];       
  $result = $obj->{$action}($_REQUEST);
}
?>
