<?php
require_once 'InterfaceDB.php';
require_once 'DBPostgres.php';

class DepartmentDAO implements InterfaceDAO {
  public $db;
  function  __construct() {
    $this->db = Config::getConnectToDB();
  }
  
  public function addDAO($obj) {
    $queryInsert = "INSERT INTO departments VALUES('".$obj->deptno."','".$obj->deptname."');";
    $result = $this->db->insert($queryInsert);
    return "Department ".$result;
  }

  public function updateDAO($obj) {
    $queryUpdate = "UPDATE departments SET dept_no='".$obj->deptno."', dept_name='".$obj->deptname."' WHERE dept_no='".$obj->deptno."';";
    $result = $this->db->update($queryUpdate);
    return "Department ".$result;
  }

  public function deleteDAO($obj) {
    $queryDelete = "DELETE FROM departments WHERE dept_no='".$obj->deptno."';";
    $result = $this->db->delete($queryDelete);
    return "Department ".$result;
  }

  public function getAll() {
    $querySelectAll="SELECT * FROM departments;";
    $result = $this->db->select($querySelectAll);
    return $result;
  }  
}
?>
