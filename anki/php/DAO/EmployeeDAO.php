<?php
namespace DAO;
use DatabaseFiles\InterfaceDB as InterfaceDB;

class EmployeeDAO implements InterfaceDAO {
  private $db;
  function  __construct() {
    $this->db = InterfaceDB::getConnectToDB();
  }
  
  function addDAO($obj) {
    $queryInsert = "INSERT INTO employees VALUES('" .$obj->empno. "', '" .$obj->fname. "', '" .$obj->lname. "', '" .$obj->bdate. "', '" .$obj->gender. "', '" .$obj->hdate. "'); ";
    $result = $this->db->insert($queryInsert);
    return "Employee " .$result;
  }

  function updateDAO($obj) {
    $queryUpdate = "UPDATE employees SET emp_no='" .$obj->empno. "', first_name='" .$obj->fname. "', last_name='" .$obj->lname. "',birth_date='" .$obj->bdate. "',gender='" .$obj->gender. "',hire_date='" .$obj->hdate. "' WHERE emp_no ='" .$obj->empno. "'; ";
    $result = $this->db->update($queryUpdate);
    return "Employee " .$result;
  }

  function deleteDAO($obj) {
    $queryDelete = "DELETE FROM employees WHERE emp_no='" .$obj->empno. "'; ";
    $result = $this->db->delete($queryDelete);
    return "Employee " .$result;
  }
  
  function getAll() {
    $querySelectAll = "SELECT * FROM employees; ";
    $result = $this->db->select($querySelectAll);
    return $result;
  }  
}
?>
