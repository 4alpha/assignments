<?php
namespace DAO;
use DatabaseFiles\InterfaceDB as InterfaceDB;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;

class EmployeeDAO implements InterfaceDAO {
  private $db;
  function  __construct() {
    $this->db = InterfaceDB::getConnectToDB();
  }
  
  function addDAO($obj) {
    $query = "INSERT INTO employees VALUES('" .$obj->empno. "', '" .$obj->fname. "', '" .$obj->lname. "', '" .$obj->bdate. "', '" .$obj->gender. "', '" .$obj->hdate. "'); ";
    try {
      $result = $this->db->insert($query);
      return $result. "Employee Record inserted successfully !!";
    } catch (IDAlreadyExist $e) {
      return "Employee " .$e->getMessageForID();
    }
  }

  function updateDAO($obj) {
    $query = "UPDATE employees SET emp_no='" .$obj->empno. "', first_name='" .$obj->fname. "', last_name='" .$obj->lname. "',birth_date='" .$obj->bdate. "',gender='" .$obj->gender. "',hire_date='" .$obj->hdate. "' WHERE emp_no ='" .$obj->empno. "'; ";
    try {
      $result = $this->db->update($query);
      return $result. "Employee Record updated successfully !!";
    } catch (ValueNotExist $e) {
      return "Employee " .$e->valueNotExist();
    }
  }

  function deleteDAO($obj) {
    $query = "DELETE FROM employees WHERE emp_no='" .$obj->empno. "'; ";
    try {
      $result = $this->db->update($query);
      return $result. "Employee Record deleted successfully !!";
    } catch (ValueNotExist $e) {
      return "Employee " .$e->valueNotExist();
    }
  }
  
  function getAll() {
    $query = "SELECT * FROM employees; ";
    try {
    $result = $this->db->select($query);
    } catch(Exception $e) {
      $e->getMessage();
    }
  }  
}
?>
