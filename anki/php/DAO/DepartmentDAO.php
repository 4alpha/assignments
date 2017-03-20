<?php
namespace DAO;
use DatabaseFiles\DB as DB;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;

class DepartmentDAO implements DAO {
  private $db;
  function  __construct() {
    $this->db = DB::getConnectToDB();
  }
  
  function add($obj) {
    $query = "INSERT INTO departments VALUES ('" .$obj->deptno. "', '" .$obj->deptname. "'); ";
    try {
      $result = $this->db->insert($query);
      return $result . "Department Record inserted successfully !!";
    } catch (IDAlreadyExist $e) {
        return "Department " . $e->getErrorMessage();
    }
  }

  function update($obj) {
    $query = "UPDATE departments SET dept_no = '" .$obj->deptno. "', dept_name = '" .$obj->deptname. "' WHERE dept_no='" .$obj->deptno. "'; ";
    try {
      $result = $this->db->update($query);
      return $result. "Department Record updated successfully !!";
    } catch (ValueNotExist $e) {
      return "Department " . $e->getErrorMessage();
    }
  }

  function delete($obj) {
    $query = "DELETE FROM departments WHERE dept_no = '" .$obj->deptno. "';";
    try {
      $result = $this->db->delete($query);
      return $result . "Department Record deleted successfully !!";
    } catch (ValueNotExist $e) {
      return "Department " . $e->getErrorMessage();
    }
  }

  function getAll() {
    $query = "SELECT * FROM departments;";
    try {
      $result = $this->db->select($query);
      return $result;
    } catch(Exception $e) {
      $e->getMessage();
    }
  }  
}
?>
