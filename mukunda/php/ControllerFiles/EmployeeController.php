<?php
  namespace ControllerFiles;
  
  use ClassFiles\Employee as Employee;
  use DaoFiles\EmployeeDao as EmployeeDao;
  
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
      $dao = new EmployeeDao($employee); 
      $result = $dao->add($employee);
      return $result;
    }
     
    public function getRow() {
      $employee = new Employee($this->id, $this->name, $this->gender); 
      $dao = new EmployeeDao($employee); 
      $result = $dao->get($this->id);
      return $result;
    }

    public function update() {
      $employee = new Employee($this->id, $this->name, $this->gender); 
      $dao = new EmployeeDao($employee); 
      $result = $dao->update($employee);
      return $result;
    }

    public function delete() {
      $employee = new Employee($this->id, $this->name, $this->gender); 
      $dao = new EmployeeDao($employee); 
      $result = $dao->delete($this->id);
      return $result; 
    }

    public function getAll() {
      $employee = new Employee($this->id, $this->name, $this->gender); 
      $dao = new EmployeeDao($employee); 
      $result = $dao->getAll();
      return $result;
    }
  }
?>