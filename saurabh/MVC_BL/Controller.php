
<?php
  // ini_set('display_errors', 1);
 
  include_once("buisiness.php");
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });


  $filename = $_POST['view'];
  $controller = 'Controllers\\' . $filename.'Controller';
  $ctrl = new $controller();

  if (isset ($_POST['submit'])) {
    foreach ($_REQUEST['departments'] as $selectedOption)
      echo $selectedOption;
    $action = $_POST['submit'];   
    $result = $ctrl->{$action}($_REQUEST);
    // echo checkDepartments();
  }
?>