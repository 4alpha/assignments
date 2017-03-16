<?php
require 'EmployeeDAO.php';
require 'Employee.php';

class EmployeeController {
  public $objdao;
  function __construct() {
    $this->objdao = new EmployeeDAO();
  }

  function add($varController) { 
    $employeeObj = new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']);
    $result = $this->objdao->addDAO($employeeObj);
    return $result;
  }

  function update($varController) {
    $employeeObj = new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']); 
    $result = $this->objdao->updateDAO($employeeObj);
    return $result;
  }

  function delete($varController) {
    $employeeObj = new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']); 
    $result = $this->objdao->deleteDAO($employeeObj);
    return $result;
  }

  function getrow($varController) {
    $result = $this->objdao->getAll();
    return $result;
  }
   
}
?>