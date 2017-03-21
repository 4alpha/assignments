
<?php
  ini_set('display_errors', 1);
 
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });
  
  $filename = $_POST['filename'];
  $file = explode('_', $filename);
  $controller = 'Controllers\\' . $file[0].'Controller';
  $ctrl = new $controller();

  if($_POST['getRow'] == 'getRows()') {
    $result = $ctrl->getRow();
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