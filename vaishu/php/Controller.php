<?php
  include_once 'Include.php';
  $hide = $_POST['hide'];
  $model = explode ('_',$hide);
  $controller=$model[0]."Controller";
  $object = new $controller();
  $action = $_POST['submit'];
  $result = $object->{$action}();
?>