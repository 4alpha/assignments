<?php
  namespace DaoFiles;
  
  use ExceptionNamespace\FetchRecordException as FetchRecordException;
  use ExceptionNamespace\DeleteException as DeleteException;
  use ExceptionNamespace\UpdateException as UpdateException; 
 
  class AddressDao extends \Dao {
    private $db;
    private $address;

    function __construct($address) {
      $this->db = \Dao:: __construct();
      $this->address = $address;
    }

    function add($address) {
      $query = "INSERT INTO Address VALUES('$address->employeeId','$address->city')";
      return $this->db->insert($query);
    }

    function get($employeeId) {
      $query = "SELECT * FROM Address WHERE e_no = $employeeId";
      try {
        $result = $this->db->get($query);
        return $result;
      }   
      catch(FetchRecordException $e) {
        return "<br><div style=margin-left:600px>" . "Error: in getting data <br>" . $e->getRowErrorMessage() . "</div>";
      }  
    }

    function update($address) {
      $query = "UPDATE Address SET e_no = '$address->employeeId', address = '$address->city' WHERE e_no = $address->employeeId";
      try {
        $result = $this->db->update($query);
        return $result;
      }
      catch(UpdateException $e) {
        return "<br><div style=margin-left:600px>" . "Error: in updating data <br>" . $e->getUpdateErrorMessage() . "</div>";
      }  
    }

    function delete($employeeId) {
      $query = "DELETE FROM Address WHERE e_no = $employeeId";
      try {
        $result = $this->db->delete($query);
        return $result;
      }
      catch(DeleteException $e) {
        return "<br><div style=margin-left:600px>" . "Error: in deleting data <br>" . $e->getDeleteErrorMessage() . "</div>";
      }  
    }
      
    function getAll() {
      $query = "SELECT * FROM Address";
      return $this->db->getAll($query);
    }
  }
?>

