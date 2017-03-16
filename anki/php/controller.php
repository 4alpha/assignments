<?php
require 'EmployeeController.php';
require 'DepartmentController.php';

// error_reporting(E_ALL);
// ini_set('display_errors',1);

    $model = explode('_',$_POST['control']);
    $Controller = $model[0]."Controller"; 
    $varController = $_POST;
    $obj = new $Controller();
    $action = $_POST['submit'];
    $result=$obj->{$action}($varController);
        
?>