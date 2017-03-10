<?php
require_once 'InterfaceDAO.php';

class DepartmentDAO extends InterfaceDAO {
  public $db;

  function  __construct() {
    $this->db=InterfaceDAO::getConnectToDB();
  }
  
  public function addDAO($obj) {
    $queryInsert = "insert into departments values('".$obj->deptno."','".$obj->deptname."');";
    $result = $this->db->insert($queryInsert);
    return $result;
  }

  public function updateDAO($obj) {
    $queryUpdate = "update departments set dept_no='".$obj->deptno."', dept_name='".$obj->deptname."' where dept_no='".$obj->deptno."';";
    $result = $this->db->update($queryUpdate);
    return $result;
  }

  public function deleteDAO($obj) {
    $queryDelete = "delete from departments where dept_no='".$obj->deptno."';";
    $result = $this->db->delete($queryDelete);
    return $result;
  }

  public function getAll() {
    $querySelectAll="select * from departments;";
    $result = $this->db->select($querySelectAll);
    return $result;
  }  
}
?>
