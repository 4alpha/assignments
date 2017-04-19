<?php
  namespace Controllers;  
  use Models\Employee as Employee;
  use DataAccessObject\EmployeeDAO as EmployeeDAO; 
  use Services\EmployeeService as EmployeeService;
  include_once("buisiness.php");

  class EmployeeController {
    private $dao;
    private $empServ;
    // private $keys = ['emp_no' => 'emp_no', 'firstName' => 'firstName', 'lastName' => 'lastName', 'hireDate' => 'hireDate'];
    function __construct() {
      $this->empServ = new EmployeeService();
      // $this->empServ->checkDepartments();
      // $this->dao = new EmployeeDAO();
    }

    function getRow() {
      return $this->empServ->getAll();
    }
    
    function addRow($data) {
      // $employee = new Employee();
      // $employee->emp_no = $data['emp_no'];
      // $employee->firstName = $data['firstName'];
      // $employee->lastName = $data['lastName'];
      // $employee->hireDate = $data['hireDate'];
      // $employee->departments = $data['departments'];  
      // print_r($data['departments']) ;  
      if($data['emp_no'] && $data['firstName'] && $data['lastName'] && $data['hireDate'] && $data['departments'])
        return $this->empServ->insert($data['emp_no'], $data['firstName'], $data['lastName'], $data['hireDate'], $data['departments']);
      else
        echo "<script>alert('Please enter data and try again')</script>";
    }
    
    function updateRow($data) {
      // $employee = new Employee();
      // $employee->emp_no = $data['emp_no'];
      // $employee->firstName = $data['firstName'];
      // $employee->lastName = $data['lastName'];
      // $employee->hireDate = $data['hireDate'];
      // if(checkDepartments() == "yes") {
      if($data['emp_no'] && $data['firstName'] && $data['lastName'] && $data['hireDate'] && $data['departments'])
        return $this->empServ->update($data['emp_no'], $data['firstName'], $data['lastName'], $data['hireDate'], $data['departments']);
      else 
        echo "<script>alert('Please enter data and try again')</script>";
      // } else {
        // return "You can not add multiple departments with facility";
      // }
    }
    
    function deleteRow($data) {
      // $employee = new Employee();
      if($data['emp_no'])
        return $this->empServ->delete($data['emp_no']);
      else 
        echo "<script>alert('Please enter employee number and try again')</script>";
    }
  }
?>