<?php
  namespace Controller;
  use Service\EmployeeService as EmployeeService;
  
  class EmployeeController {
    private $employeeservice;
    function __construct() {
        $this->employeeservice = new EmployeeService();
      }

      public function getAll() {
        $arr = $this->employeeservice->getAll();
        return $arr;
      }

      function add($data) {
        $result = $this->employeeservice->add($data['emp_no'],$data['emp_name'],$data['departments']);
        return $result;
      }

      function update($data) {
        $result = $this->employeeservice->update($data['emp_no'],$data['emp_name'],$data['departments']);
          return $result;
      }

    function delete($data) {
      $result = $this->employeeservice->delete($data['emp_no']);
      return $result;
    }

  }
?>