<?php
namespace DAO;
use DatabaseFiles\InterfaceDB as InterfaceDB;

class DepartmentDAO implements InterfaceDAO {
  private $db;
  function  __construct() {
    $this->db = InterfaceDB::getConnectToDB();
  }
  
  function addDAO($obj) {
    $query = "INSERT INTO departments VALUES ('" .$obj->deptno. "', '" .$obj->deptname. "'); ";
    $result = $this->db->insert($query);
    return "Department " .$result;
  }

  function updateDAO($obj) {
    $query = "UPDATE departments SET dept_no = '" .$obj->deptno. "', dept_name = '" .$obj->deptname. "' WHERE dept_no='" .$obj->deptno. "'; ";
    $result = $this->db->update($query);
    return "Department ".$result;
  }

  function deleteDAO($obj) {
    $query = "DELETE FROM departments WHERE dept_no = '" .$obj->deptno. "';";
    $result = $this->db->delete($query);
    return "Department ".$result;
  }

  function getAll() {
    $query = "SELECT * FROM departments;";
    $result = $this->db->select($query);
    return $result;
  }  
}
?>
