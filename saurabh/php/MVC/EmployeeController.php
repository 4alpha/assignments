<?php

  require 'EmployeeDAO.php';
  require 'Employee.php';
  class EmployeeController {
    public $employeedao;
    
    function __construct() {
      $this->employeedao = new EmployeeDAO();
    }
    
    function getRow() {
      $result = $this->employeedao->getAll();
      return $result;
    }
    
    function addRow() {
      $employee = new Employee($_POST['emp_no'],$_POST['firstName'],$_POST['lastName'],$_POST['hireDate']);
      $result = $this->employeedao->Insert($employee);
      return $result;
    }
    
    function updateRow() {
      $employee = new Employee($_POST['emp_no'],$_POST['firstName'],$_POST['lastName'],$_POST['hireDate']);
      $result = $this->employeedao->Update($employee);
      return $result;
    }
    
    function deleteRow() {
      $result = $this->employeedao->Delete($_POST['emp_no']);
      return $result;
    }
  }
?>