<?php
  namespace Controller;
  use Services\EmployeeServices as EmployeeServices;
  class EmployeeController { 
    private $servises;
    private $_keys = ['no' => 'emp_no', 'name' => 'emp_name', 'address' => 'emp_address', 'dob' => 'DOB', 'contact_no' => 'contact_no'];
    
    function __construct() {
      $this->services = new EmployeeServices();
    }

    function insert($data) {
      try {     
        return $this->services->insert($data[$this->_keys['name']], $data[$this->_keys['address']], $data[$this->_keys['dob']], $data[$this->_keys['contact_no']], $data['departments']);
      } catch(InsertException $e) {

      }
    }

    function update($data) {
      return $this->services->update($data[$this->_keys['no']],$data[$this->_keys['name']], $data[$this->_keys['address']], $data[$this->_keys['dob']], $data[$this->_keys['contact_no']], $data['departments']);
    }

    function get($data) {
      return $this->services->get($data[$this->_keys['no']]);
    }

    function getAll() {
      return $this->services->getAll();
    }

    function delete($data) {
      return $this->services->delete($data[$this->_keys['no']]);
    }
  }
?>