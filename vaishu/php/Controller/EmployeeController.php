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
      $employee = new Employee($data[$this->_keys['no']], $data[$this->_keys['name']]);
      $result = $this->dao->add($employee);
      return $result;
    }

    public function update($data) {
      $employee = new Employee($data[$this->_keys['no']], $data[$this->_keys['name']]);
      $result = $this->dao->update($employee);
      return $result;
    }

    public function delete($data) {
      $result = $this->dao->delete($data[$this->_keys['no']]);
      return $result;
    }
  }
?>