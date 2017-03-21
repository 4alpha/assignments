<?php
namespace DAO;
use DB_Driver\DB as DB;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;
use ExceptionClass\UpdateRecordException as UpdateRecordException;
use ExceptionClass\GetAllRecordException as GetAllRecordException;

class EmployeeDAO implements DAO {
  private $db;
  function  __construct() {
    $this->db = DB::getConnection();
  }
  
  function add($obj) {
    $query = "INSERT INTO employees VALUES('" . $obj->empno . "', '" . $obj->fname . "', '" . $obj->lname . "', '" . $obj->bdate . "', '" . $obj->gender . "')";
    try {
      $result = $this->db->insert($query);
      return $result;
    } catch (IDAlreadyExist $e) {
      return $e->getErrorMessage();
    }
  }

  function update($obj) {
    $query = "UPDATE employees SET emp_no ='" . $obj->empno . "', first_name='" . $obj->fname . "', last_name='" . $obj->lname . "',birth_date='" . $obj->bdate . "',gender='" . $obj->gender . "' WHERE emp_no ='" . $obj->empno . "'";
    try {
      $result = $this->db->update($query);
      return $result;
    } catch (UpdateRecordException $e) {
      return $e->getErrorMessage();
    }
  }

  function delete($obj) {
    $query = "DELETE FROM employees WHERE emp_no ='" . $obj->empno . "'";
    try {
      $result = $this->db->delete($query);
      return $result;
    } catch (ValueNotExist $e) {
      return $e->getErrorMessage();
    }
  }
  
  function getAll() {
    $query = "SELECT * FROM employees";
    try {
      $result = $this->db->select($query);
      return $result;
    } catch (GetAllRecordException $e) {
      return $e->getErrorMessage();
    }
  }  
}
?>
