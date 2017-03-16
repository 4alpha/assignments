<?php
  require_once 'DAO.php';
  include_once 'Database.php';
  class EmployeeDAO implements DAO {
    public $dbpostgres;
    
    function __construct() {     
      $this->dbpostgres = Database::getDatabaseConnection();
    }
    
    function getAll() {
      $query = 'SELECT * FROM employees;';
      $result = $this->dbpostgres->select($query);
      return $result;
    }
    
    function Insert($employee) {
      $query = "INSERT INTO employees VALUES('".$employee->emp_no."','".$employee->firstName."','".$employee->lastName."','".$employee->hireDate."');";
      $result = $this->dbpostgres->insert($query);
      return $result;
    }
    
    function Update($employee) {
      $query = "UPDATE employees SET first_name='".$employee->firstName."', last_name='".$employee->lastName."', hire_date='".$employee->hireDate."' where emp_no = '".$employee->emp_no."';";
      $result = $this->dbpostgres->update($query);
      return $result;
    }
    
    function Delete($emp_no) {
      $query = "DELETE FROM employees WHERE emp_no = '".$emp_no."';";
      $result = $this->dbpostgres->delete($query);
      return $result;
    }
  }
?>