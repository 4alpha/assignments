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
      $query = "INSERT INTO employee VALUES ('" . $employee->emp_no . "', '" . $employee->emp_name . "');";
      try {
        $result = "$employee->id" . $this->db->add($query);
        return $result;
        } catch(AddException $e) {
        return "In Employee table employee " .$e->getErrorMessage();
      }
    }

    public function update($employee) {
      $query = "UPDATE employee SET emp_name = '" . $employee->emp_name . "' where emp_no = '" . $employee->emp_no ."';";
      try{
        $result = "$employee->id" . $this->db->update($query);
        return $result;
       } catch(UpdateException $e) {
        return "In Employee table employee " .$e->getErrorMessage();
      }
    }
    
    public function delete($id) {
      $query = " DELETE FROM employee WHERE emp_no = '" . $id ."' ";
      try {
        $result = "$employee->id" . $this->db->delete($query);
        return $result;
       } catch(DeleteException $e) {
        return "In Employee table employee " .$e->getErrorMessage();
      }
    }
  }
?>