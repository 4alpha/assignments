<?php
  namespace Controller;
  
  use Model\Address as Address;
  use Dao\AddressDao as AddressDao;
  
  class AddressController {
    private $employeeId;
    private $city;

    function __construct() { 
      $this->employeeId = $_POST['eno'];
      $this->city = $_POST['address'];      
    }
   
    public function add() { 
      $address = new Address($this->employeeId, $this->city);
      $dao = new AddressDao();
      $result = $dao->add($address);
      return $result;
    }
    
    public function getRow() {
      $dao = new AddressDao();
      $result = $dao->get($this->employeeId);
      return $result;
    }
     
    public function delete() {
      $dao = new AddressDao();
      $result = $dao->delete($this->employeeId);
      return $result; 
    }

    public function getAll() {
      $dao = new AddressDao();
      $result = $dao->getAll();
      return $result;
    }

    public function update() {
      $address = new Address($this->employeeId, $this->city);
      $dao = new AddressDao();
      $result = $dao->update($address);
      return $result;
    }
  }
?>