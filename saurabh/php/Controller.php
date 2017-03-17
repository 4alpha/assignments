
<?php
  ini_set('display_errors', 1);
  include('/home/developer/git/assignments/saurabh/php/ControllerFiles/EmployeeController.php');  
  include('/home/developer/git/assignments/saurabh/php/ControllerFiles/SalaryController.php');  
  
  spl_autoload_register(function ($class_name) {
    $class_name =str_replace("\\","/",$class_name.'.php');
    // echo $class_name;
    include $class_name;
  });

  $filename = $_POST['filename'];
  $file = explode('_',$filename);
  $controller = $file[0].'Controller';
  // echo $controller;
  $ctrl = new $controller();

  if($_POST['getRow'] == 'getRows()') {
    $result=$ctrl->getRow();
  }

  if($_POST['addRow'] == 'addRow()') {
    $result = $ctrl->addRow($_REQUEST);
  }

  if($_POST['updateRow'] == 'updateRow()') {
    $result = $ctrl->updateRow($_REQUEST);
  }
  
  if($_POST['deleteRow'] == 'deleteRow()') {
    $result = $ctrl->deleteRow($_REQUEST);
  }

?>