<?php
  namespace Controller;
  
  use Entity\Address as Address;
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
      $dao = new AddressDao($address);
      $result = $dao->add($address);
      return $result;
    }
    
    public function getRow() {
      $address = new Address($this->employeeId, $this->city);
      $dao = new AddressDao($address);
      $result = $dao->get($this->employeeId);
      return $result;
    }
     
    public function delete() {
      $address = new Address($this->employeeId, $this->city);
      $dao = new AddressDao($address);
      $result = $dao->delete($this->employeeId);
      return $result; 
    }

    public function getAll() {
      $address = new Address($this->employeeId, $this->city);
      $dao = new AddressDao($address);
      $result = $dao->getAll();
      return $result;
    }

    public function update() {
      $address = new Address($this->employeeId, $this->city);
      $dao = new AddressDao($address);
      $result = $dao->update($address);
      return $result;
    }
  }
?>