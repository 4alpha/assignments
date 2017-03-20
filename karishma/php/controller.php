<?php 
use controllerNamespace\AddressController ;
use controllerNamespace\EmployeeController; 

function __autoload( $ClassName ){
      $ClassName = str_replace( "\\", "/", $ClassName ).".php";
      require_once $ClassName;
}   
  
$filename = $_POST['View'];
$controller = 'controllerNamespace\\'.$filename;
$controller = new $controller();
if (isset($_POST['operation'])) {
      $action = $_POST['operation'];       
      $result = $controller->{$action}($_REQUEST);
      return $result;
}
 ?>