<?php

  use DAO\EmployeeDAO; 
  class EmployeeController {
  public $dao;
  function __construct() {
    $this->dao= new EmployeeDAO();
  }

  public function getAll() {
    $arr = $this->dao->getAll();
    return $arr;
	}

  public function add() {
    $employee = new Employee($_POST['emp_no'],$_POST['emp_name']);
    $result = $this->dao->add($employee);
   return $result;
  }

  public function update() {
    $employee = new Employee($_POST['emp_no'],$_POST['emp_name']);
    $result = $this->dao->update($employee);
    return $result;
  }

  public function delete() {
    $employee = new Employee($_POST['emp_no'],$_POST['emp_name']);
    $result = $this->dao->delete($employee);
    return $result;
  }
}
?>