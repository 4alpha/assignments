<?php
  namespace Controller;
  use Services\EmployeeServices as EmployeeServices;
  use BuisnessException\SelectDepartmentException as SelectDepartmentException;
  use DB_Exceptions\UpdateException as UpdateException;
  use DB_Exceptions\DeleteException as DeleteException;
  use DB_Exceptions\InsertException as InsertException;
  class EmployeeController { 
    private $servises;
    private $_keys = ['no' => 'emp_no', 'name' => 'emp_name', 'address' => 'emp_address', 'dob' => 'DOB', 'contact_no' => 'contact_no'];
    
    function __construct() {
      $this->services = new EmployeeServices();
    }

    function insert($data) {
      try {
        $this->services->insert($data[$this->_keys['name']], $data[$this->_keys['address']], $data[$this->_keys['dob']], $data[$this->_keys['contact_no']], $data['departments']);
        return "Record Inserted Successfully!!!";
      } catch(InsertException $e) {
        return $e->errorMessage();
      } catch(SelectDepartmentException $e) {
        return $e->errorMessage();
      }
    }

    function update($data) {
      try {
        $this->services->update($data[$this->_keys['no']],$data[$this->_keys['name']], $data[$this->_keys['address']], $data[$this->_keys['dob']], $data[$this->_keys['contact_no']], $data['departments']);
        return "Record Updated Successfully!!!";
      } catch(InsertException $e) {
        return $e->errorMessage();
      } catch(SelectDepartmentException $e) {
        return $e->errorMessage();
      }
    }

    function get($data) {
      try {
       return $this->services->get($data[$this->_keys['no']]);
      } catch(GetRecordException $e) {
        return "Employee Number : " . $data[$this->_keys['no']] . $e->errorMessage();
      }
    }

    function getAll() {
      return $this->services->getAll();
    }

    function delete($data) {
      try {
          $this->services->delete($data[$this->_keys['no']]);
          return "Record Deleted Successfully!!!";
      } catch(DeleteException $e) {
        return "Employee Number : ".$data[$this->_keys['no']] . " " . $e->errorMessage();
      }
    }
  }
?>