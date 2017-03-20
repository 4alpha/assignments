<?php
  namespace DAO;
  use DB_Driver\DB;
  use DB_Exceptions\GetRecordException as GetRecordException;
  use DB_Exceptions\UpdateException as UpdateException;
  use DB_Exceptions\DeleteException as DeleteException;
  use DB_Exceptions\InsertException as InsertException;

  class EmployeeDAO implements DAO {    
    private $db;

    function __construct() {
      $this->db = DB::getConnection();
    }

    function get($id) {
      $query = "SELECT * FROM employee WHERE emp_no = " . $id;
      try {
        $result = $this->db->get($query);
      return $result;
      } catch(GetRecordException $e) {
        return "Employee Number : " . $id . $e->errorMessage();
      } 
    }

    function getAll() {
      $query = "SELECT  * FROM employee ORDER BY emp_no";
      return $this->db->getAll($query);
    }

    function insert($employee) {
      $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('" . $employee->emp_name . "', '" . $employee->emp_address . "', '" . $employee->DOB . "')";
      try {
        $this->db->insert($query);
        return "Employee Added...";
      } catch(InsertException $e) {
        return $e->errorMessage();
      }
    }

    function update($employee) {
      $query = "UPDATE employee SET (emp_name, address, birth_date) = ('"  . $employee->emp_name ."','".$employee->emp_address."','".$employee->DOB."') WHERE emp_no = '".$employee->emp_no."'";
      try {
        $result = $this->db->update($query);
        return "Update SuccessFully...";
      } catch(UpdateException $e) {
        return "Employee Number : $employee->emp_no" . $e->errorMessage();
      } 
    }

    function delete($id) {
      $query = "DELETE FROM employee WHERE emp_no = " . $id;
      try {
        $result = $this->db->delete($query);
        return $id . "Deleted...";
      } catch(DeleteException $e) {
        return "Employee Number : $id" . $e->errorMessage();
      }
    }
  }
?> 