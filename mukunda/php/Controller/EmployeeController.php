<?php
  namespace Controller;
  use Service\EmployeeService as EmployeeService;
  
  class EmployeeController { 
    private $employeeService;
    function __construct() {
      $this->employeeService = new EmployeeService();
    }

    public function add($data) {
     $valid = $this->employeeService->checkDepartment();
     if($valid == true) {
       $result = $this->employeeService->add($data['emp_no'], $data['name'], $data['gender'], $data['department']);
       return $result;
     } else {
       return "Data is not added.\nYou can not select multiple departments with Facility";
     }
    }

    // public function getRow($data) { 
    //   $result = $this->employeeService->get($data['emp_no']);
    //   return $result;
    // }
    
    public function update($data) {
      $valid = $this->employeeService->checkDepartment();
      if($valid == true) {
        $result = $this->employeeService->update($data['emp_no'], $data['name'], $data['gender'], $data['department']);
        return $result;
      } else {
        return "You can not select multiple departments with Facility ";
      } 
    }

    public function delete($data) { 
      $result = $this->employeeService->delete($data['emp_no']);
      return $result; 
    } 
    
    public function getAll() {
       $result = $this->employeeService->getAll();
      return $result;
    }
  }
?>