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
      $query = "INSERT INTO employee VALUES ('" . $employee->id . "', '" . $employee->name . "');";
      try {
        $result = "$employee->id" . $this->db->add($query);
        return "added sucessfully " . $result;
        } catch(AddException $e) {
        return "In Employee table employee " .$e->idAlreadyExists();
      }
    }

    public function update($employee) {
      $query = "UPDATE employee SET emp_name = '" . $employee->name . "' where emp_no = '" . $employee->id ."';";
      try{
        $result = "$employee->id" . $this->db->update($query);
        return "updated sucessfully " . $result;
       } catch(UpdateException $e) {
        return "In Employee table employee " .$e->idDoesNotExits();
      }
    }
    
    public function delete($employee) {
      $query = " DELETE FROM employee WHERE emp_no = '" . $employee->id ."' ";
      try {
        $result = "$employee->id" . $this->db->delete($query);
        return "deleted sucessfully " . $result;
       } catch(DeleteException $e) {
        return "In Employee table employee " .$e->idDoesNotExits();
      }
    }
  }
?>