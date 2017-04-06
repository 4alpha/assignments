<?php
namespace Controller;
use Services\EmployeeService as EmployeeService;

class EmployeeController {
  private $servieceemp;
  function __construct() {
    $this->servieceemp = new EmployeeService();
  }

  function add($data) {
    if ($this->servieceemp->check_multiDepartment() == "true") {
      $result = $this->servieceemp->add($data['empno'],$data['fname'],$data['lname'],$data['bdate'],$data['gender'],$data['departments']);
      return $result;
    } else {
      return 'Can not select multiple department with facility';
    }
  }

  function update($data) {
    if ($this->servieceemp->check_multiDepartment() == "true") {
      $result = $this->servieceemp->update($data['empno'],$data['fname'],$data['lname'],$data['bdate'],$data['gender'],$data['departments']);
      return $result;
    } else {
      return 'Can not select multiple department with facility';
    }
  }

  function delete($data) {
    if ($this->servieceemp->check_multiDepartment() == "true") {
      $result = $this->servieceemp->delete($data['emp_no']);
      return $result;
    } else {
      return 'Can not select multiple department with facility';
    }
  }
  
  function getrow($data) {
    $result = $this->servieceemp->getrow();
    return $result;
  }
}
?>
