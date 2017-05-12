<?php
  namespace Controller;
  use Service\EmployeeService as EmployeeService;
  
  class EmployeeController {
    private $employeeservice;
    private $_keys = ['no' => 'emp_no', 'empname' => 'emp_name','dept_name'=>'dept_name'];
    function __construct() {
      $this->employeeservice = new EmployeeService();
    }

    public function getAll() {
      $arr = $this->employeeservice->getAll();
      return $arr;
	  }

    function add($data) {
     
    if ($this->employeeservice->departmentService() == "true") {
      $result = $this->employeeservice->add($data['emp_no'],$data['emp_name'],$data['departments']);
      return $result;
    } else {
      return 'please select correct department';
    }
  }

  function update($data) {
    if ($this->employeeservice->departmentService() == "true") {
      $result = $this->employeeservice->update($data['emp_no'],$data['emp_name'],$data['departments']);
      return $result;
    } else {
      return 'please select correct department';
    }
  }

  function delete($data) {
    if ($this->employeeservice->departmentService() == "true") {
      $result = $this->employeeservice->delete($data[$this->_keys['no']]);
      return $result;
    } else {
      return 'please select correct department';
    }
  }

  }
?>