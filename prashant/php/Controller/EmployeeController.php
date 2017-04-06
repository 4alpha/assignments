<?php
  namespace Controller;
  use DAO\EmployeeDAO as EmployeeDAO;
  use Model\Employee as Employee;
  include 'buisnessLayer.php';
  class EmployeeController { 
    private $dao;
    private $_keys = ['no' => 'emp_no', 'name' => 'emp_name', 'address' => 'emp_address', 'dob' => 'DOB', 'contact_no' => 'contact_no'];
    function __construct() {
      $this->dao = new EmployeeDAO();
    }

    function insert($data) {
      $dept_no = buisnessLayer();
      if(buisnessLayer()) {
        if(($data[$this->_keys['name']] == '') 
            || ($data[$this->_keys['address']] == '') 
            || ($data[$this->_keys['dob']] == '') 
            ||  ($data[$this->_keys['contact_no']] == '')) {
              return "<script>alert('some fields are EMPTY ');</script>  ";
        } else {
          $employee = new Employee();
          $employee->emp_no = $data[$this->_keys['no']];
          $employee->emp_name = $data[$this->_keys['name']];
          $employee->emp_address = $data[$this->_keys['address']];
          $employee->DOB = $data[$this->_keys['dob']];
          $employee->contact_no = $data[$this->_keys['contact_no']];
          $employee->departments = $dept_no;
          print_r($employee->departments);
          return $this->dao->insert($employee);
      }
    } else {
      return 'You can not select multi departments having value false';
    }
    }

    function get($data) {
      return $this->dao->get($data[$this->_keys['no']]);
    }

    function getAll() {
      $result = $this->dao->getAll();
      return $result;
    }

    function update($data) {  
      $dept_no = buisnessLayer();
      if(buisnessLayer()) {
        if( ($data[$this->_keys['no']] == '') || ($data[$this->_keys['name']] == '') 
            || ($data[$this->_keys['address']] == '') 
            || ($data[$this->_keys['dob']] == '') 
            || ($data[$this->_keys['contact_no']] == '')) {
              return "<script>alert('Error:Some fields are EMPTY! ');</script>  ";
        } else { 
          $employee = new Employee();
          $employee->emp_no = $data[$this->_keys['no']];
          $employee->emp_name = $data[$this->_keys['name']];
          $employee->emp_address = $data[$this->_keys['address']];
          $employee->DOB = $data[$this->_keys['dob']];
          $employee->contact_no = $data[$this->_keys['contact_no']];
          $employee->departments = $dept_no;
          return $this->dao->update($employee);
        }
      } else {
        return 'You can not select multi departments having value false';
      }
    }


    function delete($data) {
      return $this->dao->delete($data[$this->_keys['no']]);
    }
  }
?>