<?php 

function __autoload( $ClassName ){
      $ClassName = str_replace( "\\", "/", $ClassName ).".php";
      require_once $ClassName;
}
  
$filename = $_POST['View'];
$controller = 'Controller\\'.$filename;
$controller = new $controller();
$result = $controller->getRow($var); 
if (isset($_REQUEST['operation'])) {
      $action = $_REQUEST['operation']; 
      $result = $controller->{$action}($_REQUEST);
      return $result;
}
 ?>