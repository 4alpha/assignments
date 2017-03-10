<?php
  require 'DAO.php';
  class EmployeeDAO extends DAO {
    public $dbpostgres;
    // public $employee;
    function __construct() {     
      $this->dbpostgres = parent::__construct();;
      // $this->employee = $emp;
    }
    function getAll() {
      $query = 'select * from employees;';
      $result = $this->dbpostgres->select($query);
      return $result;
    }
    function Insert($employee) {
      $query = "insert into employees values('".$employee->emp_no."','".$employee->firstName."','".$employee->lastName."','".$employee->hireDate."');";
      $cnt = $this->dbpostgres->insert($query);
      return $cnt;
    }
    function Update($employee) {
      $query = "update employees set first_name='".$employee->firstName."', last_name='".$employee->lastName."', hire_date='".$employee->hireDate."' where emp_no = '".$employee->emp_no."';";
      $cnt = $this->dbpostgres->update($query);
      return $cnt;
    }
    function Delete($emp_no) {
      $query = "delete from employees where emp_no = '".$employee->emp_no."';";
      $cnt = $this->dbpostgres->delete($query);
      return $cnt;
    }
  }
?>