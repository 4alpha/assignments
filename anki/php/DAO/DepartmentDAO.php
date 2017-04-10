<?php
namespace DAO;
use DB_Driver\DB as DB;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;
use ExceptionClass\UpdateRecordException as UpdateRecordException;
use ExceptionClass\GetAllRecordException as GetAllRecordException;

class DepartmentDAO implements DAO {
  private $db;
  function  __construct() {
    $this->db = DB::getConnection();
  }
  
  function add($obj) {
    $query = "INSERT INTO departments(dept_name,assign_status) VALUES ('" . $obj->deptname . "', '" . $obj->status . "')";
    try {
      $result = $this->db->insert($query);
      return $result;
    } catch (IDAlreadyExist $e) {
        return $e->getErrorMessage();
    }
  }

  function update($obj) {
    $query = "UPDATE departments SET dept_no = '" . $obj->deptno . "', dept_name = '" . $obj->deptname . "', assign_status = '" . $obj->status . "' WHERE dept_no='" . $obj->deptno . "'";
    try {
      $result = $this->db->update($query);
      return $result;
    } catch (UpdateRecordException $e) {
      return $e->getErrorMessage();
    }
  }

  function delete($obj) {
    $query = "DELETE FROM departments WHERE dept_no = '" . $obj->deptno . "'";
    try {
      $result = $this->db->delete($query);
      return $result;
    } catch (ValueNotExist $e) {
      return $e->getErrorMessage();
    }
  }

  function getAll() {
    $query = "SELECT * FROM departments ORDER BY dept_no";
    try {
      $result = $this->db->select($query);
      return $result;
    } catch(GetAllRecordException $e) {
      return $e->getErrorMessage();
    }
  } 

  function statusFalse() {
    $query = "SELECT assign_status FROM departments WHERE assign_status='f';";
    
  }
}
?>
