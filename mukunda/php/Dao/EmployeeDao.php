<?php
  namespace Dao;
  
  use Database\Database as Database;
  use Exceptions\FetchRecordException as FetchRecordException;
  use Exceptions\DeleteException as DeleteException;
  use Exceptions\UpdateException as UpdateException; 
  use Dao\Dao as Dao;

  class EmployeeDao implements Dao {
    private $db;

    function __construct() { 
      $this->db = Database:: connection();     
    }

    function add($employee) {
      $query = "INSERT INTO employee VALUES($employee->id, '$employee->name', '$employee->gender')";
      $result = $this->db->add($query);
      return $result;
    }
   
    function get($id) {
      $query = "SELECT * FROM employee WHERE emp_no = $id";
      try {
        $result = $this->db->get($query);
        return $result;
      }
      catch(FetchRecordException $e) {
        return"Error in getting employee data <br>" . $e->getErrorMessage();
      }     
    }

    function update($employee) {  
      $query = "UPDATE employee SET emp_no = $employee->id, name = '$employee->name', gender = '$employee->gender' WHERE emp_no = $employee->id";
      try {
        $result = $this->db->update($query); 
        return $result;
      }
      catch(UpdateException $e) {
        return "Error in updating employee data <br>" . $e->getErrorMessage();
      }        
    }

    function delete($id) {
      $query = "DELETE  FROM employee WHERE emp_no = $id";
      try {
        $result = $this->db->delete($query);
        return $result;
      }
      catch(DeleteException $e) {
        return "Error in deleting employee data <br>" . $e->getErrorMessage();
      }     
    }

    function getAll() { 
      $query = "SELECT * FROM employee";
      return $this->db->getAll($query);
    }
  }
?>