<?php
require 'EmployeeDAO.php';
require 'EmployeeClass.php';

class employeeController {
  public $objdao;
  function __construct() {
    $this->objdao = new EmployeeDAO();
  }

  function add($var) { 
    $obj = new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']);
    $result = $this->objdao->addDAO($obj);
    return $result;
  }

  function update($var) {
    $obj = new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']); 
    $result = $this->objdao->updateDAO($obj);
    return $result;
  }

  function delete($var) {
    $obj = new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']); 
    $result = $this->objdao->deleteDAO($obj);
    return $result;
  }

  function getrow($var) {
    $result = $this->objdao->getAll();
    return $result;
  }
   
}
?>