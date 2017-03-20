<?php
  namespace DaoFiles;
  
  use ExceptionNamespace\FetchRecordException as FetchRecordException;
  use ExceptionNamespace\DeleteException as DeleteException;
  use ExceptionNamespace\UpdateException as UpdateException; 

  class EmployeeDao extends \Dao {
    private $db;
    private $employee;

    function __construct($employee) { 
      $this->db = \Dao:: __construct();
      $this->employee = $employee;      
    }

    function add($employee) {
      $query = "INSERT INTO employee VALUES($employee->id, '$employee->name', '$employee->gender')";
      $result = $this->db->insert($query);
      return $result;
    }
   
    function get($id) {
      $query = "SELECT * FROM employee WHERE emp_no = $id";
      try {
        $result = $this->db->get($query);
        return $result;
      }
      catch(FetchRecordException $e) {
        return "<br><div style=margin-left:600px>" . "Error in getting employee data <br>" . $e->getRowErrorMessage() . "</div>";
      }     
    }

    function update($employee) {  
      $query = "UPDATE employee SET emp_no = $employee->id, name = '$employee->name', gender = '$employee->gender' WHERE emp_no = $employee->id";
      try {
        $result = $this->db->update($query); 
        return $result;
      }
      catch(UpdateException $e) {
        return "<br><div style=margin-left:600px>" . "Error in updating employee data <br>" . $e->getUpdateErrorMessage() . "</div>";
      }        
    }

    function delete($id) {
      $query = "DELETE  FROM employee WHERE emp_no = $id";
      try {
        $result = $this->db->delete($query);
        return $result;
      }
      catch(DeleteException $e) {
        return "<br><div style=margin-left:600px>" . "Error in deleting employee data <br>" . $e->getDeleteErrorMessage() . "</div>";
      }     
    }

    function getAll() { 
      $query = "SELECT * FROM employee";
      return $this->db->getAll($query);
    }
  }
?>