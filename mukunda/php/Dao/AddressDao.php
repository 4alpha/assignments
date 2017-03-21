<?php
  namespace Dao;
  
  use Exceptions\FetchRecordException as FetchRecordException;
  use Exceptions\DeleteException as DeleteException;
  use Exceptions\UpdateException as UpdateException; 

  class AddressDao extends \Dao {
    private $db;
    private $address;

    function __construct($address) {
      $this->db = \Dao:: __construct();
      $this->address = $address;
    }

    function add($address) { 
      $query = "INSERT INTO Address VALUES('$address->employeeId', '$address->city')";
      return $this->db->insert($query);
    }

    function get($employeeId) {
      $query = "SELECT * FROM Address WHERE e_no = $employeeId";
      try {
        $result = $this->db->get($query);
        return $result;
      }   
      catch(FetchRecordException $e) {
        return "Error: in getting data <br>" . $e->getRowErrorMessage();
      }  
    }

    function update($address) {
      $query = "UPDATE Address SET e_no = '$address->employeeId', address = '$address->city' WHERE e_no = $address->employeeId";
      try {
        $result = $this->db->update($query);
        return $result;
      }
      catch(UpdateException $e) {
        return "Error: in updating data <br>" . $e->getUpdateErrorMessage();
      }  
    }

    function delete($employeeId) {
      $query = "DELETE FROM Address WHERE e_no = $employeeId";
      try {
        $result = $this->db->delete($query);
        return $result;
      }
      catch(DeleteException $e) {
        return "Error: in deleting data <br>" . $e->getDeleteErrorMessage();
      }  
    }
      
    function getAll() {
      $query = "SELECT * FROM Address";
      return $this->db->getAll($query);
    }
  }
?>

