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
        print_r($employee->departments);
      try {
        $query = "INSERT INTO employee(emp_name, address, birth_date, contact_no) VALUES('" . $employee->emp_name . "', '" . $employee->emp_address . "', '" . $employee->DOB . "', '" . $employee->contact_no ."')";
        $result = $this->db->insert($query);
        $query = "select emp_no from employee where oid= $result";
        $emp_no = $this->db->get($query);        
        foreach($employee->departments as $dept_no) {
          $query = "INSERT INTO employee_department(emp_no,dept_no) VALUES('" . $emp_no . "', '" . $dept_no ."')";
          $result = $this->db->insert($query);
        } 
        return"Record Inserted Successfully...";
      } catch(InsertException $e) {
        return $e->errorMessage();
      }
    }

    function update($employee) {      
      $query = "DELETE FROM employee_department WHERE emp_no = " . $employee->emp_no;
      $this->db->update($query);
      try {
        $query = "UPDATE employee SET (emp_name, address, birth_date, contact_no) = ('"  . $employee->emp_name . "','" . $employee->emp_address . "','" . $employee->DOB . "', '" . $employee->contact_no ."') WHERE emp_no = '" . $employee->emp_no . "'";
        $result = $this->db->update($query);
        
        foreach($employee->departments as $dept_no) {
          $query = "INSERT INTO employee_department (emp_no,dept_no) VALUES ('" . $employee->emp_no . "', '" . $dept_no ."')";
          $result = $this->db->update($query);
        } 
        return "Record Updated Successfully...";
      } catch(UpdateException $e) {
        return "Employee Number : $employee->emp_no" . $e->errorMessage();
      } 
    }

    function delete($id) {
      $query = "DELETE FROM employee WHERE emp_no = " . $id;
      try {
        $result = $this->db->delete($query);
        return "Record Deleted Successfully...";
      } catch(DeleteException $e) {
        return "Employee Number : $id" . $e->errorMessage();
      }
    }
  }
?> 