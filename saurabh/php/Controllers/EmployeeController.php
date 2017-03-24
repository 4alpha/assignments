<?php
  namespace Controllers;
  
  use Models\Employee as Employee;
  use DataAccessObject\EmployeeDAO as EmployeeDAO; 
  
  class EmployeeController {
    private $dao;
    private $keys = ['no' => 'emp_no', 'firstName' => 'firstName', 'lastName' => 'lastName', 'hireDate' => 'hireDate'];
    function __construct() {
      $this->dao = new EmployeeDAO();
    }

    function getRow() {
      return $this->dao->getAll();
    }
    
    function addRow($data) {
      $employee = new Employee();
      $employee->emp_no = $data['emp_no'];
      $employee->firstName = $data['firstName'];
      $employee->lastName = $data['lastName'];
      $employee->hireDate = $data['hireDate'];
      return $this->dao->insert($employee);
    }
    
    function updateRow($data) {
      $employee = new Employee();
      $employee->emp_no = $data['emp_no'];
      $employee->firstName = $data['firstName'];
      $employee->lastName = $data['lastName'];
      $employee->hireDate = $data['hireDate'];
      return $this->dao->update($employee);
    }
    
    function deleteRow($data) {
      $employee = new Employee();
      $employee->emp_no = $data['emp_no'];
      return $this->dao->delete($employee->emp_no);
    }
  }
?>