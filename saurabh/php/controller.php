
<?php
  require 'EmpController.php';
  require 'SalaryController.php';

  $filename = $_POST['filename'];
  $file = explode('_',$filename);
  $controller = $file[0].'Controller';
  $ctrl = new $controller();

  if($_POST['getRow'] == 'getRows()') {
    $get=$ctrl->getRow();
  }
  if($_POST['addRow'] == 'addRow()') {
    $result = $ctrl->addRow();
  }
  if($_POST['updateRow'] == 'updateRow()') {
    $result = $ctrl->updateRow();
  }
  if($_POST['deleteRow'] == 'deleteRow()') {
    $result = $ctrl->deleteRow();
  }
?>