<?php
  namespace DataAccessObject;
  
  use databases\Database as Database;
  use ConfigurationFile\Configuration as Configuration;
  use AppExceptions\GetAllRecordException as GetAllRecordException;
  use AppExceptions\InsertRecordException as InsertRecordException;
  use AppExceptions\UpdateRecordException as UpdateRecordException;
  use AppExceptions\DeleteRecordException as DeleteRecordException;

  class DepartmentDAO implements DAO {
    private $dbpostgres;

    function  __construct() {
      $this->dbpostgres = Database::getDatabaseConnection();
    }

    public function getDepartmentStatusFalse() {
      try {
        $query = "SELECT * FROM department WHERE multi_dept = 'f';";
        return $this->dbpostgres->select($query);
      } catch (GetAllRecordException $e) {
        return $e->getErrorMessage();
      }
    }

    public function getAll() {
      try {
        $query = 'SELECT * FROM department;';
        return $this->dbpostgres->select($query);
      } catch (GetAllRecordException $e) {
        return $e->getErrorMessage();
      }
    } 

    public function insert($department) {
      try {
        $query = "INSERT INTO department VALUES('" . $department->dept_no . "', '" . $department->dept_name . "', '" . $department->multi_dept . "');";
        return $this->dbpostgres->insert($query);
      } catch(InsertRecordException $e) {
        return $e->getErrorMessage();
      }
    }

    public function update($department) {
      try {
        $query = "UPDATE department SET dept_name = '" . $department->dept_name . "', multi_dept = '" . $department->multi_dept . "' where dept_no = '" . $department->dept_no . "';";
        return $this->dbpostgres->update($query);
      } catch (UpdateRecordException $e) {
        return $e->getErrorMessage();
      }
    }

    public function delete($dept_no) {
      try {
        $query = "DELETE FROM department WHERE dept_no = '" . $dept_no . "' ;";
        return $this->dbpostgres->delete($query);
      } catch (DeleteRecordException $e) {
          return $e->getErrorMessage($this->dbconnection);
      }
    }
 
  }

?>