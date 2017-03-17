<?php
namespace DAO;
use DatabaseFiles\InterfaceDB as InterfaceDB;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;

class DepartmentDAO implements InterfaceDAO {
  private $db;
  function  __construct() {
    $this->db = InterfaceDB::getConnectToDB();
  }
  
  function addDAO($obj) {
    $query = "INSERT INTO departments VALUES ('" .$obj->deptno. "', '" .$obj->deptname. "'); ";
    try {
      $result = $this->db->insert($query);
      return $result . "Department Record inserted successfully !!";
    } catch (IDAlreadyExist $e) {
        return "Department " .$e->getMessageForID();
    }
  }

  function updateDAO($obj) {
    $query = "UPDATE departments SET dept_no = '" .$obj->deptno. "', dept_name = '" .$obj->deptname. "' WHERE dept_no='" .$obj->deptno. "'; ";
    try {
      $result = $this->db->update($query);
      return $result. "Department Record updated successfully !!";
    } catch (ValueNotExist $e) {
      return "Department " .$e->valueNotExist();
    }
  }

  function deleteDAO($obj) {
    $query = "DELETE FROM departments WHERE dept_no = '" .$obj->deptno. "';";
    try {
      $result = $this->db->delete($query);
      return $result . "Department Record deleted successfully !!";
    } catch (ValueNotExist $e) {
      return "Department " .$e->valueNotExist();
    }
  }

  function getAll() {
    $query = "SELECT * FROM departments;";
    try {
    $result = $this->db->select($query);
    } catch(Exception $e) {
      $e->getMessage();
    }
  }  
}
?>
