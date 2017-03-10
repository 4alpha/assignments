<?php
require_once 'InterfaceDAO.php';

class DepartmentDAO extends InterfaceDAO {
  // public $objDept;
  public $db;

  function  __construct() {
    $this->db=InterfaceDAO::getConnectToDB();
    // $this->objDept=$objDept;
  }
  
  public function addDAO($obj) {
    $q1 = "insert into departments values('".$obj->deptno."','".$obj->deptname."');";
    $ans1=$this->db->insert($q1);
    return $ans1;
  }
  public function updateDAO($obj) {
    $q2 = "update departments set dept_no='".$obj->deptno."', dept_name='".$obj->deptname."' where dept_no='".$obj->deptno."';";
    $ans2=$this->db->update($q2);
    return $ans2;
  }
  public function deleteDAO($obj) {
    $q3 = "delete from departments where dept_no='".$obj->deptno."';";
    $ans3=$this->db->delete($q3);
     return $ans3;
  }

  public function getAll() {
    $q4="select * from departments;";
    $ans4=$this->db->select($q4);
    return $ans4;
  }  
}
?>
