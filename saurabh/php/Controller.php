
<?php
  // ini_set('display_errors', 1);
 
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });

  $filename = $_POST['view'];
  $controller = 'Controllers\\' . $filename.'Controller';
  $controller = 'Controllers\\' . 'EmployeeController';
  $ctrl = new $controller();

  $result = $ctrl->getRow();
    
  $action = $_REQUEST['submit'];    
  if ($action == "addRow" || $action == "updateRow") {
    if($_POST['emp_no'] && $_POST['firstName'] && $_POST['lastName'] && $_POST['hireDate'])
      $answer = " <div class='alert alert-success' role='alert'>
                " . $ctrl->{$action}($_REQUEST) . "
                </div> ";
    else
      echo '<script>alert("please enter neccesary field and try again")</script>';
  } elseif ($action == "deleteRow") {
    if($_REQUEST['emp_no'])
      $answer = " <div class='alert alert-success' role='alert'>
                " . $ctrl->{$action}($_REQUEST) . "
                </div> ";
    else
      echo '<script>alert("please enter number and try again")</script>';
  }
?>