<?php
require 'DepartmentDAO.php';
require 'DepartmentsClass.php';

class departmentController {
  public $objdao;

  function __construct() {
    $this->objdao = new DepartmentDAO();
  }

  function add($var) { 
    $obj=new Departments($_POST['deptno'],$_POST['deptname']);
    $ans1 = $this->objdao->addDAO($obj);
    return $ans1;
  
  }
  function update($var) {
      $obj=new Departments($_POST['deptno'],$_POST['deptname']);
      $ans2 = $this->objdao->updateDAO($obj);
      return $ans2;
      
  } 
  function delete($var) {
    $obj=new Departments($_POST['deptno'],$_POST['deptname']);
    $ans3 = $this->objdao->deleteDAO($obj);
    return $ans3;
  } 
  function getrow($var) {
    $ans4 = $this->objdao->getAll();
    return $ans4;
  }  
}
?>
