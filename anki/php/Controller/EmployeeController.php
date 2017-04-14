<?php
namespace Controller;
use Services\EmployeeService as EmployeeService;

class EmployeeController {
  private $servieceemp;
  function __construct() {
    $this->servieceemp = new EmployeeService();
  }

  function add($data) {
    if ($data['fname'] && $data['lname'] && $data['bdate'] && $data['gender'] && $data['departments']) {
      $result = $this->servieceemp->add($data['fname'],$data['lname'],$data['bdate'],$data['gender'],$data['departments']);
      return $result;
    } else {
      return 'Can not select multiple department with facility';
    }
  }

  function update($data) {
    if ($data['emp_no'] && $data['fname'] && $data['lname'] && $data['bdate'] && $data['gender'] && $data['departments']) {
      $result = $this->servieceemp->update($data['emp_no'],$data['fname'],$data['lname'],$data['bdate'],$data['gender'],$data['departments']);
      return $result;
    } else {
      return 'Can not select multiple department with facility';
    }
  }

  function delete($data) {
    $result = $this->servieceemp->delete($data['emp_no']);
    return $result;
  }
  
  function getrow() {
    $result = $this->servieceemp->getrow();
    return $result;
  }
}
?>
