<?php
    include 'employee_controller.php';
    $fileName = $_POST['filename']; 
    $file = explode('_',$fileName);
    $controller = $file[0]."Controller";
    $obj = new $controller();
    $action = $_POST['menu'];       
        $result = $obj->{$action}();             
?>  