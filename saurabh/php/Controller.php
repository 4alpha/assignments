
<?php
  // ini_set('display_errors', 1);
 
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });
  
  $filename = $_POST['filename'];
  $file = explode('_', $filename);
  $controller = 'Controllers\\' . $file[0].'Controller';
  $ctrl = new $controller();

  if (isset ($_POST['submit'])) {
    $action = $_POST['submit'];    
    echo $action;   
    $result = $ctrl->{$action}($_REQUEST);
  }
?>