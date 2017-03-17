<?php
namespace DAO;
use DatabaseFiles\InterfaceDB as InterfaceDB;

class DepartmentDAO implements InterfaceDAO {
  private $db;
  function  __construct() {
    $this->db = InterfaceDB::getConnectToDB();
  }
  
  function addDAO($obj) {
    $queryInsert = "INSERT INTO departments VALUES ('" .$obj->deptno. "', '" .$obj->deptname. "'); ";
    $result = $this->db->insert($queryInsert);
    return "Department " .$result;
  }

  function updateDAO($obj) {
    $queryUpdate = "UPDATE departments SET dept_no = '" .$obj->deptno. "', dept_name = '" .$obj->deptname. "' WHERE dept_no='" .$obj->deptno. "'; ";
    $result = $this->db->update($queryUpdate);
    return "Department ".$result;
  }

  function deleteDAO($obj) {
    $queryDelete = "DELETE FROM departments WHERE dept_no = '" .$obj->deptno. "';";
    $result = $this->db->delete($queryDelete);
    return "Department ".$result;
  }

  function getAll() {
    $querySelectAll = "SELECT * FROM departments;";
    $result = $this->db->select($querySelectAll);
    return $result;
  }  
}
?>
