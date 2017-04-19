<?php
  namespace Dao;
  
  use Database\Database as Database;
  use Exceptions\FetchRecordException as FetchRecordException;
  use Exceptions\DeleteException as DeleteException;
  use Exceptions\UpdateException as UpdateException; 
  use Dao\Dao as Dao;

  class DepartmentDao implements Dao {
    private $db;
    function __construct() { 
      $this->db = Database:: connection();     
    }

    function add($department) {
      $query = "INSERT INTO Department (d_name, multiple_departments) VALUES('$department->departmentName', '$department->multipleDepartments')";
      $result = $this->db->add($query);
      $msg = "data is inserted successfully";
      $nomsg = "data is not inserted";
      if($result){
        return $msg;
      } else {
        return $nomsg;
      }
    }
   
    function get($id) {
      $query = "SELECT * FROM Department WHERE d_no = $id";
      try {
        $result = $this->db->get($query);
        return $result;
      }
      catch(FetchRecordException $e) {
        return"Error in getting department information data <br>" . $e->getErrorMessage();
      }     
    }

    function update($department) {  
      $query = "UPDATE Department SET d_no = $department->departmentId, d_name = '$department->departmentName', multiple_departments = '$department->multipleDepartments' WHERE d_no = $department->departmentId";
      try {
        $result = $this->db->update($query); 
        return $result;
      }
      catch(UpdateException $e) {
        return "Error in updating department data <br>" . $e->getErrorMessage();
      }        
    }

    function delete($id) {
      $query = "DELETE  FROM Department WHERE d_no = $id";
      try {
        $result = $this->db->delete($query);
        return $result;
      }
      catch(DeleteException $e) {
        return "Error in deleting department data <br>" . $e->getErrorMessage();
      }     
    }

    function getAll() { 
      $query = "SELECT * FROM Department ORDER BY d_no ASC";
      return $this->db->getAll($query);
    }
    
  }

   
?>