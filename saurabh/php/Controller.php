
<?php
  ini_set('display_errors', 1);
 
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });

  echo PHP_INT_MAX;

  $filename = $_POST['filename'];
  $file = explode('_', $filename);
  $controller = 'Controllers\\' . $file[0].'Controller';
  $ctrl = new $controller();

  if (isset ($_POST['submit'])) {
    $action = $_POST['submit'];    
    if($action == "getRow") {
      $result = $ctrl->{$action}($_REQUEST);
    } elseif ($action == "addRow" || $action == "updateRow") {
      if($_POST['emp_no'] && $_POST['firstName'] && $_POST['lastName'] && $_POST['hireDate'])
        $result = $ctrl->{$action}($_REQUEST);
      else
        echo '<script>alert("please enter neccesary field and try again")</script>';
    } elseif ($action == "deleteRow") {
      if($_POST['emp_no'])
        $result = $ctrl->{$action}($_REQUEST);
      else
        echo '<script>alert("please enter number and try again")</script>';
    }
  }
?>