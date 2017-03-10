<?php
require 'DepartmentDAO.php';
require 'DepartmentsClass.php';

class departmentController {
  public $objdao;
  function __construct() {
    $this->objdao = new DepartmentDAO();
  }

  function add($var) { 
    $obj = new Departments($_POST['deptno'],$_POST['deptname']);
    $result = $this->objdao->addDAO($obj);
    return $result;
  }

  function update($var) {
      $obj = new Departments($_POST['deptno'],$_POST['deptname']);
      $result = $this->objdao->updateDAO($obj);
      return $result;
  } 

  function delete($var) {
    $obj = new Departments($_POST['deptno'],$_POST['deptname']);
    $result = $this->objdao->deleteDAO($obj);
    return $result;
  } 

  function getrow($var) {
    $result = $this->objdao->getAll();
    return $result;
  }  
}
?>
