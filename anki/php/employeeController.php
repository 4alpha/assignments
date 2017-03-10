<?php
require 'EmployeeDAO.php';
require 'EmployeeClass.php';


class employeeController {
  public $objdao;
  function __construct() {
    $this->objdao = new EmployeeDAO();
    // $this->objdao=$objdao;
  }
  function add($var) { 
    $obj=new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']);
    $ans1 = $this->objdao->addDAO($obj);
    return $ans1;
  }
  function update($var) {
    $obj=new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']); 
    $ans2 = $this->objdao->updateDAO($obj);
    return $ans2;
  } 
  function delete($var) {
    $obj=new Employee($_POST['empno'],$_POST['fname'],$_POST['lname'],$_POST['bdate'],$_POST['gender'],$_POST['hiredate']); 
    $ans3 = $this->objdao->deleteDAO($obj);
    return $ans3;
  } 
  function getrow($var) {
    $ans4 = $this->objdao->getAll();
    return $ans4;
  }
   
}
?>