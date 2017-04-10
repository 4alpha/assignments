<?php
  namespace DAO;
  use DB_Driver\DB;
  use DB_Exceptions\GetRecordException as GetRecordException;

  class EmployeeDAO implements DAO {    
    private $db;

    function __construct() {
      $this->db = DB::getConnection();
    }

    function get($id) {
      $query = "SELECT * FROM employee WHERE emp_no = " . $id;
        $result = $this->db->get($query);
      return $result;
    }

    function getAll() {
      $query = "SELECT  * FROM employee ORDER BY emp_no";
      return $this->db->getAll($query);
    }

    function insert($employee) {
        $query = "INSERT INTO employee(emp_name, address, birth_date, contact_no) VALUES('" . $employee->emp_name . "', '" . $employee->emp_address . "', '" . $employee->DOB . "', '" . $employee->contact_no ."')";
        $result = $this->db->insert($query);
        $query = "select emp_no from employee where oid= $result";
        $emp_no = $this->db->get($query);        
        foreach($employee->departments as $dept_no) {
          $query = "INSERT INTO employee_department(emp_no,dept_no) VALUES('" . $emp_no . "', '" . $dept_no ."')";
          $result = $this->db->insert($query);
        } 
        return $result;
    }

    function update($employee) {      
      $query = "DELETE FROM employee_department WHERE emp_no = " . $employee->emp_no;
      $this->db->delete($query);
      $query = "UPDATE employee SET (emp_name, address, birth_date, contact_no) = ('"  . $employee->emp_name . "','" . $employee->emp_address . "','" . $employee->DOB . "', '" . $employee->contact_no ."') WHERE emp_no = '" . $employee->emp_no . "'";
      $result = $this->db->update($query);  
      foreach($employee->departments as $dept_no) {
        $query = "INSERT INTO employee_department (emp_no,dept_no) VALUES ('" . $employee->emp_no . "', '" . $dept_no ."')";
        $result = $this->db->insert($query);
      } 
      return $result;
    }

    function delete($id) {
      $query = "DELETE FROM employee WHERE emp_no = " . $id;
      return $this->db->delete($query);
    }
      
  }
?> 