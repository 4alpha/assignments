<?php
  namespace DAO;

  use DataBase\DB as DB;
  use DisplayException\DatabaseConnectionException as DatabaseConnectionException;
  use DisplayException\DeleteException as DeleteException;
  use DisplayException\AddException as AddException;
  use DisplayException\UpdateException as UpdateException;
  
  class EmployeeDAO implements DAO{
    public $db;
    public function __construct() {
      $this->db = DB::getConnection();
    }

    public function getAll() {
      $query = "SELECT * FROM employee ORDER BY emp_no";
      $result = $this->db->getAll($query);
      return $result;
    }

    public function add($employee) {
      $query = "INSERT INTO employee(emp_name) VALUES ('" . $employee->emp_name . "');";
      try { 
        $result = $this->db->add($query);
        $query = "SELECT * FROM employee WHERE oid = $result";
        $emp_no = $this->db->get($query);
        foreach($employee->departments as $dept)
        { 
          $query = "INSERT INTO emp_dept VALUES ('" . $emp_no . "', '" . $dept . "');";
          $result = $this->db->add($query);
        }
        return $result;
        } catch(AddException $e) {
        return "In Employee table employee " .$e->getErrorMessage();
      }
    }

    public function update($employee) {
      $query = "UPDATE employee SET emp_name = '" . $employee->emp_name . "' where emp_no = '" . $employee->emp_no ."';";
      try{ echo "hiii";
        $result = "$employee->emp_no" . $this->db->update($query);
        $query = " DELETE FROM emp_dept WHERE emp_no = '" . $employee->emp_no ."' ";
        $this->db->delete($query);
        foreach($employee->departments as $dept)
        {
          $query = "INSERT INTO emp_dept VALUES ('" . $employee->emp_no . "', '" . $dept . "');";
          $result = $this->db->add($query);
        }
        return $result;
       } catch(UpdateException $e) {
        return "In Employee table employee " .$e->getErrorMessage();
      }
    }
    
    public function delete($emp_no) {
      $query = " DELETE FROM employee WHERE emp_no = '" . $emp_no ."' ";
      try {
        $result = "$emp_no" . $this->db->delete($query);
        return $result;
       } catch(DeleteException $e) {
        return "In Employee table employee " .$e->getErrorMessage();
      }
    }
    
  }
?>