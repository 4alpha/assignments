<?php
require 'employeeController.php';
require 'departmentController.php';

// error_reporting(E_ALL);
// ini_set('display_errors',1);

    $model = explode('_',$_POST['control']);
    // print_r($model);
    $Controller = $model[0]."Controller"; 
    // print_r($Controller);
    $var=$_POST;
    // print_r($var);
    $obj = new $Controller();
    // print_r($obj);
    $action = $_POST['submit'];
    $result=$obj->{$action}($var);
        
?>