<?php
  namespace Controller;
  use DAO\EmployeeDAO as EmployeeDAO;
  use Model\Employee as Employee;

  class EmployeeController { 
    private $dao;
    private $_keys = ['no' => 'emp_no', 'name' => 'emp_name', 'address' => 'emp_address', 'dob' => 'DOB', 'contact_no' => 'contact_no'];
    function __construct() {
      $this->dao = new EmployeeDAO();
    }

    function insert($data) {
      $employee = new Employee();
      $employee->emp_no = $data[$this->_keys['no']];
      $employee->emp_name = $data[$this->_keys['name']];
      $employee->emp_address = $data[$this->_keys['address']];
      $employee->DOB = $data[$this->_keys['dob']];
      $employee->contact_no = $data[$this->_keys['contact_no']];
      $employee->departments = $data['departments'];
      return $this->dao->insert($employee);
    }

    function get($data) {
      return $this->dao->get($data[$this->_keys['no']]);
    }

    function getAll() {
      $result = $this->dao->getAll();
      return $result;
    }

    function update($data) {      
      $employee = new Employee();
      $employee->emp_no = $data[$this->_keys['no']];
      $employee->emp_name = $data[$this->_keys['name']];
      $employee->emp_address = $data[$this->_keys['address']];
      $employee->DOB = $data[$this->_keys['dob']];
      $employee->contact_no = $data[$this->_keys['contact_no']];
      $employee->departments = $data['departments'];
      return $this->dao->update($employee);
    }

    function delete($data) {
      return $this->dao->delete($data[$this->_keys['no']]);
    }
  }
?>