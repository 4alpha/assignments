<?php 
use DAO\DepartmentDAO as DepartmentDAO;
require_once 'Config/Config.php';
function __autoload($class) {
    $class = str_replace("\\", "/", $class . ".php") ;
    if (file_exists($class)) {
      require_once($class);
    }
  }
$dao = new DepartmentDAO();
print_r($dao->getAll());
$GLOBALS['allDepartments'] = $dao->getAll();
?>