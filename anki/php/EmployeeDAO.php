<?php
require_once 'InterfaceDAO.php';

class EmployeeDAO extends InterfaceDAO {
  // public $objemp;
  public $db;
  
  function  __construct() {
    $this->db=InterfaceDAO::getConnectToDB();
    // $this->objemp=$objemp;    

  }
  
  public function addDAO($obj) {
    $q1 = "insert into employees values('".$obj->empno."','".$obj->fname."','".$obj->lname."','".$obj->bdate."','".$obj->gender."','".$obj->hdate."');";
    $ans1=$this->db->insert($q1);
    return $ans1;
  }
  public function updateDAO($obj) {
    $q2 = "update employees set emp_no='".$obj->empno."', first_name='".$obj->fname."', last_name='".$obj->lname."',birth_date='".$obj->bdate."',gender='".$obj->gender."',hire_date='".$obj->hdate."' where emp_no='".$obj->empno."';";
    $ans2=$this->db->update($q2);
    return $ans2;
  }
  public function deleteDAO($obj) {
    $q3 = "delete from employees where emp_no='".$obj->empno."';";
    $ans3=$this->db->delete($q3);
    return $ans3;
  }
  public function getAll() {
    $q4="select * from employees;";
    $ans4=$this->db->select($q4);
    return $ans4;
  }  
}
?>
