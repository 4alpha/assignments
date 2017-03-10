<?php
require_once 'InterfaceDAO.php';

class EmployeeDAO extends InterfaceDAO {
  public $db;
  
  function  __construct() {
    $this->db = InterfaceDAO::getConnectToDB();
  }
  
  public function addDAO($obj) {
    $queryInsert = "insert into employees values('".$obj->empno."','".$obj->fname."','".$obj->lname."','".$obj->bdate."','".$obj->gender."','".$obj->hdate."');";
    $result = $this->db->insert($queryInsert);
    return $result;
  }
  public function updateDAO($obj) {
    $queryUpdate = "update employees set emp_no='".$obj->empno."', first_name='".$obj->fname."', last_name='".$obj->lname."',birth_date='".$obj->bdate."',gender='".$obj->gender."',hire_date='".$obj->hdate."' where emp_no='".$obj->empno."';";
    $result = $this->db->update($queryUpdate);
    return $result;
  }

  public function deleteDAO($obj) {
    $queryDelete = "delete from employees where emp_no='".$obj->empno."';";
    $result = $this->db->delete($queryDelete);
    return $result;
  }
  
  public function getAll() {
    $querySelectAll = "select * from employees;";
    $result = $this->db->select($querySelectAll);
    return $result;
  }  
}
?>
