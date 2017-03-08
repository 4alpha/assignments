<?php
require 'InterfaceDAO.php';

class EmployeeDAO extends InterfaceDAO {
  public $objemp;
  public $db;
  
  function  __construct($objemp) {
    $this->db=InterfaceDAO::getConnectToDB();
    $this->objemp=$objemp;    

  }
  
  public function addDAO() {
    $q1 = "insert into employees values('".$this->objemp->empno."','".$this->objemp->fname."','".$this->objemp->lname."','".$this->objemp->bdate."','".$this->objemp->gender."','".$this->objemp->hdate."');";
    $ans1=$this->db->insert($q1);
    return $ans1;
  }
  public function updateDAO() {
    $q2 = "update employees set emp_no='".$this->objemp->empno."', first_name='".$this->objemp->fname."', last_name='".$this->objemp->lname."',birth_date='".$this->objemp->bdate."',gender='".$this->objemp->gender."',hire_date='".$this->objemp->hdate."' where emp_no='".$this->objemp->empno."';";
    $ans2=$this->db->update($q2);
    return $ans2;
  }
  public function deleteDAO() {
    $q3 = "delete from employees where emp_no='".$this->objemp->empno."';";
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
