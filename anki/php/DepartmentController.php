<?php
include_once 'DepartmentDAO.php';
//include_once 'Departments.php';
use Models\Departments as Departments; 
class DepartmentController {
  public $objdao;
  function __construct() {
    $this->objdao = new DepartmentDAO();
  }

  function add($varController) { 
    $departmentObj = new Departments($_POST['deptno'], $_POST['deptname']);
    $result = $this->objdao->addDAO($departmentObj);
    return $result;
  }

  function update($varController) {
      $departmentObj = new Departments($_POST['deptno'], $_POST['deptname']);
      $result = $this->objdao->updateDAO($departmentObj);
      return $result;
  } 

  function delete($varController) {
    $departmentObj = new Departments($_POST['deptno'], $_POST['deptname']);
    $result = $this->objdao->deleteDAO($departmentObj);
    return $result;
  } 

  function getrow($varController) {
    $result = $this->objdao->getAll();
    return $result;
  }  
}
?>
