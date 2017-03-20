<?php 
use controNamespace\AddressController ;
use controNamespace\EmployeeController; 

function __autoload( $ClassName ){
      $ClassName = str_replace( "\\", "/", $ClassName ).".php";
      require_once $ClassName;
}   
  
$filename = $_POST['View'];
$controller = 'controNamespace\\'.$filename;
$controller = new $controller();
if (isset($_POST['operation'])) {
      $action = $_POST['operation'];       
      $result = $controller->{$action}($_REQUEST);
      return $result;
}
 ?>