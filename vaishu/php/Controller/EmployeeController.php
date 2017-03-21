<?php
  namespace Controller;
  use DAO\EmployeeDAO as EmployeeDAO;
  use Model\Employee as Employee;
  
  class EmployeeController {
    private $dao;
    private $_keys = ['no' => 'emp_no', 'name' => 'emp_name'];
    function __construct() {
      $this->dao = new EmployeeDAO();
    }

    public function getAll() {
      $arr = $this->dao->getAll();
      return $arr;
	  }

    public function add($data) {
      $employee = new Employee();
      $employee->emp_no = $data['emp_no'];
      $employee->emp_name = $data['emp_name'];
      return $this->dao->add($employee);;
    }

    public function update($data) {
      $employee = new Employee();
      $employee->emp_no = $data['emp_no'];
      $employee->emp_name = $data['emp_name'];
      return $this->dao->update($employee);;
    }

    public function delete($data) {
      $result = $this->dao->delete($data[$this->_keys['no']]);
      return $result;
    }
  }
?>