<?php
  ini_set('display_errors' , 1);
  require_once ('Controller.php');
  require_once('Config.php');
  function __autoload($class) {
    $class = str_replace("\\" , "/" , $class) . ".php";
    require_once $class;
  }
  
  if($_POST['submit'] == 'add') {
    print_r($result);
  } 
  if($_POST['submit'] == 'update') {
    print_r($result);
  } 
  if($_POST['submit'] == 'delete') {
    print_r($result);
  } 
  if($_POST['submit'] == 'getAll') {
    print_r($result);
  } 

?>