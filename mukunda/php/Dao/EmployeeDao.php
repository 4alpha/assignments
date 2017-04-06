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
      $query = "INSERT INTO employee(name,gender) VALUES('$employee->name', '$employee->gender')";
      $result = $this->db->add($query);

      $query = "SELECT emp_no FROM employee WHERE oid = $result";
      $emp_no = $this->db->get($query);
    
      foreach($employee->department as $department){
        $query = "INSERT INTO employee_department(emp_no,d_no) VALUES('$emp_no','$department')";
        $result = $this->db->add($query); 
      }
      return "data is inserted successfully";
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
      $query = "UPDATE employee SET emp_no = '$employee->id', name = '$employee->name', gender = '$employee->gender' WHERE emp_no = '$employee->id'";
      try {  
        $result = $this->db->update($query); 
        $query = "DELETE FROM employee_department WHERE  emp_no = $employee->id";
        $this->db->delete($query);
        foreach($employee->department as $department){
          $query = "INSERT INTO employee_department(emp_no,d_no) VALUES('$employee->id','$department')";
          $result = $this->db->update($query);
        }
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
      $query = "SELECT * FROM employee ORDER BY emp_no ASC";
      return $this->db->getAll($query);
    }
  }
?>