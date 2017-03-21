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
      $employee = new Employee($data[$this->keys['no']], $data[$this->keys['firstName']], $data[$this->keys['lastName']], $data[$this->keys['hireDate']]);
      return $this->dao->insert($employee);
    }
    
    function updateRow($data) {
      $employee = new Employee($data[$this->keys['no']], $data[$this->keys['firstName']], $data[$this->keys['lastName']], $data[$this->keys['hireDate']]);
      return $this->dao->update($employee);
    }
    
    function deleteRow($data) {
      return $this->dao->delete($data[$this->keys['no']]);
    }
  }
?>