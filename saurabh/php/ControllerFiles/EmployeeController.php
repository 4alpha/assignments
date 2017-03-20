<?php
  use Models\Employee as Employee;
  use DataAccessObject\EmployeeDAO as EmployeeDAO; 
  
  class EmployeeController {
    private $employeedao;
    private $keys = ['no' => 'emp_no', 'firstName' => 'firstName', 'lastName' => 'lastName', 'hireDate' => 'hireDate'];
    function __construct() {
      $this->employeedao = new EmployeeDAO();
    }
    
    function getRow($data) {
      return $this->employeedao->getAll();
    }
    
    function addRow($data) {
      $employee = new Employee($data[$this->keys['no']], $data[$this->keys['firstName']], $data[$this->keys['lastName']], $data[$this->keys['hireDate']]);
      return $this->employeedao->insert($employee);
    }
    
    function updateRow($data) {
      $employee = new Employee($data[$this->keys['no']], $data[$this->keys['firstName']], $data[$this->keys['lastName']], $data[$this->keys['hireDate']]);
      return $this->employeedao->update($employee);
    }
    
    function deleteRow($data) {
      return $this->employeedao->delete($data[$this->keys['no']]);
    }
  }
?>