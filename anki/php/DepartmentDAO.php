<?php
require 'InterfaceDAO.php';

class DepartmentDAO extends InterfaceDAO {
  public $objDept;
  public $db;

  function  __construct($objDept) {
    $this->db=InterfaceDAO::getConnectToDB();
    $this->objDept=$objDept;
  }
  
  public function addDAO() {
    $q1 = "insert into departments values('".$this->objDept->deptno."','".$this->objDept->deptname."');";
    $ans1=$this->db->insert($q1);
    return $ans1;
  }
  public function updateDAO() {
    $q2 = "update departments set dept_no='".$this->objDept->deptno."', dept_name='".$this->objDept->deptname."' where dept_no='".$this->objDept->deptno."';";
    $ans2=$this->db->update($q2);
    return $ans2;
  }
  public function deleteDAO() {
    $q3 = "delete from departments where dept_no='".$this->objDept->deptno."';";
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
