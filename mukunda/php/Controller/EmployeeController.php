<?php
  namespace Controller;
  include_once 'businesslogic.php';
  use Model\Employee as Employee;
  use Dao\EmployeeDao as EmployeeDao;
  
  class EmployeeController { 
    public function add($data) {
      //checkDepartment($data);
      $employee = new Employee($data['emp_no'], $data['name'], $data['gender'], $data['department']); 
      $dao = new EmployeeDao(); 
      $result = $dao->add($employee);
      return $result; 
    }
     
    public function getRow($data) {
      $dao = new EmployeeDao(); 
      $result = $dao->get($data['emp_no']);
      return $result;
    }

    public function update($data) {
      $employee = new Employee($data['emp_no'], $data['name'], $data['gender'], $data['department']); 
      $dao = new EmployeeDao(); 
      $result = $dao->update($employee);
      return $result;
    }

    public function delete($data) { 
      $dao = new EmployeeDao(); 
      $result = $dao->delete($data['emp_no']);
      return $result; 
    }

    public function getAll() {
      $dao = new EmployeeDao(); 
      $result = $dao->getAll();
      return $result;
    }
  }
?>