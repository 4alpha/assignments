<?php
  namespace DataAccessObject;
  use databases\Database as Database;
  use ConfigurationFile\Configuration as Configuration;
  use AppExceptions\GetAllRecordException as GetAllRecordException;
  use AppExceptions\InsertRecordException as InsertRecordException;
  use AppExceptions\UpdateRecordException as UpdateRecordException;
  use AppExceptions\DeleteRecordException as DeleteRecordException;



  class EmployeeDAO implements DAO {
    private $dbpostgres;
    
    function __construct() {    
      $this->dbpostgres = Database::getDatabaseConnection();
    }
    
    public function getAll() {
      try {
        $query = 'SELECT * FROM employees;';
        $result =  $this->dbpostgres->select($query);
        return $result;
      } catch (GetAllRecordException $e) {
        return $e->getErrorMessage();
      }
    }
    
    public function insert($employee) {
      try {
        $query = "INSERT INTO employees VALUES('" . $employee->emp_no . "', '" . $employee->firstName . "', '" . $employee->lastName . "', '" . $employee->hireDate . "');";
        return $this->dbpostgres->insert($query);
      } catch(InsertRecordException $e) {
        return $e->getErrorMessage();
      }
    }
    
    public function update($employee) {
      try {
        $query = "UPDATE employees SET first_name = '" . $employee->firstName . "', last_name = '" . $employee->lastName . "', hire_date = '" . $employee->hireDate . "' where emp_no = '" . $employee->emp_no . "';";
        return $this->dbpostgres->update($query);
      } catch (UpdateRecordException $e) {
        return $e->getErrorMessage();
      }
    }
    
    public function delete($emp_no) {
      try {
        $query = "DELETE FROM employees WHERE emp_no = '" . $emp_no . "' ;";
        return $this->dbpostgres->delete($query);
      } catch (DeleteRecordException $e) {
          return $e->getErrorMessage($this->dbconnection);
      }
    }
    
  }
?>