<?php
  namespace DataAccessObject;
  use DatabaseFiles\Database as Database;
  use ConfigurationFile\Configuration as Configuration;

  class EmployeeDAO implements DAO {
    public $dbpostgres;
    
    function __construct() {    
      $this->dbpostgres = Database::getDatabaseConnection();
    }
    
    function getAll() {
      $query = 'SELECT * FROM employees;';
      return $this->dbpostgres->select($query);
    }
    
    function insert($employee) {
      $query = "INSERT INTO employees VALUES('".$employee->emp_no."','".$employee->firstName."','".$employee->lastName."','".$employee->hireDate."');";
      return $this->dbpostgres->insert($query);

    }
    
    function update($employee) {
      $query = "UPDATE employees SET first_name='".$employee->firstName."', last_name='".$employee->lastName."', hire_date='".$employee->hireDate."' where emp_no = '".$employee->emp_no."';";
      return $this->dbpostgres->update($query);
    }
    
    function delete($emp_no) {
      $query = "DELETE FROM employees WHERE emp_no = '".$emp_no."';";
      return $this->dbpostgres->delete($query);
    }
    
  }
?>