<?php
  namespace Dao;

  use Database\Database as Database;
  use Exceptions\FetchRecordException as FetchRecordException;
  use Exceptions\DeleteException as DeleteException;
  use Exceptions\UpdateException as UpdateException; 
  use Dao\Dao as Dao;

  class AddressDao implements Dao {
    private $db;
  
    function __construct() {
      $this->db = Database:: connection();
    }

    function add($address) { 
      $query = "INSERT INTO Address VALUES('$address->employeeId', '$address->city')";
      return $this->db->add($query);
    }

    function get($employeeId) {
      $query = "SELECT * FROM Address WHERE e_no = $employeeId";
      try {
        $result = $this->db->get($query);
        return $result;
      }   
      catch(FetchRecordException $e) {
        return "Error: in getting data <br>" . $e->getErrorMessage();
      }  
    }

    function update($address) {
      $query = "UPDATE Address SET e_no = '$address->employeeId', address = '$address->city' WHERE e_no = $address->employeeId";
      try {
        $result = $this->db->update($query);
        return $result;
      }
      catch(UpdateException $e) {
        return "Error: in updating data <br>" . $e->getErrorMessage();
      }  
    }

    function delete($employeeId) {
      $query = "DELETE FROM Address WHERE e_no = $employeeId";
      try {
        $result = $this->db->delete($query);
        return $result;
      }
      catch(DeleteException $e) {
        return "Error: in deleting data <br>" . $e->getErrorMessage();
      }  
    }
      
    function getAll() {
      $query = "SELECT * FROM Address";
      return $this->db->getAll($query);
    }
  }
?>

