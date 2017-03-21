<?php
  namespace Controller;
  
  use Model\Employee as Employee;
  use Dao\EmployeeDao as EmployeeDao;
  
  class EmployeeController {
    private $id;
    private $name;
    private $gender;
   
    function __construct() {
      $this->id = $_POST['emp_no'];
      $this->name = $_POST['name'];
      $this->gender = $_POST['gender'];     
    }
   
    public function add() {
      $employee = new Employee($this->id, $this->name, $this->gender); 
      $dao = new EmployeeDao(); 
      $result = $dao->add($employee);
      return $result;
    }
     
    public function getRow() {
      $dao = new EmployeeDao(); 
      $result = $dao->get($this->id);
      return $result;
    }

    public function update() {
      $employee = new Employee($this->id, $this->name, $this->gender); 
      $dao = new EmployeeDao(); 
      $result = $dao->update($employee);
      return $result;
    }

    public function delete() { 
      $dao = new EmployeeDao(); 
      $result = $dao->delete($this->id);
      return $result; 
    }

    public function getAll() {
      $dao = new EmployeeDao(); 
      $result = $dao->getAll();
      return $result;
    }
  }
?>