<?php
namespace DAO;
use DB_Driver\DB as DB;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;
use ExceptionClass\UpdateRecordException as UpdateRecordException;
use ExceptionClass\GetAllRecordException as GetAllRecordException;

class EmployeeDAO implements DAO {
  private $db;
  function  __construct() {
    $this->db = DB::getConnection();
  }
  
  function add($obj) {
    $query = "INSERT INTO employees(first_name,last_name,birth_date,gender) VALUES('" . $obj->fname . "', '" . $obj->lname . "', '" . $obj->bdate . "', '" . $obj->gender . "')";
    try {
      $result = $this->db->insert($query);
      $query = "SELECT emp_no from employees where oid=".$result .";";
      $emp_no = $this->db->get($query);
      foreach ($obj->departments as $dept) {
        $query = "INSERT INTO emp_dept(emp_no,dept_no) VALUES('" . $emp_no . "', '" . $dept . "');";
        $result = $this->db->insert($query);
      }
      return "Record inserted Successfully !!";
    } catch (IDAlreadyExist $e) {
      return $e->getErrorMessage();
    }
  }

  function update($obj) {
    $query = "DELETE FROM emp_dept WHERE emp_no ='" . $obj->empno . "'";
    $this->db->update($query);
    try {
      $query = "UPDATE employees SET(first_name,last_name,birth_date,gender) =('" . $obj->fname . "' , '" . $obj->lname . "','" . $obj->bdate . "','" . $obj->gender . "') WHERE emp_no ='" . $obj->empno . "'";
      $result = $this->db->update($query);
      foreach ($obj->departments as $dept) {
        $query = "INSERT INTO emp_dept (emp_no,dept_no) VALUES('" . $obj->empno . "', '" . $dept . "')";
        $result = $this->db->update($query);
      }
      return "Record updated successfully !!";
    } catch (UpdateRecordException $e) {
      return $e->getErrorMessage();
    }
  }

  function delete($obj) {
    $query = "DELETE FROM employees WHERE emp_no ='" . $obj->empno . "'";
    try {
      $result = $this->db->delete($query);
      return "Record deleted successfully !!";
    } catch (ValueNotExist $e) {
      return $e->getErrorMessage();
    }
  }
  
  function getAll() {
    $query = "SELECT * FROM employees ORDER BY emp_no";
    try {
      $result = $this->db->select($query);
      return $result;
    } catch (GetAllRecordException $e) {
      return $e->getErrorMessage();
    }
  }  
}
?>
